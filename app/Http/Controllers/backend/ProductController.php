<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function listProduct() {
        echo "Trang danh sách sản phẩm";
    }

    public function addProduct() {
        echo "Trang thêm sản phẩm";
    }

    public function editProduct() {
        echo "Trang sửa sản phẩm";
    }

    public function detailAttr() {
        echo "Trang chi tiết thuộc tính";
    }

    public function editAttr() {
        echo "Trang sửa thuộc tính ";
    }

    public function editValue() {
        echo "Trang sửa giá trị thuộc tính ";
    }

    public function addVariant() {
        echo "Trang thêm biến thế";
    }

    public function editVariant() {
        echo "Trang sửa biến thể";
    }
}
