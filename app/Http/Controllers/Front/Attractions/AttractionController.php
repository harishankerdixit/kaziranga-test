<?php

namespace App\Http\Controllers\Front\Attractions;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    public function index()
    {
        // $attractions = PageManagement::where('type', 'attractions')->first();
        return view('front.attractions.attractions');
    }
}
