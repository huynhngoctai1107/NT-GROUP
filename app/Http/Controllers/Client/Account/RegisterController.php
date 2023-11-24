<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Client\Mail\ActiveController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;

class RegisterController extends Controller{

    public $user;
    public $mail;

    public function __construct(){
        $this->user = new User();
        $this->mail = new ActiveController();
    }

    function register(){
        return view('client.pages.register');
    }

    function registerFrom(RegisterRequest $request){


        if ($request->has('uploadfile')){
            $fileName = time() . '-' . 'product' . '.' . $request->uploadfile->extension();
            $request->uploadfile->move(public_path("img/users"), $fileName);
            $request->merge(['image' => $fileName]);
        }
        $data = [
            'fullname'   => $request->fullname,
            'slug'       => Str::slug($request->fullname),
            'email'      => $request->email,
            'image'      => $request->image,
            'phone'      => $request->phone,
            'password'   => Hash:: make($request->password),
            'id_role'    => 3,
            'status'     => 0,
            'address'    => $request->address,
            'wallet'     => 0,
            'token'      => strtoupper(Str::random(10)),
            'gender'     => $request->gender,
            'created_at' => date('Y-m-d'),
        ];
        $user = User::create($data);
        $this->mail->activateMaill($user);

        return Redirect()
            ->back()
            ->with('success', 'Đăng ký thành công, vui lòng kích hoạt tài khoản để đăng nhập');


    }

    public function active($token){
        $condition = [
            'token'     => $token,
            'social_id' => 0,
        ];

        $user = $this->user->resetPassword($condition);
        if ($user){

            $time = abs($user->updated_at->minute - Carbon::now()->minute);
            if ($time <= 15){
                $data = [
                    'token'  => strtoupper(Str::random(10)),
                    'status' => 1,
                ];
                $this->user->updateUser($data, $condition);

                return Redirect()
                    ->route('login')
                    ->with('success', 'Kích hoạt tài khoản thành công, xin mời đăng nhập');

            }else{
                $data = [
                    'token' => strtoupper(Str::random(10)),
                ];
                $this->user->updateUser($data, $condition);

                return Redirect()
                    ->route('error')
                    ->with(['error' => "Đã quá thời gian đổi mật khẩu là 15 PHÚT. Tài khoản đã bị khóa xin lòng liên hệ Admin", "title" => 403]); //404

            }
        }else{
            return Redirect()
                ->route('error')
                ->with(['error' => "Tài khoản đã được kích hoạt hoặc đã quá thời gian kích hoạt. Mọi thắc mắc xin liên hệ Admin để giải quyết", "title" => 403]); //404

        }

    }
}
