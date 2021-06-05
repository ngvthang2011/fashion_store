<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;

class HomeController extends Controller
{
    public function getHome()
    {
        $data['products_fe'] = product::where('featured',1)->where('img','<>','no-img.jpg')->orderBy('id','DESC')->take(4)->get();
        $data['products_new'] = product::where('img','<>','no-img.jpg')->orderBy('created_at','DESC')->take(8)->get();
        return view('frontend.index',$data);
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
