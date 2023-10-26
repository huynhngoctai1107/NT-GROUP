<?php

namespace App\Http\Controllers\Admin\Voucher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Voucher;
use Illuminate\Support\Str;
use App\Http\Requests\Voucher\EditVoucherRequest;


class EditVoucherController extends Controller{

    public $voucher;

    public function __construct(){
        $this->voucher = new Voucher();
    }

    public function editFormVoucher($slug){
        $condition = [
            ['slug', '=', $slug],
        ];
        $voucher   = $this->voucher->editVoucher($condition);

        // Truyền thông tin voucher vào view
        return view('admin.voucher.add', ['page' => 'editVoucher', 'data' => $voucher]);
    }

    public function editVoucher(EditVoucherRequest $request, $slug){


        $value = [
            'name'            => $request->name,
            'code'            => $request->code,
            'condition'       => $request->condition,
            'discount'        => $request->discount,
            'updated_at'      => now(),
            'expiration_date' => $request->expiration_date,
            'content'         => $request->input('content'),
            'slug'            => Str::slug(!empty($request->input('slug')) ? $request->input('slug') : $request->input('name')),
            'quantify'        => $request->quantify ?? 0,
        ];
        if ($request->hasFile('image')){
            $fileName = time() . '-' . 'vouchers' . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $fileName);
            $value['image'] = $fileName;
        }
        $condition = [
            ['slug', '=', $slug],
        ];

        $data = $this->voucher->updateVoucher($condition, $value);

        return redirect()->route('listVoucher')->with('success', 'Sửa voucher thành công');
    }
}
