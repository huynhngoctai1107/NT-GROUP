<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    function listBlog(){
        return view('Client.Pages.BlogList',['page'=>'blog']);

    }
}
