<?php

namespace App\Http\Controllers\Admin\CategoryBlog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBlog\EditCategoryBlogRequest;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditCategoryBlog extends Controller
{
    public $categoryBlog;
    public function __construct()
    {
        $this->categoryBlog = new CategoryBlog();
    }

    function editFormCategoryBlog($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $data = $this->categoryBlog->editCategoryBlog($condition);
        return view('Admin.CategoryBlog.EditCategoryBlog', ['data' => $data]);
    }

    function editCategoryBlog(EditCategoryBlogRequest $request, $slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];

        $value = [
            'name' => $request->categoryBlog,
            'slug' => Str::slug($request->categoryBlog),
            'description' => $request->description,
            'updated_at'  => date('y-m-d H:i:s')
        ];
        $data = $this->categoryBlog->updateCategoryBlog($value, $condition);
        return redirect()->route('listCategoryBlog')->with('success', 'Đã sửa danh mục thành công');
    }
}
