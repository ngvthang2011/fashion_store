<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function listOrder(){
        return view('backend.order.order');
    }
    
    public function detailOrder(){
        return view('backend.order.detailorder');
    }

    public function processedOrder(){
        return view('backend.order.orderprocessed');
    }
}
