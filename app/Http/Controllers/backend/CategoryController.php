<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests\{EditCategoryRequest,AddCategoryRequest};
use App\Http\Controllers\Controller;
use App\models\category;

class CategoryController extends Controller
{
    public function getCategory() {
        $data['categories'] = category::all();
        return view('backend.category.category', $data);
    }

    public function postCategory(AddCategoryRequest $request) {
       $category = new category();
       $category->name = $request->name;
       $category->parent = $request->parent;
       $category->save();

       return redirect('admin/category')->with('alert','Đã thêm danh mục thành công!');
    }

    public function editCategory($id) {
        $data['categories']= category::all();
        $data['category'] = category::find($id);
        return view('backend.category.editcategory',$data);
    }

    public function postEditCategory(EditCategoryRequest $request, $id) {
        $category = category::find($id);
        $category->parent = $request->parent;
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('alert','Đã sửa danh mục thành công!');
    }

    public function delCategory($id){
        category::destroy($id);

        return redirect()->back()->with('alert','Đã xóa danh mục thành công!');
    }
}
