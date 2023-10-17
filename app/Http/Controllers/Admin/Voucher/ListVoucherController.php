<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use App\Models\Voucher;

class ListVoucherController extends Controller
{
    public $voucher;
    public function __construct()
    {
        $this->voucher = new Voucher();
    }
    public function listVoucher()
    {
        $condition = []; // Thêm các điều kiện của bạn ở đây nếu cần

        $list =$this->voucher->listVoucher($condition);

        return view('admin.voucher.list', compact('list'));
    }

    public function status($id)
    {
        $voucher = Voucher::find($id);

        if ($voucher) {
            if ($voucher->status) {
                $voucher->status = 0;
            } else {
                $voucher->status = 1;
            }
            $voucher->save();
        }
        return back();
    }
}