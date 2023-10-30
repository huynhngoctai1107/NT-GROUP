<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Requests\Account\UpdatePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Client\Transaction\TransactionHistoryController;
use App\Models\PaymentMethod;

class AccountController extends Controller{

    public $user;
    public $transaction;
    public $method;

    public function __construct(){
        $this->method      = new PaymentMethod();
        $this->user        = new User();
        $this->transaction = new TransactionHistoryController();
    }

    public function account(){
        $condition = [
            'status' => 1
        ];

        return view('client.account.account',
            ['list' => $this->transaction->getHistory(), 'payment' => $this->method->getPaymentMethod($condition)]);
    }

    public function updateProfile(UpdateAccountRequest $request, $token){

        $userData = [
            'fullname'   => $request->fullname,
            'gender'     => $request->gender,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'token'      => strtoupper(Str::random(10)),
            'created_at' => date('Y-m-d')
        ];

        // Kiểm tra và lưu trữ hình ảnh mới (nếu có)
        if ($request->hasFile('image')){
            $image     = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/users'), $imageName);
            $userData['image'] = $imageName;
        }

        $condition = [
            'token' => $token,
        ];

        $this->user->updateUser($userData, $condition);

        return redirect()
            ->back()
            ->with(['success' => 'Cập nhật thông tin tài khoản thành công.', 'active' => 'updateProfile']);
    }

    public function updatePassword(UpdatePasswordRequest $request, $token){

        if (Hash::check($request->current_password, auth()->user()->password)){
            $condition = [
                'token' => $token,
            ];
            $values    = [
                'password' => Hash::make($request->new_password),
                'token'    => strtoupper(Str::random(10)),
            ];
            $this->user->updateUser($condition, $values);

            return redirect()
                ->back()
                ->with(['success' => 'Cập nhật thông tin tài khoản thành công.', 'active' => 'updatePassword']);

        }else{
            return redirect()
                ->back()
                ->with(['error' => 'Mật khẩu cũ không khớp với hệ thống.', 'active' => 'updatePassword']);
        }


    }


}