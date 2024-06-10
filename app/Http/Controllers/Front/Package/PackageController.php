<?php

namespace App\Http\Controllers\Front\Package;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingCustomers;
use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\Exclusion;
use App\Models\Feature;
use App\Models\Inclusion;
use App\Models\Package;
use App\Models\PackageCancellationPolicy;
use App\Models\PackageCategoryHotel;
use App\Models\PackageExclusion;
use App\Models\PackageFeature;
use App\Models\PackageForeignerOptions;
use App\Models\PackageInclusion;
use App\Models\PackageIndianOption;
use App\Models\PackageItineraries;
use App\Models\PackagePaymentPolicy;
use App\Models\PackageTerms;
use App\Models\PageManagement;
use App\Models\PackageCategory;
use App\Models\PackageFestivalDates;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $packages_meta   = PageManagement::Where('type', 'package')->first();
        $packages = Package::with(['features', 'inclusions', 'exclusions', 'categories', 'available_categories', 'iternaries', 'bookingPackages'])
            ->where('status', 1)
            ->get();
        return view('front.packages.packages', compact('packages', 'packages_meta'));
    }

    // public function packageDetailsOld($slug)
    // {
    //     $package = Package::with(['features', 'inclusions', 'exclusions', 'categories', 'available_categories', 'iternaries', 'bookingPackages'])
    //         ->where('status', 1)
    //         ->where('slug', $slug)
    //         ->first();
    //     $states = State::all();
    //     return view('front.packages.package_details', compact('package', 'states'));
    // }

    public function packageDetails($slug)
    {
        $kazi_package            = Package::where('slug', $slug)->first();
        $terms                  = PackageTerms::get();
        $cancellation_policies  = PackageCancellationPolicy::get();
        $payment_policies       = PackagePaymentPolicy::get();
        $packageIternaries        = PackageItineraries::get();

        $package   = PageManagement::Where('type', 'package')->first();

        $features_pluck  = PackageFeature::where('package_id', $kazi_package->id)->where('status', true)->pluck('feature_id');
        $features = Feature::whereIn('id', $features_pluck)->get()->toArray();

        $inclusion_pluck  = PackageInclusion::where('package_id', $kazi_package->id)->where('status', true)->pluck('inclusion_id');
        $inclusions = Inclusion::whereIn('id', $inclusion_pluck)->get()->toArray();

        $exclusion_pluck  = PackageExclusion::where('package_id', $kazi_package->id)->where('status', true)->pluck('exclusion_id');
        $exclusions = Exclusion::whereIn('id', $exclusion_pluck)->get()->toArray();

        $states = State::get()->toArray();

        return view('front.packages.package_details', compact('kazi_package', 'package', 'terms', 'cancellation_policies', 'payment_policies', 'packageIternaries', 'features', 'inclusions', 'exclusions', 'states'));
    }

    public function getHotelImages(Request $request)
    {
        // $data = PackageCategoryHotel::with(['hotel' => function ($query) {
        //     return $query->select('package_image', 'id', 'name');
        // }])->where('package_id', $request->package_id)->where('category_id', $request->category_id)->get();
        $result = PackageCategoryHotel::with(['hotel' => function ($query) {
            return $query->select('package_image', 'id', 'name');
        }, 'category'])
            ->where('package_id', $request->package_id)
            ->where('category_id', $request->category_id)
            ->get();

        // Extracting only the required fields from the retrieved data
        $data = $result->map(function ($item) {
            return [
                'hotel' => [
                    'name' => $item->hotel->name,
                    'images' => $item->hotel->images->pluck('image')->toArray()
                ],
                'category' => $item->category->category
            ];
        });

        $data = $data ? $data->toArray() :  [];
        return json_encode(['status' => "success", "data" => $data]);
    }

    public function kazirangaPackageOption(Request $req)
    {
        if ($req->type == "indian") {
            $package  = PackageIndianOption::where('category_id', $req->category_id)->where('package_id', $req->package_id)->get();
        } else {
            $package  = PackageForeignerOptions::where('category_id', $req->category_id)->where('package_id', $req->package_id)->get();
        }
        $package  = $package ? $package->toArray() : [];
        return json_encode(['status' => "success", "data" => $package]);
    }

    public function checkPackageFestivalDate(Request $request)
    {

        $package_category = PackageCategory::where('package_id', $request->package_id)
            ->where('category', $request->hotel_type)
            ->first(['id']);

        if ($request->nationality == 'indian') {
            $package_price     = PackageIndianOption::where('package_id', $request->package_id)
                ->where('category_id', $package_category->id)
                ->first();
            // dd("dd",$package_price->room_price);
        } else {
            $package_price     = PackageForeignerOptions::where('package_id', $request->package_id)
                ->where('category_id', $package_category->id)
                ->first();
        }

        $check_festival = PackageFestivalDates::where('type', 'festival')
            ->where('start', '<=', $request->selected_date)
            ->where('end', '>=', $request->selected_date)
            ->exists();

        if ($check_festival == false) {
            $check_weekend = $this->isWeekend($request->selected_date);
        }
        if ($check_festival) {
            $output = array(
                'package_option_id' => $package_price->id,
                'room_p'       => $package_price->fes_room_price,
                'adult_p'      => $package_price->fes_ad_price,
                'child_p'      => $package_price->fes_ch_price,
                'safari_price' => $package_price->s_fe_price,
                "type"         => "Festival"
            );
        } else if ($check_weekend) {
            $output = array(
                'package_option_id' => $package_price->id,
                'room_p'       => $package_price->price,
                'adult_p'      => $package_price->extra_beds,
                'child_p'      => $package_price->extra_bed_ch,
                'safari_price' => $package_price->s_we_price,
                "type"         => "Weekend"
            );
        } else {
            $output = array(
                'package_option_id' => $package_price->id,
                'room_p'       => $package_price->price,
                'adult_p'      => $package_price->extra_beds,
                'child_p'      => $package_price->extra_bed_ch,
                'safari_price' => $package_price->s_de_price,
                "type"         => "default"
            );
        }

        return response()->json(['success' => $output]);
    }


    public function isWeekend($date)
    {
        $weekDay = date('w', strtotime($date));
        return ($weekDay == 0 || $weekDay == 6);
    }

    // Save Hotel Booking Code Here
    public function savePackageBookingData(Request $request)
    {
        $user = null;
        $existingEnquiry = Enquiry::where('email_id', $request->email)->first();
        if ($existingEnquiry) {
            $existingEnquiry->traveller_name = $request->name;
            $existingEnquiry->mobile_no = $request->phone;
            $existingEnquiry->booking_date = $request->date;
            $existingEnquiry->message = 'Package Booking';
            $existingEnquiry->save();
            $user_id = $existingEnquiry->id;
        } else {
            $user = new Enquiry();
            $user->traveller_name = $request->name;
            $user->email_id = $request->email;
            $user->mobile_no = $request->phone;
            $user->booking_date = $request->date;
            $user->package_id = $request->package_id;
            $user->message = 'Package Booking';
            $user->type = 'package';
            $user->save();
            $user_id = $user->id;
        }

        $existingCustomer = Customer::where('email', $request->email)->first();
        if ($existingCustomer) {
            $existingCustomer->name = $request->name;
            $existingCustomer->phone = $request->phone;
            $existingCustomer->custom_data = 'Package Booking';
            $existingCustomer->save();
            $user_id = $existingCustomer->id;
        } else {
            $user = new Customer();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->custom_data = 'Package Booking';
            $user->save();
            $user_id = $user->id;
        }

        if ($request->paymentType == "Full") {
            $payment_status = 'paid';
        } else {
            $payment_status = 'partially paid';
        }
        $booking = new Booking();
        $booking->user_id = $user_id;
        $booking->status = 'paid';
        $booking->type = 'package';
        $booking->state = $request->state;
        $booking->date = $request->date;
        $booking->timing = '7:30 AM to 10:00 AM';
        $booking->address = $request->state . ' ' . $request->country;
        $booking->total = $request->amount;
        $booking->payment_id = $request->razorpay_payment_id;
        $booking->package_option_nationality = 'indian';
        $booking->package_option_id = $request->package_option_id;
        $booking->package_id = $request->package_id;
        $booking->adults = $request->adultCount;
        $booking->children = $request->childCount;
        $booking->room_category = $request->room_category;
        $booking->rooms = $request->rooms;
        $booking->payment_value = $request->paymentType;
        $booking->no_of_kids = $request->adultCount + $request->childCount;
        $booking->save();

        $meta = '';
        $meta .= 'Type : ' . 'Package';

        Http::post(env('CRM_LEAD_URL_MAIN') . '/save-lead', [
            'name'          =>  $request->name,
            'mobile'        =>  $request->phone,
            'email'         =>  $request->email,
            'website'       => 'kazirangabooking.com',
            'custom_data'   =>  $meta,
        ]);

        Http::post(env('CRM_LEAD_URL') . '/update-lead-data', [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' =>  $request->phone,
            'website' => 'kazirangabooking.com',
            'payment_status' =>  $payment_status
        ]);

        Http::post(env('CRM_LEAD_URL') . '/update-lead-status', [
            'name' => $request->name,
            'email' => $request->email,
            'website' => 'kazirangabooking.com',
            'mobile' =>  $request->phone,
            'address' => $request->state . ' ' . $request->country,
            'state' => $request->state,
            'assigned_to' => null,
            'booking_type' => null,
            'lead_status' =>  $payment_status,
            'payment_status' =>  $payment_status
        ]);

        if ($booking->package_option_nationality == 'indian') {
            $package_option     = PackageForeignerOptions::find($booking->package_option_id);
        } else {
            $package_option     = PackageIndianOption::find($booking->package_option_id);
        }
        $booked_customers = BookingCustomers::where('booking_id', $booking->id)->get();

        Http::post(env('CRM_LEAD_URL') . '/booking', [
            'address' => null,
            'state'  =>  null,
            'mobile' =>  $request->phone,
            'website' => 'kazirangabooking.com',
            'date' =>  $booking->date,
            'time' => '',
            'mode' => '',
            'type' => 'package',
            'adult' => $booking->adults,
            'child' => (int)$booking->children,
            'transaction_id' => $booking->payment_id,
            'sanctuary' => 'gir',
            'amount' =>  $booking->total,
            'due_amount' =>  0,
            'nationality' => $booking->package_option_nationality,
            'package_name' => $booking->package->name,
            'package_type' => $package_option->category->category,
            'no_of_room' => $booking->rooms,
            // 'extra_beds' => $package_option->extra_beds,
            'extra_beds' => 0,
            'booked_customers' => json_encode($booked_customers),
        ]);

        return array(
            'status' => 'success',
        );
    }
}
