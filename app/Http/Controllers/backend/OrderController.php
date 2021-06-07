<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\customer;

class OrderController extends Controller
{
    public function listOrder(){
        $data['customers'] = customer::where('state',0)->orderBy('created_at','DESC')->paginate(10);
        return view('backend.order.order',$data);
    }
    
    public function detailOrder($id){
        $data['customer'] = customer::find($id);
        return view('backend.order.detailorder',$data);
    }

    public function processedOrder(){
        $data['customers'] = customer::where('state',1)->orderBy('created_at','DESC')->paginate(10);
        return view('backend.order.orderprocessed',$data);
    }

    public function activeOrder($id){
        $customer = customer::find($id);
        $customer->state = 1;
        $customer->save();

        return redirect('admin/order')->with('alert','Đã xử lý thành công đơn hàng!');
    }
}
