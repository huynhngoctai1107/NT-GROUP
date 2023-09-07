<?php

namespace App\Http\Controllers\Admin\Voucher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListVoucherController extends Controller
{
    
    function listVoucher(){
        return view('admin.voucher.list');
    }
}
