<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function listProduct() {
        return view('backend.product.listproduct');
    }

    public function addProduct() {
        return view('backend.product.addproduct');
    }

    public function editProduct() {
        return view('backend.product.editproduct');
    }

    public function detailAttr() {
        return view('backend.attr.attr');
    }

    public function editAttr() {
        return view('backend.attr.editattr');
    }

    public function editValue() {
        return view('backend.attr.editvalue');
    }

    public function addVariant() {
        return view('backend.variant.addvariant');
    }

    public function editVariant() {
        return view('backend.variant.editvariant');
    }
}
