<?php

namespace App\Http\Controllers\Front\HotalsAndResort;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Enquiry;
use App\Models\Hotel;
use App\Models\HotelAmenities;
use App\Models\HotelRoom;
use App\Models\HotelRoomBlock;
use App\Models\PageManagement;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HotalResortController extends Controller
{
    public function index(Request $request)
    {
        if ($request->searching_filter == "searching") {
            $searching_filter = $request->searching_filter;
            Session::put('searching_filter', $request->searching_filter);
            $setNightsDiff = $request->setNightsDiff;

            // Store the check-in date in the session
            Session::put('check_in', $request->check_in);
            Session::put('check_out', $request->check_out);
            Session::put('setAdultsTotal', $request->setAdultsTotal);
            Session::put('setChildTotal', $request->setChildTotal);
            Session::put('setRoomsTotal', $request->setRoomsTotal);
            Session::put('setNightsDiff', $request->setNightsDiff);
            Session::put('setJsonData', $request->setJsonData);

            $allHotels = $request->input('all_hotels');
            Session::put('allHotels', $request->all_hotels);
            $setAdultsTotal = $request->setAdultsTotal;
            $setChildTotal = $request->setChildTotal;
            $setRoomsTotal = $request->setRoomsTotal;
            $checked_in = $request->input('check_in');
            $checked_out = $request->input('check_out');

            $getArrayRep =  $this->applyFilterData($request->setJsonData);
            $setAdultsTotal = $getArrayRep['adults'];
            $setChildTotal = $getArrayRep['child'];
            $setRoomsTotal = $getArrayRep['room'];
            $hotel   = PageManagement::Where('type', 'hotel')->first();

            $query = Hotel::where('status', true);
            if ($request->has('all_hotels')) {
                $query->where('name', $request->input('all_hotels'));
            }
            $kazi_hotels = $query->paginate(100);
            $hotel_name = Hotel::select('id', 'name')->where('status', true)->get()->toArray();
            return view('front.hotel.hotel', [
                'kazi_hotels' => $kazi_hotels,
                'hotel_name' => $hotel_name,
                'hotel' => $hotel,
                'allHotels' => $allHotels,
                'checked_in' => $checked_in,
                'checked_out' => $checked_out,
                'setAdultsTotal' => $setAdultsTotal,
                'setChildTotal' => $setChildTotal,
                'setRoomsTotal' => $setRoomsTotal,
                'setNightsDiff' => $setNightsDiff,
                'searching_filter' => $searching_filter
            ]);
        } else {
            $hotel   = PageManagement::Where('type', 'hotel')->first();

            $query = Hotel::where('status', true);
            if ($request->has('rating')) {
                $starRatings = $request->input('rating');
                $query->whereIn('rating', $starRatings);
            }
            if ($request->has('property_type')) {
                $query->whereIn('property_type', $request->input('property_type'));
            }
            if ($request->has('price')) {
                $query->whereIn('price_type',  $request->input('price'));
            }

            $kazi_hotels = $query->paginate(100);
            $hotel_name = Hotel::select('id', 'name')->where('status', true)->get()->toArray();
            $setNightsDiff = 1;
            $checked_in = date('m/d/Y');
            $checked_out = date('m/d/Y', strtotime($checked_in . ' +1 day'));

            if ($request->setAdultsTotal == Null) {
                $setAdultsTotal = 2;
            } else {
                $setAdultsTotal = $request->setAdultsTotal;
            }
            if ($request->setChildTotal == Null) {
                $setChildTotal = 0;
            } else {
                $setChildTotal = $request->setChildTotal;
            }
            if ($request->setRoomsTotal == Null) {
                $setRoomsTotal = 1;
            } else {
                $setRoomsTotal = $request->setRoomsTotal;
            }

            // Store the check-in date in the session
            Session::put('check_in', $checked_in);
            Session::put('check_out', $checked_out);
            Session::put('setAdultsTotal', $setAdultsTotal);
            Session::put('setChildTotal', $setChildTotal);
            Session::put('setRoomsTotal', $setRoomsTotal);
            Session::put('setNightsDiff', $setNightsDiff);
            Session::put('setJsonData', '[{"room":1,"adults":2,"children":0}]');
            $searching_filter = "";
            $allHotels = '';
            Session::put('searching_filter', "notSearching");
            Session::put('allHotels', "");

            return view('front.hotel.hotel', compact('kazi_hotels', 'hotel_name', 'hotel', 'setNightsDiff', 'checked_in', 'checked_out', 'setAdultsTotal', 'setChildTotal', 'setRoomsTotal', 'searching_filter', 'allHotels'));
        }
    }

    public function hotelDetails(Request $request, $slug)
    {
        $hotel = Hotel::where('slug', $slug)->first();
        $hotelId = $hotel->id;

        $hotelAmenities = HotelAmenities::where('hotel_id', $hotel->id)->where('status', true)->pluck('amenity_id');
        $allAmenities = Amenities::whereIn('id', $hotelAmenities)->where('status', true)->get()->toArray();

        $hotelRooms = HotelRoom::where('hotel_id', $hotel->id)->where('status', true)->get();
        $hotel_name = Hotel::select('id', 'name')->where('status', true)->get()->toArray();

        if ($request->searching_filter == "searching2") {
            Session::put('searching_filter', $request->searching_filter);
            Session::put('allHotels', $request->all_hotels);
            Session::put('check_in', $request->check_in);
            Session::put('check_out', $request->check_out);
            Session::put('setAdultsTotal', $request->setAdultsTotal);
            Session::put('setChildTotal', $request->setChildTotal);
            Session::put('setRoomsTotal', $request->setRoomsTotal);
            Session::put('setNightsDiff', $request->setNightsDiff);

            Session::put('setJsonData', $request->setJsonData);

            $searching_filter = $request->searching_filter;
            $setNightsDiff = $request->setNightsDiff;

            $allHotels = $request->input('all_hotels');
            $setAdultsTotal = $request->setAdultsTotal;
            $setChildTotal = $request->setChildTotal;
            $setRoomsTotal = $request->setRoomsTotal;
            $check_in = $request->input('check_in');
            $check_out = $request->input('check_out');

            $getArrayRep =  $this->applyFilterData($request->setJsonData);
            $setAdultsTotal = $getArrayRep['adults'];
            $setChildTotal = $getArrayRep['child'];
            $setRoomsTotal = $getArrayRep['room'];

            if ($setAdultsTotal == Null) {
                $setAdultsTotal = 2;
            } else {
                $setAdultsTotal = $setAdultsTotal;
            }
            if ($setChildTotal == Null) {
                $setChildTotal = 0;
            } else {
                $setChildTotal = $setChildTotal;
            }
            if ($setRoomsTotal == Null) {
                $setRoomsTotal = 1;
            } else {
                $setRoomsTotal = $setRoomsTotal;
            }

            return view('front.hotel.hotel-detail', compact('slug', 'hotel', 'allAmenities', 'hotel_name', 'hotelId', 'hotelRooms', 'setNightsDiff', 'check_in', 'check_out', 'searching_filter', 'allHotels', 'setAdultsTotal', 'setChildTotal', 'setRoomsTotal'));
        } else {
            $check_in = Session::get('check_in');
            $check_out = Session::get('check_out');
            $check_in = date_create_from_format('m/d/Y', $check_in);
            $check_in = $check_in->format('Y-m-d');
            $check_out = date_create_from_format('m/d/Y', $check_out);
            $check_out = $check_out->format('Y-m-d');

            $searching_filter = Session::get('searching_filter');
            $allHotels = Session::get('allHotels');
            $setNightsDiff = Session::get('setNightsDiff');

            $setJsonData = Session::get('setJsonData');
            $getArrayRep =  $this->applyFilterData($setJsonData);
            $setAdultsTotal = $getArrayRep['adults'];
            $setChildTotal = $getArrayRep['child'];
            $setRoomsTotal = $getArrayRep['room'];

            if ($setAdultsTotal == Null) {
                $setAdultsTotal = 2;
            } else {
                $setAdultsTotal = $setAdultsTotal;
            }
            if ($setChildTotal == Null) {
                $setChildTotal = 0;
            } else {
                $setChildTotal = $setChildTotal;
            }
            if ($setRoomsTotal == Null) {
                $setRoomsTotal = 1;
            } else {
                $setRoomsTotal = $setRoomsTotal;
            }

            return view('front.hotel.hotel-detail', compact('slug', 'hotel', 'allAmenities', 'hotel_name', 'hotelId', 'hotelRooms', 'setNightsDiff', 'check_in', 'check_out', 'searching_filter', 'setAdultsTotal', 'setChildTotal', 'setRoomsTotal', 'allHotels'));
        }
    }

    public function applyFilterData($setJsonData)
    {
        $values = $setJsonData;
        $data = json_decode($values, true);

        $totalRooms = count($data);
        $totalAdults = 0;
        $totalChildren = 0;

        foreach ($data as $item) {
            $totalAdults += $item['adults'];
            $totalChildren += $item['children'];
        }

        $guests = $totalAdults + $totalChildren;

        return array(
            'room' => $totalRooms,
            'adults' => $totalAdults,
            'child' => $totalChildren,
        );
    }

    public function hotelRoomBooking($roomid, $hotelid, $mealType)
    {
        $check_in = Session::get('check_in');
        $check_out = Session::get('check_out');
        $setAdultsTotal = Session::get('setAdultsTotal');
        $setChildTotal = Session::get('setChildTotal');
        $setRoomsTotal = Session::get('setRoomsTotal');
        $setNightsDiff = Session::get('setNightsDiff');
        $setJsonData = Session::get('setJsonData');

        $roomsData = json_decode($setJsonData, true);
        $totalRooms1 = count($roomsData);
        $totalAdults1 = 0;
        $totalChildren1 = 0;
        foreach ($roomsData as $item) {
            $totalAdults1 += $item['adults'];
            $totalChildren1 += $item['children'];
        }
        $guest1 = $totalAdults1 + $totalChildren1;



        $check_in_date = Carbon::parse($check_in);
        $check_out_date = Carbon::parse($check_out);

        $formatted_check_in = $check_in_date->format('Y-m-d');
        $formatted_check_out = $check_out_date->format('Y-m-d');

        $carbonCheckInDate = Carbon::createFromFormat('m/d/Y', $check_in);
        $carbonCheckOutDate = Carbon::createFromFormat('m/d/Y', $check_out);
        $CheckInDate = $carbonCheckInDate->format('D d M Y');
        $CheckOutDate = $carbonCheckOutDate->format('D d M Y');

        if (!empty($formatted_check_in) && !empty($formatted_check_out)) {
            $checkBlockDate = HotelRoomBlock::where('hotel_id', $hotelid)
                ->where('room_id', $roomid)
                ->whereDate('room_check_in', $formatted_check_in)
                ->orWhereDate('room_check_in', $formatted_check_out)
                ->exists();

            if ($checkBlockDate) {
                $checkBlockDatess = HotelRoomBlock::where('hotel_id', $hotelid)
                    ->where('room_id', $roomid)
                    ->where(function ($query) use ($formatted_check_in, $formatted_check_out) {
                        $query->where('room_check_in', $formatted_check_in)
                            ->orWhere('room_check_in', $formatted_check_out)
                            ->orWhereBetween('room_check_in', [$formatted_check_in, $formatted_check_out]);
                    })
                    ->get();

                if (!$checkBlockDatess->isEmpty()) {
                    return redirect()->back()->with('error', 'Room is not available for ' . $checkBlockDatess[0]['room_check_in'] . ' date.');
                } else {
                    return redirect()->back()->with('error', 'Room is not available.');
                }
            } else {
                $hotel = Hotel::where('id', $hotelid)->first();
                $hotelRoom = HotelRoom::where('id', $roomid)->where('status', true)->first();
                if ($mealType == "1") {
                    $paisa = getPaisaData($hotelid, $roomid, $formatted_check_in, $formatted_check_out);
                    if ($paisa) {
                        $pricing = $paisa->only_room;
                    } else {
                        $paisa = HotelRoom::where('hotel_id', $hotelid)->where('id', $roomid)->where('status', true)->first();
                        $pricing = $paisa->only_room;
                    }
                } else if ($mealType == "2") {
                    $paisa = getPaisaData($hotelid, $roomid, $formatted_check_in, $formatted_check_out);
                    if ($paisa) {
                        $pricing = $paisa->room_with_breakfast;
                    } else {
                        $paisa = HotelRoom::where('hotel_id', $hotelid)->where('id', $roomid)->where('status', true)->first();
                        $pricing = $paisa->room_with_breakfast;
                    }
                } else if ($mealType == "3") {
                    $paisa = getPaisaData($hotelid, $roomid, $formatted_check_in, $formatted_check_out);
                    if ($paisa) {
                        $pricing = $paisa->room_with_breakfast_dinner;
                    } else {
                        $paisa = HotelRoom::where('hotel_id', $hotelid)->where('id', $roomid)->where('status', true)->first();
                        $pricing = $paisa->room_with_breakfast_dinner;
                    }
                } else {
                    $paisa = getPaisaData($hotelid, $roomid, $formatted_check_in, $formatted_check_out);
                    if ($paisa) {
                        $pricing = $paisa->room_with_breakfast_lunch_dinner;
                    } else {
                        $paisa = HotelRoom::where('hotel_id', $hotelid)->where('id', $roomid)->where('status', true)->first();
                        $pricing = $paisa->room_with_breakfast_lunch_dinner;
                    }
                }

                $totalPrice = 0;
                foreach ($roomsData as $room) {
                    $roomPricing = $this->calculateTotalCost($pricing, $room['adults'], $room['children'], $room['room']);
                    $totalPrice += $roomPricing;
                }
                $pricing = $totalPrice;
                $states = State::get()->toArray();
                return view('front.hotels_and_resort.hotel_room_book', compact('hotel', 'hotelRoom', 'states', 'pricing', 'mealType', 'CheckInDate', 'CheckOutDate', 'setAdultsTotal', 'setChildTotal', 'setRoomsTotal', 'setNightsDiff', 'guest1', 'totalAdults1', 'totalChildren1', 'totalRooms1'));
            }
        } else {
            return redirect()->back()->with('error', 'Check-in or check-out date is missing. Please select both check-in and check-out dates.');
        }
    }

    public function calculateTotalCost($pricing, $setAdultsTotal, $setChildTotal, $setRoomsTotal)
    {
        $roomCost = $pricing;

        // Define the extra costs for adults and children
        $adultExtraCost = 0.35 * $roomCost;
        $childExtraCost = 0.25 * $roomCost;

        // Calculate the total cost based on the number of adults and children
        if ($setAdultsTotal >= 4) {
            // Case: 4 or more adults
            $adultCost = $roomCost + 2 * $adultExtraCost; // Two times extra cost for each adult
        } elseif ($setAdultsTotal > 2) {
            // Case: More than 2 adults
            $adultCost = $roomCost + $adultExtraCost; // One time extra cost for each adult
        } elseif ($setAdultsTotal == 0) {
            // Case: No adults
            $adultCost = 0; // No cost for adults
        } else {
            // Case: 1 or 2 adults
            $adultCost = $roomCost; // No extra cost for adults
        }

        // Calculate the total cost based on the number of children
        if ($setChildTotal == 0) {
            // Case: No children
            $childCost = 0; // No cost for children
        } elseif ($setChildTotal >= 2) {
            // Case: 2 or more children
            $childCost = $childExtraCost * $setChildTotal; // Extra cost for each child
        } else {
            // Case: 1 child
            $childCost = $childExtraCost; // Extra cost for one child
        }

        // Calculate the total cost for the room
        $totalCost = $adultCost + $childCost;
        return $totalCost;
    }


    public function saveHotelBookingData(Request $request)
    {
        $user = null;
        $existingEnquiry = Enquiry::where('email_id', $request->email)->first();
        if ($existingEnquiry) {
            $existingEnquiry->traveller_name = $request->name_values;
            $existingEnquiry->mobile_no = $request->tel_values;
            $existingEnquiry->booking_date = $request->formatted_check_in;
            $existingEnquiry->message = 'Hotel Booking';
            $existingEnquiry->save();

            // $user_id = $existingEnquiry->id;
        } else {
            $user = new Enquiry();
            $user->traveller_name = $request->name_values;
            $user->mobile_no = $request->tel_values;
            $user->email_id = $request->email_values;
            $user->booking_date = $request->formatted_check_in;
            $user->hotel_id = $request->hotel_id;
            $user->message = 'Hotel Booking';
            $user->type = 'hotel';
            $user->save();

            // $user_id = $user->id;
        }

        $existingCustomer = Customer::where('email', $request->email)->first();
        if ($existingCustomer) {
            $existingCustomer->name = $request->name_values;
            $existingCustomer->email = $request->email_values;
            $existingCustomer->phone = $request->tel_values;
            $existingCustomer->save();

            $user_id = $existingCustomer->id;
        } else {
            $user = new Customer();
            $user->name = $request->name_values;
            $user->email = $request->email_values;
            $user->phone = $request->tel_values;
            $user->save();

            $user_id = $user->id;
        }
        $booking = Booking::create([
            'user_id' => $user_id,
            'type' => 'hotel',
            'date' => date('Y-m-d'),
            'timing' => '7:30 AM to 10:00 AM',
            'status' => 'paid',
            'package_option_nationality' => $request->nationalitys,
            'adults' => $request->totalAdultCount,
            'children' => $request->totalChildCount,
            'rooms' => $request->totalRooms,
            'total' => $request->amount,
            'state' => $request->state,
            'address' => $request->destination_values . ' ' . $request->state,
            'payment_id' => $request->razorpay_payment_id,
            'payment_value' => $request->paymentValue,
            'hotel_id' => $request->hotel_id,
            'hotel_due_amount' => $request->finalDiscountPrice,
            'check_in' => $request->formatted_check_in,
            'check_out' => $request->formatted_check_out,
            'room_category' => $request->roomCategory,
            'meal_plan' => $request->mealType,
        ]);
        if ($request->paymentValue == "Full") {
            $payment_status = 'paid';
        } else {
            $payment_status = 'partially paid';
        }

        Http::post(env('CRM_LEAD_URL_MAIN') . '/gir-hotel-direct-booking', [
            'address' => $request->destination_values . ' ' . $request->state . ' ' . $request->nationalitys,
            'country' => $request->nationalitys,
            'state'  =>  $request->state,
            'phone' =>  $request->tel_values,
            'name' =>  $request->name_values,
            'email' =>  $request->email_values,
            'website' => 'kazirangabooking.com',
            'check_in' =>  $request->formatted_check_in,
            'check_out' =>  $request->formatted_check_out,
            // 'time' => ucfirst($booking->timing),
            'note' => 'Hotel Booking',
            'room' => $request->totalRooms,
            'adult' => $request->totalAdultCount,
            'child' => $request->totalChildCount,
            'destination' => 'Kaziranga National park',
            'transaction_id' => $request->razorpay_payment_id,
            'sanctuary' => 'kazi',
            'amount' =>  $request->amount,
            'hotel_due_amount' =>  $request->finalDiscountPrice,
            'payment_status' => $payment_status,
            // 'booked_customers' => json_encode($booked_customers),
        ]);

        Http::post(env('CRM_LEAD_URL') . '/update-lead-data', [
            'name' => $request->name_values,
            'email' => $request->email_values,
            'mobile' =>  $request->tel_values,
            'website' => 'kazirangabooking.com',
            'payment_status' =>  'paid'
        ]);

        Http::post(env('CRM_LEAD_URL') . '/update-lead-status', [
            'name' => $request->name_values,
            'email' => $request->email_values,
            'website' => 'kazirangabooking.com',
            'mobile' =>  $request->tel_values,
            'address' => $request->destination_values . ' ' . $request->state . ' ' . $request->nationalitys,
            'state' => $request->state,
            'assigned_to' => null,
            'booking_type' => null,
            'lead_status' =>  'paid',
            'payment_status' =>  'paid'
        ]);

        return array(
            'status' => 'success',
        );
    }
}
