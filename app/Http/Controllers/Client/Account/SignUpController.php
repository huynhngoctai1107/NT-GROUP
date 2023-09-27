<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;

class SignUpController extends Controller
{
    function signup()
    {
        return view('client.pages.signup');
    }
}
