<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function getHome()
    {
        return view('frontend.index');
    }

    public function getAbout()
    {
        return view('frontend.about');
    }

    public function getContact()
    {
        return view('frontend.contact');
    }
}
