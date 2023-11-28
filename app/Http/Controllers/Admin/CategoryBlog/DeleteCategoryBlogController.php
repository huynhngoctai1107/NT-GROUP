<?php

namespace App\Http\Controllers\Admin\CategoryBlog;

use App\Http\Controllers\Controller;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;

class DeleteCategoryBlogController extends Controller
{
    public $categoryBlog;
    public function __construct()
    {
        $this->categoryBlog = new CategoryBlog();
    }

    public function DeleteCategoryBlog($slug){
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 1,
        ];
        $this->categoryBlog->updateCategoryBlog($value, $condition);
        return redirect()->back()->with('success', 'Đã xóa danh mục tin thành công');
    }

    function restoreCategoryBlog($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 0,
        ];
        $this->categoryBlog->updateCategoryBlog($value, $condition);
        return redirect()->back()->with('success', 'Đã khôi phục danh mục tin thành công');
    }
}
