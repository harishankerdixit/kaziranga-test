<?php

namespace App\Http\Controllers\Front\TermAndConditions;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class TermAndConditionsController extends Controller
{
    public function index()
    {
        $term = PageManagement::where('type', 'term')->first();
        return view('front.terms.terms',compact('term'));
    }
}
