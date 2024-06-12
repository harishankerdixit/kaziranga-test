<?php

namespace App\Http\Controllers\Front\HowToReach;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class HowToReachController extends Controller
{
    public function index()
    {
        $reach = PageManagement::where('type', 'reach')->first();
        return view('front.how_to_reach.how_to_reach',compact('reach'));
    }
}
