<?php

namespace App\Http\Controllers\Front\HotalsAndResort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotalDetailsController extends Controller
{
    public function index()
    {
        return view('front.home.index');
    }
}
