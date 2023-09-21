<?php

namespace App\Http\Controllers\Client\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function contact(){
        return view('Client.Pages.contact',['page'=>'contact']);

    }
}
