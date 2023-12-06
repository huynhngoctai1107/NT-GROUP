<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class AddCategoryController extends Controller
{
    public $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    function addFormCategory()
    {
        return view('Admin.DemandCategory.Add', ['page' => 'category']);
    }
    function addCategory(AddCategoryRequest $request)
    {
        $value = [
            'name' => $request->input('category'),
            'slug' => Str::slug($request->input('category', '')),
            'note' => $request->input('note', ''),
            'created_at' => now(),
        ];
        $data = $this->category->AddCategory($value);
        return redirect()->route('listCategory')->with('success', 'Đã thêm danh mục thành công');
    }
}
