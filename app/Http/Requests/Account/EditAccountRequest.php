<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditAccountRequest extends FormRequest{

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

            'id_role'  => 'required',
            'fullname' => 'required',
            'gender'   => 'required',
            'phone'    => 'required|numeric|min:10',
            'address'  => 'required',
            'wallet'   => 'required|min:0',
            'email'    => [
                'required',
                'email:',
                Rule::unique('users', 'email')->ignore($this->id),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    : array{
        return [
            'id_role.required'  => 'Vui lòng chọn vai trò.',
            'fullname.required' => 'Vui lòng nhập họ và tên.',
            'gender.required'   => 'Vui lòng chọn giới tính.',
            'phone.required'    => 'Vui lòng nhập số điện thoại.',
            'phone.numeric'     => 'Số điện thoại phải là số.',
            'phone.min'         => 'Số điện thoại phải có ít nhất 10 chữ số.',
            'address.required'  => 'Vui lòng nhập địa chỉ.',
            'wallet.required'   => 'Vui lòng nhập giá trị ví.',
            'wallet.min'        => 'Số dư ví không được âm tiền.',
            'email.required'    => 'Vui lòng nhập vào email.',
            'email.unique'      => 'Email đã tồn tại.',
            'email.email'       => 'Vui lòng nhập vào đúng định dạng email.',
        ];
    }
}
