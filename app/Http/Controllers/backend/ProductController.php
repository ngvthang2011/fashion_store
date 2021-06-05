<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests\{AddProductRequest,EditProductRequest,AddValueRequest,AddAttributeRequest};
use App\Http\Requests\{EditValueRequest,EditAttributeRequest};
use App\Http\Controllers\Controller;
use App\models\{product,attribute,values,category,variant};
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function listProduct() {
        $data['products'] = product::orderBy('id','desc')->paginate(5);
        return view('backend.product.listproduct',$data);
    }

    public function addProduct() {
        $data['attributes']=attribute::all();
        $data['categories'] = category::all();
        return view('backend.product.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request) {
        $product = new product;
        $product->product_code= $request->product_code;
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        if(isset($request->featured)){ 
            $product->featured = $request->featured;
        }else{
            $product->featured = 0;
        }
        $product->state = $request->product_state;
        $product->info = $request->info;
        $product->describe = $request->description;

        if($request->hasFile('product_img')){
            $file = $request->product_img;
            $filename= Str::slug($request->product_name, '-').'-'.str_random(5).'.'.$file->getClientOriginalExtension();
            $file->move('public/backend/img',$filename);
            $product->img = $filename;
        }else{
            $product->img='no-img.jpg';
        }

        $product->category_id = $request->category;
        
        $product->save();

        $arr=array();
        foreach($request->attr as $values)
        {
            foreach($values as $value)
            {
                $arr[]=$value;
            }
        }
        $product->values()->Attach($arr);

        $variant = get_combinations($request->attr);
        foreach($variant as $va)
        {
            $vari = new variant;
            $vari->product_id = $product->id;
            $vari->save();
            $vari->values()->Attach($va);
        }

        return redirect('admin/product/add-variant/'.$product->id);
    }

    public function editProduct($id) {
        $data['attributes']=attribute::all();
        $data['product'] = product::find($id);
        $data['categories'] = category::all();
        return view('backend.product.editproduct',$data);
    }

    public function postEditProduct(EditProductRequest $request, $id) {
        $product = product::find($id);
        $product->product_code= $request->product_code;
        $product->name = $request->product_name;
        $product->price = $request->product_price;
        if(isset($request->featured)){ 
            $product->featured = $request->featured;
        }else{
            $product->featured = 0;
        }
        $product->state = $request->product_state;
        $product->info = $request->info;
        $product->describe = $request->description;

        if($request->hasFile('product_img')){
            if($product->img != 'no-img.jpg'){
                unlink('public/backend/img/'.$product->img);
            }
            $file = $request->product_img;
            $filename= Str::slug($request->product_name, '-').'-'.str_random(5).'.'.$file->getClientOriginalExtension();
            $file->move('public/backend/img',$filename);
            $product->img = $filename;
        }

        $product->category_id = $request->category;
        
        $product->save();

        $arr=array();
        foreach($request->attr as $values)
        {
            foreach($values as $value)
            {
                $arr[]=$value;
            }
        }
        $product->values()->Sync($arr);

        $variant = get_combinations($request->attr);
        foreach($variant as $va)
        {
            if(checkVariant($product, $va)){
                $vari = new variant;
                $vari->product_id = $product->id;
                $vari->save();
                $vari->values()->Attach($va);
            }
        }

        return redirect()->back()->with('alert','Đã update thành công sản phẩm!');
    }

    public function delProduct($id){
        product::destroy($id);
        return redirect()->back()->with('alert','Đã xóa thành công sản phẩm!');
    }

    public function detailAttr() {
        $data['attributes'] = attribute::orderBy('id','desc')->get();
        return view('backend.attr.attr',$data);
    }

    public function addAttr(AddAttributeRequest $request)
    {
        $attr = new attribute;
        $attr->name = $request->attr_name;
        $attr->save();
    
        return redirect()->back()->with('alert','Thêm thành công thuộc tính '.$attr->name);
    }

    public function editAttr($id) {
        $data['attribute'] = attribute::find($id);
        return view('backend.attr.editattr',$data);
    }

    public function postEditAttr(EditAttributeRequest $request, $id) {
        $attr = attribute::find($id);
        $attr->name = $request->attribute;
        $attr->save();

        return redirect()->back()->with('alert','Đã update thành công thuộc tính!');
    }

    public function delAttr($id) {
        attribute::destroy($id);

        return redirect()->back()->with('alert','Xóa thành công Thuộc tính!');
    }

    public function addValue(AddValueRequest $request)
    {
        $value = new values;
        $value->value = $request->value_name;
        $value->attr_id = $request->attr_id;
        $value->save();

        return redirect()->back()->with('alert','Đã thêm thành công giá trị: '.$value->value.' của thuộc tính '.$value->attribute->name);
    }

    public function editValue($id) {
        $data['value'] = values::find($id);
        return view('backend.attr.editvalue',$data);
    }

    public function postEditValue(EditValueRequest $request, $id) {
        $value = values::find($id);
        $value->value = $request->value;
        $value->save();

        return redirect()->back()->with('alert','Đã update thành công giá trị thuộc tính!');
    }

    public function delValue($id) {
        values::destroy($id);

        return redirect('admin/product/detail-attr')->with('alert','Xóa thành công giá trị thuộc tính!');
    }

    public function addVariant($id) {
        $data['product'] = product::find($id);
        return view('backend.variant.addvariant',$data);
    }

    public function postAddVariant(Request $request, $id) {
        $product = product::find($id);

        foreach($request->variant as $variant_id=>$price)
        {
            $vari = variant::find($variant_id);
            if(isset($price)){
                $vari->price= $price;
            }else{
                $vari->price=0;
            }
            
            $vari->save();
        }

        return redirect('admin/product')->with('alert','Đã thêm thành công sản phẩm '.$product->name);
    }

    public function editVariant($id) {
        $data['product'] = product::find($id);
        return view('backend.variant.editvariant', $data);
    }

    public function postEditVariant(Request $request, $id) {
        $product = product::find($id);

        foreach($request->variant as $variant_id=>$price)
        {
            $vari = variant::find($variant_id);
            if(isset($price)){
                $vari->price= $price;
            }else{
                $vari->price=0;
            }
            
            $vari->save();
        }

        return redirect()->back()->with('alert','Đã update thành công giá cho biến thể của sản phẩm '.$product->name);
    }

    public function delVariant($id) {
        variant::destroy($id);
        return redirect()->back()->with('alert','Đã xóa thành công biến thể.');
    }
}
