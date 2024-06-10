<?php

namespace App\Http\Controllers\Front\LocalShopping;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class LocalshoppingController extends Controller
{
    public function index()
    {
        $localshopping = PageManagement::where('type', 'localshopping')->first();
        return view('front.local_shopping.local_shopping',compact('localshopping'));
    }
}
