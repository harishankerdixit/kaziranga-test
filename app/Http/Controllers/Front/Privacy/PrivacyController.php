<?php

namespace App\Http\Controllers\Front\Privacy;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy = PageManagement::where('type', 'privacy')->first();
        return view('front.privacy.privacy',compact('privacy'));
    }
}
