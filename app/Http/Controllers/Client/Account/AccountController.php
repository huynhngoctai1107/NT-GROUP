<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Http\Requests\Account\UpdatePasswordRequest;
use App\Models\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Client\Transaction\TransactionHistoryController;
use App\Models\PaymentMethod ;

class AccountController extends Controller
{
    public $user;
    public $transaction;
    public $method;
    public $charts;
    public function __construct(){
        $this->method = new PaymentMethod();
        $this->user = new User();
        $this->transaction =new TransactionHistoryController() ;
        $this->charts = new Charts();
    }

    public function account(){
        $condition = [
            'status' => 1
        ] ;
        // charts post
        $where = [
            'id_user' => Auth::user()->id,
            'featured_news'=>1,
        ] ;
        $vip = $this->charts->getPostCharts($where);
        $where = [
            'id_user' => Auth::user()->id,
            'featured_news'=>0,
        ] ;
        $charts = $this->charts->getPostCharts($where);
        $where = [
            'id_user' => Auth::user()->id,
        ] ;
        $date = $this->charts->getPostCharts($where);
        // charts transition
        $where = [
            'id_user' => Auth::user()->id,
            'id_category_transaction'=>1,
        ] ;
        $transitionPay = $this->charts->getRechargeCharts($where);
        $where = [
            'id_user' => Auth::user()->id,
            'id_category_transaction'=>2,
        ] ;
        $transitionMua = $this->charts->getRechargeCharts($where);
        $where = [
            'id_user' => Auth::user()->id,
        ] ;
        $DateTransition = $this->charts->getRechargeCharts($where);
        return view('client.account.account', [
            'list'=>$this->transaction->getHistory(),
            'payment'=>$this->method->getPaymentMethod($condition),
            'vip'=>$vip, 'charts'=>$charts, 'dates'=>$date,
            'transitionPay'=>$transitionPay, 'transitionMua'=>$transitionMua,
            'dateT'=>$DateTransition]);
    }

    public function updateProfile(UpdateAccountRequest $request, $token){

        $userData = [
            'fullname' => $request->fullname,
            'slug'     => Str::slug($request->fullname),
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

        return redirect()->back()->with(['success'=>'Cập nhật thông tin tài khoản thành công.','active' => 'updateProfile']);
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

        } else {
            return redirect()->back()->with(['error'=>'Mật khẩu cũ không khớp với hệ thống.','active' => 'updatePassword']);
        }


    }


}