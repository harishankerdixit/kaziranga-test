<?php

namespace App\Http\Controllers\Front\KazirangaSafari;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class KazirangaSafariController extends Controller
{
    public function index()
    {
        $jungle = PageManagement::where('type', 'jungle')->first();
        return view('front.kaziranga_safari.kaziranga_safari', compact('jungle'));
    }
}
