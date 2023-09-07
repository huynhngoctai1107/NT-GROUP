<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListCategoryController extends Controller
{
    function listCategory(){
        return view('admin.demandcategory.list',['page'=>'category']);

    }
}
