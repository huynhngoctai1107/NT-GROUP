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

class AccountController extends Controller
{
    public $user;
    public $transaction;
    public function __construct(){
        $this->user = new User();
        $this->transaction =new TransactionHistoryController() ;
    }

    public function account(){

        return view('client.account.account', ['list'=>$this->transaction->getHistory()]);
    }

    public function updateProfile(UpdateAccountRequest $request, $token){

        $userData = [
            'fullname' => $request->fullname,
            'gender'   => $request->gender,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'token'    => strtoupper(Str::random(10)),
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

        return redirect()->back()->with('success', 'Cập nhật thông tin tài khoản thành công.');
    }

    public function updatePassword(UpdatePasswordRequest $request, $token){

        if (Hash::check($request->current_password, auth()->user()->password)) {
            if ($request->new_password === $request->confirm_password) {
                $condition = [
                    'token' => $token,
                ];
                $values = [
                    'password' => Hash::make($request->new_password),
                    'token' => strtoupper(Str::random(10)),
                ];
                $this->user->updateUser($condition, $values);
                return redirect()->back()->with('success', 'Đổi mật khẩu thành công.');
            } else {
                return redirect()->back()->with('error', 'Mật khẩu mới và xác nhận mật khẩu không khớp.');
            }
        } else {
            return redirect()->back()->with('error', 'Mật khẩu cũ không khớp với hệ thống.');
        }


    }


}