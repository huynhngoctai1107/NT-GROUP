<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;

class DeleteVoucherController extends Controller
{
    public $voucher;

    public function __construct(){
        $this->voucher = new Voucher();
    }
    public function deleteVoucher($id)
    {
        $voucher = Voucher::find($id);

        if ($voucher) {

            // Cập nhật trạng thái đã xoá của voucher
            $voucher->delete = true;
            $voucher->save();
        }
            return redirect()->route('listVoucher')->with('success', 'Xoá voucher thành công.');

    }
}