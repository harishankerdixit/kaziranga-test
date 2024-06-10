<?php

namespace App\Http\Controllers\Front\Pricingtable;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $pricingtable = PageManagement::where('type', 'pricingtable')->first();
        return view('front.pricingtable.pricing',compact('pricingtable'));
    }
}
