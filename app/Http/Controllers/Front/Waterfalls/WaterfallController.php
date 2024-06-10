<?php

namespace App\Http\Controllers\Front\Waterfalls;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class WaterfallController extends Controller
{
    public function index()
    {
        $waterfalls = PageManagement::where('type', 'waterfalls')->first();
        return view('front.waterfalls.waterfalls',compact('waterfalls'));
    }
}
