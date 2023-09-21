<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    function account(){
        return view('client.account.account');
    }
}
