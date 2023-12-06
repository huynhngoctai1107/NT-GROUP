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
        $condition = [
            ['delete', '=', 0],
        ];
        $data = $this->categoryBlog->listCategoryBlog($condition);
        return view('Admin.CategoryBlog.ListCategoryBlog', [ 'data' => $data]);
    }

    function listHistoryCategoryBlog()
    {
        $condition = [
            ['delete', '=', 1],
        ];
        $data = $this->categoryBlog->listCategoryBlog($condition);
        return view('Admin.CategoryBlog.History', [ 'data' => $data]);
    }

    function SearchCategoryBlog(Request $request){
        $condition=[];
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['name', 'LIKE', "%$keyword%"];
        }
        $data = $this->categoryBlog->searchCategoryBlog($condition);
        if ($data->isEmpty()) {
            return view('Admin.CategoryBlog.ListCategoryBlog', ['data' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('Admin.CategoryBlog.ListCategoryBlog', ['data' => $data]);
        }
    }
}
