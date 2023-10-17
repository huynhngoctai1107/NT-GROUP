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

        $result = $this->category->deleteCategory($slug);

        if ($result === false) {
            return redirect()->back()->with('error', 'Không thể xóa danh mục vì đang chứa bài viết.');
        }

        return redirect()->back()->with('success', 'Nhu cầu đã được xóa thành công.');
    }
}
