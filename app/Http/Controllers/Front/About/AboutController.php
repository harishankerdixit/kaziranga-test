<?php

namespace App\Http\Controllers\Front\About;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = PageManagement::where('type', 'about')->first();
        return view('front.about.about',compact('about'));
    }
}
