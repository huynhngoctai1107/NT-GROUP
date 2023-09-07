<?php

namespace App\Http\Controllers\Admin\Voucher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditVoucherController extends Controller
{
  
    function editFormVoucher(){
            

        return view('admin.voucher.add',['page'=>'editVoucher']); 
    }
    function editVoucher(){
       return redirect()->route('listVoucher')->with('success','Đã sửa danh mục thành công');
    }
}
