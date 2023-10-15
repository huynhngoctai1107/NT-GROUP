<?php

namespace App\Http\Controllers\Client\ErrorPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorPageController extends Controller
{
    function error(){
        return view('client.pages.ErrorPage');
    }
}
