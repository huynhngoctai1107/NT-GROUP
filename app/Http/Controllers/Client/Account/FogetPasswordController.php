<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;

class FogetPasswordController extends Controller{

    function fogetPassword(){
        return view('client.pages.fogetpassword');
    }
}
