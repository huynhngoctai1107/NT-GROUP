<?php

namespace App\Http\Controllers\Client\About;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    function about(){
        return view('client.pages.about');
    }
}
