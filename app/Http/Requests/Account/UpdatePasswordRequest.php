<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdatePasswordRequest extends FormRequest{

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
    public function rules(){
        return [
            'current_password' => 'required|string|min:10|max:30|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'confirm_password' => 'required|min:10|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'new_password'     => [
                'required',
                'string',
                'min:10',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(){
        return [
            'current_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'current_password.string'   => 'Mật khẩu hiện tại phải là một chuỗi.',
            'current_password.min'      => 'Mật khẩu hiện tại phải chứa ít nhất :min ký tự.',
            'current_password.max'      => 'Mật khẩu hiện tại không được vượt quá :max ký tự.',
            'current_password.regex'    => 'Mật khẩu hiện tại phải chứa ít nhất một ký tự in hoa, một ký tự chữ thường, một ký tự số và một ký tự đặc biệt.',

            'new_password.required'     => 'Vui lòng nhập mật khẩu mới.',
            'new_password.string'       => 'Mật khẩu mới phải là một chuỗi.',
            'new_password.min'          => 'Mật khẩu mới phải chứa ít nhất :min ký tự.',
            'new_password.max'          => 'Mật khẩu mới không được vượt quá :max ký tự.',
            'new_password.regex'        => 'Mật khẩu mới phải chứa ít nhất một ký tự in hoa, một ký tự chữ thường, một ký tự số và một ký tự đặc biệt.',

            'confirm_password.required'  => 'Vui lòng nhập xác nhận mật khẩu mới.',
            'confirm_password.min'       => 'Xác nhận mật khẩu mới phải chứa ít nhất :min ký tự.',
            'confirm_password.max'       => 'Xác nhận mật khẩu mới không được vượt quá :max ký tự.',
            'confirm_password.regex'     => 'Xác nhận mật khẩu mới phải chứa ít nhất một ký tự in hoa, một ký tự chữ thường, một ký tự số và một ký tự đặc biệt.',

        ];
    }
}
