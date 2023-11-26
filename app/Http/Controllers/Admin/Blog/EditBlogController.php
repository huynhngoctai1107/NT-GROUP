<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\EditBlogRequest;
use App\Http\Requests\CategoryBlog\EditCategoryBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditBlogController extends Controller
{
    public $blog;
    public function __construct()
    {
        $this->blog = new Blog();
    }

    function editFormBlog($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $data = $this->blog->editBlog($condition);
        return view('admin.Blog.EditBlog', ['data' => $data]);
    }

    function editBlog(EditBlogRequest $request, $slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];

        if ($request->hasFile('uploadfile')) {
            $filename = time() . '-' . 'blog' . '.' . $request->file('uploadfile')->extension();
            $request->file('uploadfile')->move(public_path("images/blogs"), $filename);
            $request->merge(['image' => $filename]);
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
        }
        else{
            $value = [
                'id_user' => $request->input('id_user'),
                'id_category_blog' => $request->input('id_category_blog'),
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title', ''), '-'),
                'excerpt' => $request->input('excerpt', ''),
                'content' => $request->input('content', ''),
                'created_at' => now(),
            ];
        }
        $data = $this->blog->updateBlog($value, $condition);
        return redirect()->route('listBlogAdmin')->with('success', 'Đã sửa danh mục thành công');
    }
}
