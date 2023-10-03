<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostNewController extends Controller
{
    function postNew()
    {
        return view('client.pages.postnew');
    }
}
