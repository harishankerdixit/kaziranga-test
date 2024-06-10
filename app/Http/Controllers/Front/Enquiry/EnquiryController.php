<?php

namespace App\Http\Controllers\Front\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class EnquiryController extends Controller
{
    public function index()
    {
        return view('front.home.index');
    }

    public function enquiry(Request $request)
    {
        // if ($request->type == 'general' || $request->type == 'package' || $request->type == 'hotel') {
        //     $validatedData = $request->validate([
        //         'type' => 'required',
        //         'traveller_name' => 'required',
        //         'mobile_no' => 'required|numeric',
        //         'email_id' => 'required|email',
        //         'time_slot' => 'required',
        //         'booking_date' => 'required|after:today',
        //         'message' => 'required'
        //     ]);
        // } elseif ($request->type == 'safari') {
        //     $validatedData = $request->validate([
        //         'type' => 'required',
        //         'traveller_name' => 'required',
        //         'mobile_no' => 'required|numeric',
        //         'email_id' => 'required|email',
        //         'time_slot' => 'required',
        //         'booking_date' => 'required|after:today',
        //         'safari_type' => 'required'
        //     ]);
        // }

        $validatedData = $request->all();
        DB::beginTransaction();
        if ($request->hotel_id) {
            $validatedData['hotel_id'] = $request->hotel_id;
        }
        if ($request->package_id) {
            $validatedData['package_id'] = $request->package_id;
        }
        $userSafariDetails = Enquiry::create($validatedData);
        DB::commit();

        $meta = '';
        if (isset($request->type) && $request->type != '') {
            $meta .= 'Type : ' . $request->type;
        }
        if (isset($request->booking_date) && $request->booking_date != '') {
            $meta .= ',Booking Date : ' . $request->booking_date;
        }
        if (isset($request->time_slot) && $request->time_slot != '') {
            $meta .= ',Timing : ' . $request->time_slot;
        }
        if (isset($request->safari_type) && $request->safari_type != '') {
            $meta .= ',Vehicle : ' . $request->safari_type;
        }

        Http::post(env('CRM_LEAD_URL_MAIN') . '/save-lead', [
            'name'          =>  $request->traveller_name,
            'mobile'        =>  $request->mobile_no,
            'website'       => 'kazirangabooking.com',
            'custom_data'   =>  $meta,
        ]);

        if ($userSafariDetails && $userSafariDetails->id && ($request->type == 'general' || $request->type == 'package' || $request->type == 'hotel')) {
            return redirect()->back()->with('success', 'Enquiry message successfully received,We will call you after sometime.');
        } elseif ($userSafariDetails && $userSafariDetails->id && $request->type == 'safari') {
            $states = State::all();
            return view('front.booking.booking', compact('userSafariDetails', 'states'));
        } else {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function saveEnquiry(Request $request)
    {
        $meta = '';
        if (isset($request->type) && $request->type != '') {
            $meta .= 'Type : ' . $request->type;
        }
        if (isset($request->booking_date) && $request->booking_date != '') {
            $meta .= ',Booking Date : ' . $request->booking_date;
        }
        if (isset($request->timing) && $request->timing != '') {
            $meta .= ',Timing : ' . $request->timing;
        }
        if (isset($request->mode) && $request->mode != '') {
            $meta .= ',Vehicle : ' . $request->mode;
        }
        if (isset($request->zone) && $request->zone != '') {
            $meta .= ',Zone : ' . $request->zone;
        }
        if (isset($request->package_name) && $request->package_name != '') {
            $meta .= ',Package Name : ' . $request->package_name;
        }
        Http::post(env('CRM_LEAD_URL_MAIN') . '/save-lead', [
            'name'          =>  $request->name,
            'mobile'        =>  $request->phone,
            'website'       => 'kazirangabooking.com',
            'custom_data'   =>  $meta,
        ]);

        return response()->json(['success' => 'user  register']);
    }
}
