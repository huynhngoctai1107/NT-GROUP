<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class DeleteCategoryController extends Controller
{
    public $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    function deleteCategory($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 1,
        ];
        $this->category->updateCategory($value, $condition);
        return redirect()->back()->with('success', 'Đã xóa danh mục thành công');
    }

    function restoreCategory($slug)
    {
        $condition = [
            ['slug', '=', $slug],
        ];
        $value = [
            'delete' => 0,
        ];
        $this->category->updateCategory($value, $condition);
        return redirect()->back()->with('success', 'Đã khôi phục danh mục thành công');
    }
}
