<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest{

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
            'email' => 'bail||required|email',
            'g-recaptcha-response' => 'required',
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Vui lòng nhập vào email',
            'g-recaptcha-response' =>  'Lỗi xác thực',
            'email.email'    => 'Email chưa đúng định dạng',
        ];
    }
}
