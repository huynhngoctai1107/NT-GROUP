<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest{

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
            'password'              => [
                'bail',
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'password_confirmation' => 'bail|required|same:password',
        ];

    }

    public function messages(){
        return [
            'password.required'              => 'Vui lòng nhập vào mật khẩu',
            'password.min'                   => 'Độ dài tối thiểu là 10',
            'password.regex'                 => 'Mật khẩu phải có Kí tự in hoa, kí tự chữ thường, kí tự đặt biệt và số',
            'password_confirmation.required' => 'Mật khẩu nhập lại không được để trống',
            'password_confirmation.same'     => 'Nhập lại mật khẩu chưa khớp với nhau',
        ];
    }

}
