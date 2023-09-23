<?php

namespace App\Http\Controllers\Client\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FogetPasswordController extends Controller{

    function fogetPassword(){
        return view('client.pages.fogetpassword');
    }
}
