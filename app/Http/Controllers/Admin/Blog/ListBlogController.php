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
        $condition = [];
        $data = $this->blog->listBlogAdmin($condition);
        return view('admin.Blog.ListBlog', [ 'data' => $data]);
    }
}
