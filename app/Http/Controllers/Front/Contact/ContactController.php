<?php

namespace App\Http\Controllers\Front\Contact;

use App\Http\Controllers\Controller;
use App\Models\PageManagement;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = PageManagement::where('type', 'contact')->first();
        return view('front.contact.contact',compact('contact'));
    }
}
