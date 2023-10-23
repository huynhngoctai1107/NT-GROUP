<?php

namespace App\Http\Controllers\Client\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str ;
class IndexController extends Controller
{
   function index(){

    return view('client.pages.index');
   }
}
