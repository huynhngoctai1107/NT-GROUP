<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddDemandController extends Controller
{
    function addFormDemand(){
            

        return view('admin.demandcategory.add',['page'=>'demand']); 
    }
    function addDemand(){
       return redirect()->back()->with('success','Đã thêm nhu cầu thành công');
    }
}
