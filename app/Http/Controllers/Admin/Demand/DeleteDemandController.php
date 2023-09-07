<?php

namespace App\Http\Controllers\Admin\Demand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteDemandController extends Controller
{
    function deleteDemand($slug){
        return redirect()->back()->with('success','Đã xóa nhu cầu thành công');

    }
}
