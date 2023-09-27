<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    function login()
    {
        return view('client.pages.login');
    }
}
