<?php

namespace App\Http\Controllers\Client\Docs;

use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    function docsterms(){
        return view('client.docs.terms', ['page' => 'docs']);
    }

    function docspolicy(){
        return view('client.docs.policy', ['page' => 'docs']);
    }
}
