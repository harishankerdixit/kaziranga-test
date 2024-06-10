<?php

namespace App\Http\Controllers\Front\Faq;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faq = PageManagement::where('type', 'faq')->first();
        return view('front.faq.faq',compact('faq'));
    }
}
