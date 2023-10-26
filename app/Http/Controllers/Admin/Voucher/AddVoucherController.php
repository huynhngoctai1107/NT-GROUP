<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Str;
use App\Http\Requests\Voucher\AddVoucherRequest;


class AddVoucherController extends Controller{

    public $voucher;

    public function __construct(){
        $this->voucher = new Voucher();
    }

    public function addFormVoucher(){
        return view('admin.voucher.add', ['page' => 'addVoucher']);
    }

    public function addVoucher(AddVoucherRequest $request){

        // Xử lý tải lên hình ảnh
        $fileName = NULL;
        if ($request->hasFile('image')){
            $fileName = time() . '-' . 'vouchers' . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $fileName);
        }

        $value = [
            'name'            => $request->name,
            'code'            => $request->code,
            'condition'       => $request->condition,
            'discount'        => $request->discount,
            'created_at'      => now(),
            'expiration_date' => $request->expiration_date,
            'content'         => $request->input('content'),
            'image'           => $fileName,
            'slug'            => Str::slug(!empty($request->input('slug')) ? $request->input('slug') : $request->input('name')),
            'quantify'        => $request->quantify ?? 0,

        ];

        $data = $this->voucher->addVoucher($value);

        return redirect()->route('listVoucher')->with('success', 'Thêm Voucher " ' . $request->name . ' " thành công');
    }

}
