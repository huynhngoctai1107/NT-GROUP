<?php

namespace App\Http\Controllers\Admin\CategoryBlog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBlog\AddCategoryBlogRequest;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddCategoryBlog extends Controller
{
    public $categoryBlog;
    public function __construct()
    {
        $this->categoryBlog = new CategoryBlog();
    }

    function addFormCategoryBlog()
    {
        return view('Admin.CategoryBlog.AddCategoryBlog');
    }

    function addCategoryBlog(AddCategoryBlogRequest $request)
    {
        $value = [
            'name' => $request->input('categoryBlog'),
            'slug' => Str::slug($request->input('categoryBlog', '')),
            'description' => $request->input('description', ''),
            'created_at' => now(),
        ];
        $data = $this->categoryBlog->addCategoryBlog($value);
        return redirect()->route('listCategoryBlog')->with('success', 'Đã thêm danh mục thành công');
    }

}
