<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;

class AddPostController extends Controller
{
    function post(){
        return view('client.pages.addpost');
    }
}
