<?php

namespace App\Http\Controllers\Front\DoDont;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class DoDontController extends Controller
{
    public function index()
    {
        $do_dont = PageManagement::where('type', 'do-and-dont')->first();
        return view('front.do_dont.do_dont',compact('do_dont'));
    }
}
