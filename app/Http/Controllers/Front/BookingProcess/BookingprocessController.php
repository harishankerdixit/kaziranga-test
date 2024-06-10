<?php

namespace App\Http\Controllers\Front\Bookingprocess;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class BookingprocessController extends Controller
{
    public function index()
    {
        $bookingprocess = PageManagement::where('type', 'bookingprocess')->first();
        return view('front.bookingprocess.booking_process',compact('bookingprocess'));
    }
}
