<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ListCategoryController extends Controller
{

    public $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    function listCategory()
    {
        $data = $this->category->listCategory();
        return view('admin.demandcategory.list', ['page' => 'category', 'query' => $data]);
    }
}
