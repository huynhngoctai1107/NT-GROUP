<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListDemandController extends Controller
{
    function listDemand(){
        return view('admin.demandcategory.list',['page'=>'demand']);

    }
}
