<?php

namespace App\Http\Controllers\Front\BestTime;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class BesttimeController extends Controller
{
    public function index()
    {
        $besttime = PageManagement::where('type', 'besttime')->first();
        return view('front.best_time.best_time',compact('besttime'));
    }
}
