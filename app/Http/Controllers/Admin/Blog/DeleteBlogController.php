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
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 1,
        ];
        $this->blog->updateBlog($value, $condition);
        return redirect()->back()->with('success', 'Đã xóa tin tức thành công');
    }

    function restoreBlog($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 0,
        ];
        $this->blog->updateBlog($value, $condition);
        return redirect()->back()->with('success', 'Đã khôi phục tin tức thành công');
    }
}
