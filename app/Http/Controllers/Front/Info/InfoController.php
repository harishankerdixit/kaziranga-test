<?php

namespace App\Http\Controllers\Front\Info;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index()
    {
        $history = PageManagement::where('type', 'history')->first();
        return view('front.info.info',compact('history'));
    }
}
