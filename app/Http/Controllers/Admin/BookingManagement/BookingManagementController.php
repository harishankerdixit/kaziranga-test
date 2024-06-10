<?php

namespace App\Http\Controllers\Admin\BookingManagement;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingCustomers;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\Package;
use App\Models\PackageCategory;
use App\Models\PackageForeignerOptions;
use App\Models\PackageIndianOption;

class BookingManagementController extends Controller
{
    public function Customers(Request $request)
    {
        $filter_name = $request->filter_name;
        $filter_number = $request->filter_number;
        $filter_email = $request->filter_email;

        $customers = Customer::query();

        if (isset($filter_name)) {
            $customers = $customers->where('name', 'like', '%' . $filter_name . '%');
        }

        if (isset($filter_number)) {
            $customers = $customers->where('phone', 'like', '%' . $filter_number . '%');
        }

        if (isset($filter_email)) {
            $customers = $customers->where('email', 'like', '%' . $filter_email . '%');
        }

        $customers = $customers->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.booking.customers', compact('customers', 'filter_name', 'filter_number', 'filter_email'));
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if ($customer) {
            $customer->delete();

            session()->flash('success', 'Entry deleted successfully');
        } else {
            session()->flash('error', 'Entry not found');
        }

        return redirect()->back();
    }

    public function safariBooking(Request $request, $type)
    {
        ini_set('memory_limit', '512M');

        $filter_type = $request->filter_type;
        $filter_user = $request->filter_user;
        $filter_phone = $request->filter_phone;
        $filter_email = $request->filter_email;
        $filter_package = $request->filter_package;
        $filter_date = $request->filter_date;
        $filter_booking_type = $request->filter_booking_type;
        $filter_timing = $request->filter_timing;
        $filter_status = $request->filter_status;
        $filter_created_date = $request->filter_created_date;

        $bookings = Booking::select('bookings.*', 'customers.phone', 'customers.name', 'customers.email')
            ->leftJoin('customers', 'customers.id', '=', 'bookings.user_id');

        if (isset($filter_type)) {
            $bookings = $bookings->where('bookings.type', $filter_type);
        }
        if (isset($filter_user)) {
            $bookings = $bookings->where('customers.name', 'like', '%' . $filter_user . '%');
        }
        if (isset($filter_phone)) {
            $bookings = $bookings->where('customers.phone', 'like', '%' . $filter_phone . '%');
        }
        if (isset($filter_email)) {
            $bookings = $bookings->where('customers.email', 'like', '%' . $filter_email . '%');
        }
        if (isset($filter_package)) {
            $bookings = $bookings->where('bookings.package_id', $filter_package);
        }
        if (isset($filter_date)) {
            $bookings = $bookings->where('bookings.date', $filter_date);
        }
        if (isset($filter_booking_type)) {
            $bookings = $bookings->where('bookings.zone', $filter_booking_type);
        }
        if (isset($filter_timing)) {
            $bookings = $bookings->where('bookings.timing', $filter_timing);
        }
        if (isset($filter_status)) {
            $bookings = $bookings->where('bookings.status', $filter_status);
        }
        if (isset($filter_created_date)) {
            $bookings = $bookings->whereDate('bookings.created_at', $filter_created_date);
        }

        $users = Customer::get(['id', 'name']);
        $bookings = $type == 'safari' || $type == 'package' || $type == 'hotel' ?
            $bookings->where('type', $type)->orderBy('id', 'desc')->paginate(20) :
            $bookings->whereNotIn('type', ['safari', 'package', 'hotel'])->orderBy('id', 'desc')->paginate(20);

        if ($type == 'safari') {
            return view('admin.booking.safari-booking', compact('bookings', 'users', 'filter_date', 'filter_user', 'filter_booking_type', 'filter_timing', 'filter_status', 'filter_created_date', 'filter_phone', 'filter_email'));
        } else if ($type == 'package') {
            $packages = Package::get(['id', 'name']);
            foreach ($bookings as $booking) {
                $data = Package::find($booking->package_id);
                if ($data) {
                    $booking->package_name = $data->name;
                } else {
                    $booking->package_name = '';
                }
            }
            return view('admin.booking.package-booking', compact('bookings', 'packages', 'filter_date', 'filter_user', 'filter_booking_type', 'filter_timing', 'filter_status', 'filter_created_date', 'filter_phone', 'filter_email'));
        } else {
            return view('admin.booking.hotel-booking', compact('bookings', 'filter_date', 'filter_user', 'filter_booking_type', 'filter_timing', 'filter_status', 'filter_created_date', 'filter_phone', 'filter_email'));
        }
    }

    public function safariBookingDestroy($id)
    {
        $booking = Booking::find($id);

        if ($booking) {
            $booking->delete();

            session()->flash('success', 'Entry deleted successfully');
        } else {
            session()->flash('error', 'Entry not found');
        }

        return redirect()->back();
    }

    // public function safariBookingEdit($id)
    // {
    //     $booking = Booking::find($id);
    //     $users = Customer::join('bookings', 'bookings.user_id', '=', 'customers.id')
    //         ->where('bookings.id', $id)
    //         ->get(['customers.id', 'customers.name', 'customers.email', 'customers.phone']);

    //     if ($booking->type == 'safari') {
    //         $traveller_details = BookingCustomers::where('booking_id', $id)->get();
    //         $booking_details = Booking::where('id', $id)->get()->toArray();
    //         return view('admin.booking.safari-booking-edit', compact('users', 'booking_details', 'traveller_details'));
    //     } else if ($booking->type == 'package') {
    //         if ($booking->package_option_nationality == 'indian') {
    //             $package_option     = PackageIndianOption::find($booking->package_option_id);
    //         } else {
    //             $package_option     = PackageForeignerOptions::find($booking->package_option_id);
    //         }
    //         $traveller_details = BookingCustomers::where('booking_id', $id)->get();
    //         $booking_details = Booking::where('id', $id)->get();
    //         $package = Package::find($booking->package_id);
    //         $category = PackageCategory::find($package_option->category_id);
    //         return view('admin.booking.package-booking-edit', compact('users', 'booking_details', 'traveller_details', 'package_option', 'package', 'category'));
    //     } else {
    //         $traveller_details = BookingCustomers::where('booking_id', $id)->get();
    //         $booking_details = Booking::where('id', $id)->get();
    //         $hotel = Hotel::find($booking->hotel_id);

    //         return view('admin.booking.package-booking-edit', compact('users', 'booking_details', 'traveller_details', 'hotel'));
    //     }
    // }


    public function safariBookingEdit($id)
    {
        $booking = Booking::find($id);
        $users = Customer::join('bookings', 'bookings.user_id', '=', 'customers.id')
            ->where('bookings.id', $id)
            ->get(['customers.id', 'customers.name', 'customers.email', 'customers.phone', 'bookings.state', 'bookings.address']);


        if ($booking->type == 'safari') {
            $traveller_details = BookingCustomers::where('booking_id', $id)->get();
            $booking_details = Booking::where('id', $id)->get()->toArray();
            return view('admin.booking.safari-booking-edit', compact('users', 'booking_details', 'traveller_details'));
        } else if ($booking->type == 'package') {
            if ($booking->package_option_nationality == 'indian') {
                $package_option     = PackageIndianOption::find($booking->package_option_id);
            } else {
                $package_option     = PackageForeignerOptions::find($booking->package_option_id);
            }
            $traveller_details = BookingCustomers::where('booking_id', $id)->get();
            $booking_details = Booking::where('id', $id)->get();
            $package = Package::find($booking->package_id);
            $category = PackageCategory::find($package_option->category_id);
            return view('admin.booking.package-booking-edit', compact('users', 'booking_details', 'traveller_details', 'package_option', 'package', 'category'));
        } else {
            $traveller_details = BookingCustomers::where('booking_id', $id)->get();
            $booking_details = Booking::where('id', $id)->get();
            $hotel = Hotel::find($booking->hotel_id);

            return view('admin.booking.hotel-booking-edit', compact('users', 'booking_details', 'traveller_details', 'hotel'));
        }
    }
}
