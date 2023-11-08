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
    function SearchCategory(Request $request){
        $condition=[];
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['name', 'LIKE', "%$keyword%"];
        }
        $data = $this->category->searchCategory($condition);
        if ($data->isEmpty()) {
            return view('admin.demandcategory.list', ['page' => 'category', 'query' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('admin.demandcategory.list', ['page' => 'category', 'query' => $data]);
        }
    }
}
