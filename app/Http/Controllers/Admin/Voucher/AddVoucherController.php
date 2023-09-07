<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddVoucherController extends Controller
{
    function addFormVoucher(){
        return view('admin.Voucher.add',['page'=>'addVoucher']);
    }
    function addVoucher(){
        return redirect()->back()->with('success','Đã thêm mã giảm giá thành công');
     }
}
