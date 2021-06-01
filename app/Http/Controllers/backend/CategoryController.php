<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public  function getCategory() {
        return view('backend.category.category');
    }

    public  function editCategory() {
        return view('backend.category.editcategory');
    }
}
