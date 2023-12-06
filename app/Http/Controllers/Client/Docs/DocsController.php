<?php

namespace App\Http\Controllers\Client\Docs;

use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    function docsterms(){
        return view('Client.Docs.Terms', ['page' => 'docs']);
    }

    function docspolicy(){
        return view('Client.Docs.Policy', ['page' => 'docs']);
    }
}
