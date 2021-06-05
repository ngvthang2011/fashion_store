<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function listProduct()
    {
        return view('frontend.product.shop');
    }
    
    public function getCart()
    {
        return view('frontend.product.cart');
    }

    public function detailProduct()
    {
        return view('frontend.product.detail');
    }

    public function checkOut()
    {
        return view('frontend.checkout.checkout');
    }

    public function complete()
    {
        return view('frontend.product.complete');
    }
}
