<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class DeleteBlogController extends Controller
{
    public $blog;
    public function __construct()
    {
        $this->blog = new Blog();
    }

    public function deleteBlog($slug){
        $condition = ['slug' => $slug,];
        $this->blog->deleteBlog($condition);
        return redirect()->back()->with('success', 'Bài viết đã được xóa thành công.');
    }
}
