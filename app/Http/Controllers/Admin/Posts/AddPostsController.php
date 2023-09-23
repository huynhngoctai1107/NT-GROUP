<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;

class AddPostsController extends Controller{

    function addFormPosts(){


        return view('admin.postscategory.add', ['page' => 'demand']);
    }

    function addPosts(){
        return redirect()->back()->with('success', 'Đã thêm nhu cầu thành công');
    }
}
