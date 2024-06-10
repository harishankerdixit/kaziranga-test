<?php

namespace App\Http\Controllers\Front\News;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // $newsess = News::where('status',1)->get();
        return view('front.news.news');
    }
}