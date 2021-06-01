<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public  function getCategory() {
        echo "Trang danh mục";
    }

    public  function editCategory() {
        echo "Trang sửa danh mục";
    }
}
