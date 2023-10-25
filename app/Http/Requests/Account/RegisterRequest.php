<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    : bool{
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    : array{
        return [
            'fullname'              => 'bail|required|min:3|max:100|regex:/^[\p{L}\p{M}\s.\-]+$/u',
            'gender'                => 'required|in:nam,nữ',
            'uploadfile'            => 'required',
            'checkbok'              => 'required',
            'address'               => 'required',
             'email'                 => 'bail||required|email|unique:users,email',
            'phone'                 => 'bail|required|min:9|numeric',
            'password'              => [
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(){
        return [
            'fullname.required'              => 'Vui lòng nhập vào Họ và Tên',
            'fullname.min'                   => 'Độ dài tối thiểu là 3',
            'fullname.max'                   => 'Độ dài tối đa là 100',
            'checkbok.required'              => 'Vui lòng chọn điều khoản',
            'gender.required'                => 'Vui lòng chọn giới tính',
            'uploadfile.required'            => 'Vui lòng nhập hình ảnh',
            'address.required'               => 'Vui lòng nhập địa chỉ',
            'email.required'                 => 'Vui lòng nhập vào email',
            'email.unique'                   => 'Email đã tồn tại trong hệ thống',
            'email.email'                    => 'Email chưa đúng định dạng',
            'phone.required'                 => 'Vui lòng nhập vào số điện thoại',
             'phone.numeric'                  => 'Số điện thoại sai định dạng',
            'phone.min'                      => 'Số điện thoại chưa đúng định dạng',
            'password.required'              => 'Vui lòng nhập vào mật khẩu',
            'password.min'                   => 'Độ dài tối thiểu là 10',
            'password.regex'                 => 'Mật khẩu phải có Kí tự in hoa, kí tự chữ thường, kí tự đặt biệt và số',
            'password_confirmation.required' => 'Mật khẩu nhập lại không được để trống',
            'password_confirmation.same'     => 'Nhập lại mật khẩu chưa khớp với nhau',
        ];
    }
}
