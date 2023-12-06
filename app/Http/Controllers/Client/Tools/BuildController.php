<?php

namespace App\Http\Controllers\Client\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildController extends Controller
{
    public function index(){
        return view('Client.Pages.BuildCost');
    }
}
