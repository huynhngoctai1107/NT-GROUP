<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class ListBlogController extends Controller
{
    public $blog;
    public function __construct()
    {
        $this->blog = new Blog();
    }

    function listBlog()
    {
        $condition = [
            ['delete', '=', 0],
        ];
        $data = $this->blog->listBlogAdmin($condition);
        return view('Admin.Blog.ListBlog', [ 'data' => $data]);
    }

    function listHistoryBlog()
    {
        $condition = [
            ['delete', '=', 1],
        ];
        $data = $this->blog->listBlogAdmin($condition);
        return view('Admin.Blog.History', [ 'data' => $data]);
    }

    function SearchBlog(Request $request){
        $condition=[];
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['title', 'LIKE', "%$keyword%"];
        }
        $data = $this->blog->listBlogAdmin($condition);
        if ($data->isEmpty()) {
            return view('Admin.Blog.ListBlog', [ 'data' => $data])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            return view('Admin.Blog.ListBlog', [ 'data' => $data]);
        }
    }
}
