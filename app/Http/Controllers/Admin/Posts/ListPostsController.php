<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;

class ListPostsController extends Controller{

    function listposts(){
        return view('admin.postscategory.list', ['page' => 'posts']);

    }
}
