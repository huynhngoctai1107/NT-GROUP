<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function login()
    {
        return view('client.pages.login');
    }
}
