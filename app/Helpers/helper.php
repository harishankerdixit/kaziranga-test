<?php

use App\Models\HotelRoomAvailable;
use App\Models\Setting;
use Illuminate\Http\Request;


if (!function_exists('getRazorpayKey')) {
    function getRazorpayKey()
    {
        $razorpay = Setting::where('type', 'razorpay')->value('value');
        return $razorpay['razorpay_key'];
    }
}
if (!function_exists('getRazorpaySecretKey')) {
    function getRazorpaySecretKey()
    {
        $razorpay = Setting::where('type', 'razorpay')->value('value');
        return $razorpay['razorpay_secret_key'];
    }
}

if (!function_exists('getPaisaData')) {
    function getPaisaData($hotelId, $roomId, $check_in_date, $check_out_date)
    {
        $paisa = HotelRoomAvailable::where('hotel_id', $hotelId)
            ->where('room_id', $roomId)
            ->where('status', 1)
            ->where(function ($query) use ($check_in_date, $check_out_date) {
                $query->where(function ($query) use ($check_in_date, $check_out_date) {
                    $query->where('room_check_in', '<=', $check_in_date)
                        ->where('room_check_out', '>=', $check_out_date);
                })
                    ->orWhere(function ($query) use ($check_in_date, $check_out_date) {
                        $query->whereBetween('room_check_in', [$check_in_date, $check_out_date])
                            ->where('room_check_out', '>=', $check_in_date);
                    })
                    ->orWhere(function ($query) use ($check_in_date, $check_out_date) {
                        $query->where('room_check_in', '<=', $check_in_date)
                            ->where('room_check_out', '>=', $check_out_date);
                    })
                    ->orWhere(function ($query) use ($check_in_date, $check_out_date) {
                        $query->where('room_check_in', '<=', $check_in_date)
                            ->where('room_check_out', '>=', $check_out_date);
                    })
                    ->orWhere(function ($query) use ($check_in_date, $check_out_date) {
                        $query->where('room_check_in', '=', "2024-10-15")
                            ->where('room_check_out', '>=', "2024-10-16");
                    })
                    ->orWhere(function ($query) use ($check_in_date, $check_out_date) {
                        if ($check_in_date instanceof DateTime) {
                            $getCheckIn = $check_in_date->format('Y-m-d');
                            $getCheckOut = $check_out_date->format('Y-m-d');
                        } else {
                            $getCheckIn = $check_in_date;
                            $getCheckOut = $check_out_date;
                        }
                        $query->where('room_check_out', '>=',  $getCheckIn)
                            ->where('room_check_out', '<=', $getCheckOut);
                    });
            })
            ->first();
        return $paisa;
    }
}
