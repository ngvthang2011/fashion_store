<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function listOrder(){
        echo "Trang danh sách đơn hàng";
    }
    
    public function detailOrder(){
        echo "Trang chi tiết đơn hàng";
    }

    public function processedOrder(){
        echo "Trang đơn hàng đã xử lý";
    }
}
