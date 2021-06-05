<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,category};

class ProductController extends Controller
{
    public function listProduct(Request $request)
    {
        if($request->category)
        {
            $data['products'] = product::where('img','<>','no-img.jpg')->where('category_id',$request->category)->paginate(12);
        }
        else if(isset($request->start) && isset($request->end)){
            $data['products'] = product::where('img','<>','no-img.jpg')->wherebetween('price',[$request->start, $request->end])->paginate(12);
        }
        else
        {
            $data['products'] = product::where('img','<>','no-img.jpg')->orderBy('created_at','DESC')->paginate(12);
        }
        $data['categories'] = category::all();
        
        return view('frontend.product.shop',$data);
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
