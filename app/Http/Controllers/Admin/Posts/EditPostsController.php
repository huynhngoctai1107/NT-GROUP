<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;

class EditPostsController extends Controller{

    function editFormPosts(){


        return view('admin.postscategory.edit', ['page' => 'posts']);
    }

    function editPosts(){
        return redirect()->route('listposts')->with('success', 'Đã thêm nhu cầu thành công');
    }
}
