<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostListController extends Controller
{
    function listPost(){
        return view('Client.Pages.PostList',['page'=>'post']);

    }
}
