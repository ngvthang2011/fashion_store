<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,category,attribute,values,customer,attr,order};
use Cart;

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
        else if($request->value){
            $data['products'] = values::find($request->value)->product()->where('img','<>','no-img.jpg')->paginate(12);
        }
        else
        {
            $data['products'] = product::where('img','<>','no-img.jpg')->orderBy('created_at','DESC')->paginate(12);
        }
        $data['categories'] = category::all();
        $data['attributes'] = attribute::all();
        
        return view('frontend.product.shop',$data);
    }
    
    public function getCart()
    {
        $data['cart'] = Cart::content();
        return view('frontend.product.cart', $data);
    }

    public function updateCart($rowId, $qty)
    {
        Cart::update($rowId, $qty);
    }
    public function delCart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function addCart(Request $request)
    {
        $product = product::find($request->id_product);
        Cart::add(['id' => '293ad', 
        'name' => $product->name, 
        'qty' => $request->quantity, 
        'price' => getPrice($product, $request->attr), 
        'weight' => 1,
        'options' => ['img' => $product->img, 'attr' => $request->attr]]);
        
        return redirect('product/cart');
    }

    public function detailProduct($id)
    {
        $data['product'] = product::find($id);
        $data['products_new'] = product::where('img','<>','no-img.jpg')->orderBy('created_at','DESC')->take(4)->get();
        return view('frontend.product.detail',$data);
    }

    public function checkOut()
    {
        $data['cart'] = Cart::content();
        return view('frontend.checkout.checkout',$data);
    }

    public function postCheckOut(Request $request)
    {
        $customer = new customer;
        $customer->full_name = $request->full_name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->total = Cart::total(0,'','');
        $customer->state = 0;
        $customer->save();

        foreach (Cart::content() as $product) {
            $order = new order;
            $order->name = $product->name;
            $order->price = $product->price;
            $order->quantity = $product->qty;
            $order->img = $product->options->img;
            $order->customer_id = $customer->id;
            $order->save();
            
            foreach ($product->options->attr as $attribute => $value) {
                $attr = new attr;
                $attr->name = $attribute;
                $attr->value = $value;
                $attr->order_id = $order->id;
                $attr->save();
            }
        }
        Cart::destroy();
        $data['customer'] = customer::find($customer->id);
        return view('frontend.product.complete',$data);
    }

    
}
