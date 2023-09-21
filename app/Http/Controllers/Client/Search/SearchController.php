<?php

namespace App\Http\Controllers\Client\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(){
        return view('Client.Pages.search',['page'=>'search']);

    }
}
