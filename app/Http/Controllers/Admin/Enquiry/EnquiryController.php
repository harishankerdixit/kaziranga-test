<?php

namespace App\Http\Controllers\Admin\Enquiry;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function packageEnquiry(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_booking_date = $request->filter_booking_date;
        $filter_booking_created = $request->filter_booking_created;

        $customers = Enquiry::query();

        if (isset($filter_name)) {
            $customers = $customers->where('traveller_name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('mobile_no', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_booking_date)) {
            $customers = $customers->where('booking_date', 'like', '%' . $filter_booking_date . '%');
        }

        if (isset($filter_booking_created)) {
            $customers = $customers->where('created_at', 'like', '%' . $filter_booking_created . '%');
        }

        $customers = $customers->where('type', 'package')->orderBy('created_at', 'asc')->paginate(20);

        return view('admin.enquiry.package-enquiry', compact('customers', 'filter_name', 'filter_number', 'filter_booking_date', 'filter_booking_created'));
    }

    public function packageEnquiryDelete($id)
    {
        $customer = Enquiry::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Package Enquiry deleted successfully');
        } else {
            session()->flash('error', 'Package Enquiry not found');
        }

        return redirect()->back();
    }

    public function hotelEnquiry(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_booking_date = $request->filter_booking_date;
        $filter_booking_created = $request->filter_booking_created;

        $customers = Enquiry::query();

        if (isset($filter_name)) {
            $customers = $customers->where('traveller_name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('mobile_no', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_booking_date)) {
            $customers = $customers->where('booking_date', 'like', '%' . $filter_booking_date . '%');
        }

        if (isset($filter_booking_created)) {
            $customers = $customers->where('created_at', 'like', '%' . $filter_booking_created . '%');
        }

        $customers = $customers->where('type', 'hotel')
            ->orderBy('created_at', 'asc')
            ->paginate(20);

        return view('admin.enquiry.hotel-enquiry', compact('customers', 'filter_name', 'filter_number', 'filter_booking_date', 'filter_booking_created'));
    }

    public function hotelEnquiryDelete($id)
    {
        $customer = Enquiry::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Hotel Enquiry deleted successfully');
        } else {
            session()->flash('error', 'Hotel Enquiry not found');
        }

        return redirect()->back();
    }

    public function generalEnquiry(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_booking_date = $request->filter_booking_date;
        $filter_booking_created = $request->filter_booking_created;

        $customers = Enquiry::query();

        if (isset($filter_name)) {
            $customers = $customers->where('traveller_name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('mobile_no', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_booking_date)) {
            $customers = $customers->where('booking_date', 'like', '%' . $filter_booking_date . '%');
        }

        if (isset($filter_booking_created)) {
            $customers = $customers->where('created_at', 'like', '%' . $filter_booking_created . '%');
        }

        $customers = $customers->where('type', 'general')->orderBy('created_at', 'asc')->paginate(20);

        return view('admin.enquiry.general-enquiry', compact('customers', 'filter_name', 'filter_number', 'filter_booking_date', 'filter_booking_created'));
    }

    public function generalEnquiryDelete($id)
    {
        $customer = Enquiry::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Contact Enquiry deleted successfully');
        } else {
            session()->flash('error', 'Contact Enquiry not found');
        }

        return redirect()->back();
    }
}
