<?php

namespace App\Http\Controllers\Front\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingCustomers;
use App\Models\Country;
use App\Models\Customer;
use App\Models\DateManagement;
use App\Models\PackageBooking;
use App\Models\PackageFestivalDates;
use App\Models\PackageForeignerOptions;
use App\Models\PackageIndianOption;
use App\Models\PriceManagement;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    //Safari Booking check date availibility and store booking details
    public function checkAvailibility(Request $request)
    {
        $request->validate([
            'booking_date' => 'required',
            'type' => 'required',
            'timing' => 'required',
            'mode' => 'required',
            'zone' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $date_not_available = DateManagement::where('date', $request->booking_date)
            ->where('mode', $request->mode)
            ->where('time', $request->timing)
            ->where('zone', $request->zone)
            ->where('status', 1)
            ->doesntExist();

        if ($date_not_available) {
            return redirect()->back()->with('errorMessage', 'Sorry, Booking is not available on this date.');
        }

        $user_exists = Customer::where('phone', $request->phone)->exists();
        if ($user_exists) {
            $user_id = Customer::where('phone', $request->phone)->value('id');
            $user = Customer::find($user_id);
            $user->update([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone
            ]);
        } else {
            $user = Customer::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'phone'    => $request->phone
            ]);
        }

        $meta = '';
        $meta .= 'Type : ' . $request->type;
        if (isset($request->booking_date) && $request->booking_date != '') {
            $meta .= ',Booking Date : ' . $request->booking_date;
        }
        if (isset($request->timing) && $request->timing != '') {
            $meta .= ',Timing : ' . $request->timing;
        }
        if (isset($request->mode) && $request->mode != '') {
            $meta .= ',Mode : ' . $request->mode;
        }
        if (isset($request->zone) && $request->zone != '') {
            $meta .= ',Zone : ' . $request->zone;
        }

        Http::post(env('CRM_LEAD_URL_MAIN') . '/save-lead', [
            'name' =>  $user->name,
            'mobile' =>  $user->phone,
            'email' => $user->email,
            'website' => 'kazirangabooking.com',
            'custom_data'    => $meta,
        ]);

        $booking = Booking::create([
            'type' => $request->type,
            'date' => $request->booking_date,
            'timing' => $request->timing,
            'vehicle' => $request->mode,
            'zone' => $request->zone,
            'user_id' => $user->id
            // 'adults'  => $request->adults,
            // 'package_option_nationality'=>'indian'
        ]);

        return redirect()->route('create.safari.booking', $booking->id);
    }

    //show stored safari booking details on safari booking overview page
    public function createBooking($id)
    {
        $states  = State::get();
        $countries = Country::all();
        $booking = Booking::find($id);
        $user    = Customer::find($booking->user_id);
        $prices   = PriceManagement::whereDate('start', '<=', $booking->date)
            ->whereDate('end', '>=', $booking->date)
            ->where('type', 'date-range')
            // ->where('time', $booking->timing)
            ->where('mode', $booking->vehicle)
            ->first(['indian', 'foreigner']);

        if ($prices == NULL) {
            if ($this->isWeekend($booking->date)) {
                $prices   = PriceManagement::where('type', 'weekend')
                    ->where('mode', $booking->vehicle)
                    ->first(['indian', 'foreigner']);
            } else {
                $prices   = PriceManagement::where('type', 'default')
                    ->where('mode', $booking->vehicle)
                    ->first(['indian', 'foreigner']);
            }
        }
        return view('front.booking.booking', compact('booking', 'states', 'prices', 'countries', 'user', 'id'));
    }

    //check date is weekend or not
    public function isWeekend($date)
    {
        $weekDay = date('w', strtotime($date));
        return ($weekDay == 0 || $weekDay == 6);
    }

    //stored customers and booking details after payment success
    public function saveSafariBooking(Request $request, $id)
    {
        // $request->all();
        $booking = Booking::find($id);
        $booking->status = 'paid';
        $booking->state = $request->state;
        $booking->address = $request->address;
        $booking->total = $request->payable_amount;
        $booking->payment_id = $request->razorpy_payment_id;
        $booking->save();

        Http::post(env('CRM_LEAD_URL') . '/update-lead-status', [
            'name' => $booking->user->name,
            'email' => $booking->user->email,
            'website' => 'kazirangabooking.com',
            'mobile' =>  $booking->user->phone,
            'address' => $booking->address,
            'state' => $booking->state,
            'assigned_to' => null,
            'zone' => $booking->zone,
            'lead_status' =>  'paid',
            'payment_status' =>  'paid'
        ]);

        $add = $booking->address;
        $ste = $booking->state;

        if (is_array($request->adult) && !empty($request->adult)) {
            foreach ($request->adult as $key => $value) {
                if ($value['name'] !== null && $value['age'] !== null && $value['gender'] !== null && $value['nationality'] !== null && $value['state'] !== null && $value['idproof'] !== null && $value['idproof_number'] !== null) {
                    $customer               = new BookingCustomers();
                    $customer->booking_id   = $id;
                    $customer->type         = 'adult';
                    $customer->name         = $value['name'];
                    $customer->age          = $value['age'];
                    $customer->gender       = $value['gender'];
                    $customer->nationality  = $value['nationality'];
                    $customer->state  = $value['state'];
                    $customer->idproof      = $value['idproof'];
                    $customer->idproof_number = $value['idproof_number'];
                    $customer->save();
                }
            }
        }

        if ($request->children_submit == 1 && is_array($request->child) && !empty($request->child)) {
            foreach ($request->child as $key => $value) {
                if ($value['name'] !== null && $value['age'] !== null && $value['gender'] !== null && $value['nationality'] !== null && $value['state'] !== null) {
                    $child               = new BookingCustomers();
                    $child->type         = 'children';
                    $child->booking_id   = $id;
                    $child->name         = $value['name'];
                    $child->age          = $value['age'];
                    $child->gender       = $value['gender'];
                    $child->nationality  = $value['nationality'];
                    $customer->state  = $value['state'];
                    $child->save();
                }
            }
        }

        $booked_customers = BookingCustomers::where('booking_id', $id)->get();

        foreach ($booked_customers as $customer) {
            $customer->state = $booking->state;
            $customer->id_proof = $customer->idproof;
            $customer->idnumber = $customer->idproof_number;
        }

        Http::post(env('CRM_LEAD_URL') . '/booking', [
            'address' => $add,
            'state'  =>  $ste,
            'mobile' =>  $booking->user->phone,
            'website' => 'kazirangabooking.com',
            'date' =>  $booking->date,
            'time' => ucfirst($booking->timing),
            'mode' => ucfirst($booking->vehicle),
            'adult' => BookingCustomers::where('booking_id', $id)->where('type', 'adult')->count(),
            'child' => BookingCustomers::where('booking_id', $id)->where('type', 'children')->count(),
            'transaction_id' => $booking->payment_id,
            'sanctuary' => 'kaziranga',
            'amount' =>  $booking->total,
            'booked_customers' => json_encode($booked_customers),
        ]);

        return redirect()->route('payment-success');
    }

    //success page
    public function paymentSuccess()
    {
        return view('front.payment-success.payment-success');
    }










    //store package booking
    public function kazirangaPackageBooking(Request $request)
    {
        $rules = [
            'name'                      =>  'required',
            'email'                     =>  'required',
            'phone'                     =>  'required',
        ];

        $messages = [
            'name.required'             => 'Please enter your Name.',
            'email.required'            => 'Please enter Email.',
            'phone.required'            => 'Please enter Mobile Number',
        ];

        $this->validate($request, $rules, $messages);

        $user_exists = User::where('phone', $request->phone)->exists();

        if ($user_exists) {
            $user_id = User::where('phone', $request->phone)->value('id');
            $user           = User::find($user_id);
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $user->save();
        } else {

            $user           = new User();
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->phone    = $request->phone;
            $user->save();
        }
        $booking                 = new PackageBooking(); //hotel_type
        $booking->type           = 'package';
        $booking->user_id        = $user->id;
        $booking->package_option_nationality = $request->btnradio;
        $booking->package_option_id = $request->option_id;
        $booking->package_id = $request->package_id;
        $booking->adults       = $request->no_of_adults;
        $booking->children     = ($request->no_of_childs < 0) ? 0 : $request->no_of_childs;
        $booking->rooms         = $request->no_of_rooms;
        $booking->save();
        return redirect()->route('create.package.booking', $booking->id);
    }

    //retrieve package booking details and redirect on booking blade file
    public function createPackageBooking($id)
    {

        $booking = PackageBooking::where('id', $id)->get();

        $blocked_dates = PackageFestivalDates::where('type', 'blocked')->get();
        if ($booking[0]['package_option_nationality'] == 'indian') {
            $package_option     = PackageIndianOption::find($booking[0]['package_option_id']);
        } else {
            $package_option     = PackageForeignerOptions::find($booking[0]['package_option_id']);
        }
        if (is_null($package_option)) {

            return redirect()->route('/')->with('error', 'Session expired !!Please create booking again');
        }

        $total_cost = 0;
        if (isset($booking[0])) {

            $bk = $booking[0];
            $total  = $bk['adults'] + $bk['children'];
            $t = $bk['rooms'];

            $left_person = max(0, (($total) - ($t * 2)));

            $ex_ad = max(0, $left_person - ($bk['children']));

            $ecost = $ex_ad * $package_option['extra_beds'];

            $jeep = (($total) % 6 != 0) ? intval((($total) / 6) + 1) : intval((($total) / 6));

            $safari_price = ($package_option['s_de_price']) * $jeep;

            $total_cost = $ecost + $safari_price + ($package_option['extra_bed_ch'] * $bk['children']) + ($t * $package_option['price']);
        }


        return view('front.packages.booking', compact('booking', 'package_option', 'blocked_dates'));
    }

    //check festival date
    public function checkPackageFestivalDate(Request $request)
    {
        $date_not_available = PackageFestivalDates::where('type', 'festival')
            ->where('start', '<=', $request->selected_date)
            ->where('end', '>=', $request->selected_date)
            ->first();


        if (!empty($date_not_available)) {
            $booking = PackageBooking::where('id', $request->lastDigit)->get();

            $blocked_dates = PackageFestivalDates::where('type', 'blocked')->get();
            if ($booking[0]['package_option_nationality'] == 'indian') {
                $package_option     = PackageIndianOption::find($booking[0]['package_option_id']);
            } else {
                $package_option     = PackageForeignerOptions::find($booking[0]['package_option_id']);
            }
            if (is_null($package_option)) {

                return redirect()->route('/')->with('error', 'Session expired !!Please create booking again');
            }

            $total_cost = 0;
            if (isset($booking[0])) {
                $taxper = 5;
                $bk = $booking[0];
                $total  = $bk['adults'] + $bk['children'];
                $t = $bk['rooms'];

                $left_person = max(0, (($total) - ($t * 2)));

                $ex_ad = max(0, $left_person - ($bk['children']));

                $ecost = $ex_ad * $package_option['fes_ad_price'];

                // $jeep = (($total) % 6 != 0) ? intval((($total) / 6) + 1) : intval((($total) / 6));

                if ($package_option['safari_type'] == "cantare") {
                    $jeep = $total;
                    $safari_price = ($package_option['s_fe_price']) * $jeep;
                } else {
                    $jeep = (($bk['adults']) % 6 != 0) ? intval((($bk['adults']) / 6) + 1) : intval((($total) / 6));
                    $safari_price = ($package_option['s_fe_price']) * $jeep;
                }

                // $safari_price = ($package_option['s_fe_price']) * $jeep;

                $total_cost = $ecost + $safari_price + ($package_option['fes_ch_price'] * $bk['children']) + ($t * $package_option['fes_room_price']);
                $tax_amount = ($taxper / 100) * ($total_cost);
                $feesFinal = $tax_amount + $total_cost;
            }
            return response()->json(['success' => $date_not_available, 'booking' => $booking, 'total_cost' => $total_cost, 'feesFinal' => $feesFinal, 'tax_amount' => $tax_amount, 'blocked_dates' => $blocked_dates]);
        }
        return response()->json(['success' => $date_not_available]);
    }

    //check if booking id is exist then procedd for razor pay payment
    public function razorpayUpdate(Request $request)
    {
        $rules = [
            'booking_id'    =>  'required',
            'selected_date' =>  'required',
            'amount'        =>  'required',
        ];

        $messages = [
            'booking_id.required'     => 'Booking id required',
            'selected_date.required'  => 'Please select any date.',
            'amount.required'         => 'Amount is required.',
        ];

        $this->validate($request, $rules, $messages);

        $booking_exists = PackageBooking::where('id', $request->booking_id)->exists();
        $data = [];
        if ($booking_exists) {
            $data = [
                "date"     => $request->selected_date,
                "total"    => $request->amount
            ];

            $do = PackageBooking::where('id', $request->booking_id)->update($data);
            if ($do) {
                return json_encode(['status' => "success"]);
            } else {
                return json_encode(['status' => "error", "message" => "Something went wrong, please try again."]);
            }
        } else {
            return json_encode(['status' => "error", "message" => $messages]);
        }
    }

    //save package booking details and redirect to success page
    public function packagePaymentSuccess(Request $request)
    {
        $id = $request->booking_id;
        $total_payable_amount =  $request->total_payable_amount;
        $booking = PackageBooking::find($id);
        $booking->status = $request->status;
        $booking->total = $request->amount;
        $booking->payment_id = $request->razorpay_payment_id;
        $booking->date  = $request->selected_date;
        $booking->save();

        $payment_status = 'paid';
        $due_amount     = 0;
        if ($total_payable_amount > $booking->total) {
            $payment_status = 'partially paid';
            $due_amount = round($total_payable_amount / 2);
        }
        Http::post(env('CRM_LEAD_URL') . '/update-lead-status', [
            'name' => $booking->user->name,
            'email' => $booking->user->email,
            'mobile' =>  $booking->user->phone,
            'address' => null,
            'website' => 'kazirangabooking.com',
            'state' => null,
            'assigned_to' => null,
            'booking_type' => 'package',
            'lead_status' =>  $payment_status,
            'payment_status' =>  $payment_status
        ]);
        if ($booking->package_option_nationality == 'indian') {
            $package_option     = PackageIndianOption::find($booking->package_option_id);
        } else {
            $package_option     = PackageForeignerOptions::find($booking->package_option_id);
        }
        $booked_customers = BookingCustomers::where('booking_id', $id)->get();
        Http::post(env('CRM_LEAD_URL') . '/booking', [
            'address' => null,
            'state'  =>  null,
            'mobile' =>  $booking->user->phone,
            'website' => 'kazirangabooking.com',
            'date' =>  $booking->date,
            'time' => '',
            'mode' => '',
            'type' => 'package',
            'adult' => $booking->adults,
            'child' => (int)$booking->children,
            'transaction_id' => $booking->payment_id,
            'sanctuary' => 'kaziranga',
            'amount' =>  $booking->total,
            'due_amount' =>  $due_amount,
            'nationality' => $booking->package_option_nationality,
            'package_name' => $booking->package->name,
            'package_type' => $package_option->category->category,
            'no_of_room' => $package_option->rooms,
            'extra_beds' => $package_option->extra_beds,
            'booked_customers' => json_encode($booked_customers),
        ]);

        return response()->json(['success' => 'payment_success']);
    }
}
