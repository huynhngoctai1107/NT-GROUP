<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditDemandController extends Controller
{
    function editFormDemand(){
            

        return view('admin.demandcategory.edit',['page'=>'demand']); 
    }
    function editDemand(){
       return redirect()->route('listDemand')->with('success','Đã thêm nhu cầu thành công');
    }
}
