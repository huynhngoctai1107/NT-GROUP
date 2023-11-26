<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\AddBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddBlogController extends Controller
{
    public $blog;
    public function __construct()
    {
        $this->blog = new Blog();
    }

    function addFormBlog()
    {
        return view('admin.Blog.AddBlog');
    }

    public function addBlog(AddBlogRequest $request)
    {
        if ($request->hasFile('uploadfile')) {
            $filename = time() . '-' . 'blog' . '.' . $request->file('uploadfile')->extension();
            $request->file('uploadfile')->move(public_path("images/blogs"), $filename);
            $request->merge(['image' => $filename]);
        }

        $value = [
            'id_user' => $request->input('id_user'),
            'id_category_blog' => $request->input('id_category_blog'),
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title', ''), '-'),
            'image' => $request->input('image'),
            'excerpt' => $request->input('excerpt', ''),
            'content' => $request->input('content', ''),
            'created_at' => now(),
        ];

        $data = $this->blog->addBlog($value);

        return redirect()->route('listBlogAdmin')->with('success', 'Đã thêm danh mục thành công');
    }
}
