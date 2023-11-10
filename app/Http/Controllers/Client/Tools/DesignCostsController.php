<?php

namespace App\Http\Controllers\Client\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesignCostsController extends Controller
{
  function designCost(){
        return view('client.pages.designCosts');
  }

}
