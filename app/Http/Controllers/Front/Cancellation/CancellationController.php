<?php

namespace App\Http\Controllers\Front\Cancellation;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class CancellationController extends Controller
{
    public function index()
    {
        $cancellation = PageManagement::where('type', 'cancellation')->first();
        return view('front.cancellation_policy.cancellation_policy',compact('cancellation'));
    }
}
