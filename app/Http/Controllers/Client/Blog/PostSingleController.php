<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostSingleController extends Controller
{
    function postSingle(){
        return view('Client.Pages.PostSingle',['page'=>'blog']);

    }
}
