<?php

namespace App\Http\Controllers\Front\BestTime;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class BesttimeController extends Controller
{
    public function index()
    {
        $bestTime = PageManagement::where('type', 'permit')->first();
        return view('front.best_time.best_time',compact('bestTime'));
    }
}
