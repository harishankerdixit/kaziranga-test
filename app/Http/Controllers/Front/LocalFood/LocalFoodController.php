<?php

namespace App\Http\Controllers\Front\LocalFood;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class LocalFoodController extends Controller
{
    public function index()
    {
        $localfood = PageManagement::where('type', 'localfood')->first();
        return view('front.local_food.local_food',compact('localfood'));
    }
}
