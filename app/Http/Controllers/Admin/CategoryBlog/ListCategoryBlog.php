<?php

namespace App\Http\Controllers\Admin\CategoryBlog;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;

class ListCategoryBlog extends Controller
{
    public $categoryBlog;
    public function __construct()
    {
        $this->categoryBlog = new CategoryBlog();
    }
    function listCategoryBlog()
    {
        $data = $this->categoryBlog->listCategoryBlog();
        return view('admin.categoryBlog.ListCategoryBlog', [ 'data' => $data]);
    }

    function SearchCategoryBlog(Request $request){
        $condition=[];
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['name', 'LIKE', "%$keyword%"];
        }
        $data = $this->categoryBlog->searchCategoryBlog($condition);
        if ($data->isEmpty()) {
            return view('admin.CategoryBlog.ListCategoryBlog', ['data' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('admin.CategoryBlog.ListCategoryBlog', ['data' => $data]);
        }
    }
}
