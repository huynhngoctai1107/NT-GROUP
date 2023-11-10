<?php

namespace App\Http\Controllers\Client\Tools;

use App\Http\Controllers\Controller;

class CalculateController extends Controller
{
      public function calculate(){
          return view('client.pages.calculate');
      }
}
