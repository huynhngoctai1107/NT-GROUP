<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;

class DeletePostsController extends Controller{

    function deletePosts($slug){
        return redirect()->back()->with('success', 'Đã xóa nhu cầu thành công');

    }
}
