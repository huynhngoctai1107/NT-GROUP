<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditCategoryController extends Controller
{
    function editFormCategory(){
            

        return view('admin.demandcategory.edit',['page'=>'category']); 
    }
    function editCategory(){
       return redirect()->route('listCategory')->with('success','Đã sửa danh mục thành công');
    }
}
