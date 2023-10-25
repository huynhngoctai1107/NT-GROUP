<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest{

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
            'fullname' => 'bail|required|min:3|max:100|regex:/^[\p{L}\p{M}\s.\-]+$/u',
            'address'  => 'required',
            'email'    => 'email|required',
            'phone'    => 'bail|required|min:9|numeric',
            'content'  => 'required',
        ];
    }
    public function messages(){
        return [
            'fullname.required'    => 'Vui lòng nhập vào Họ và Tên',
            'fullname.min'         => 'Độ dài tối thiểu là 3',
            'fullname.max'         => 'Độ dài tối đa là 100',
            'address.required'     => 'Vui lòng nhập địa chỉ',
            'email.required'       => 'Vui lòng nhập vào email',
            'email.email'          => 'Email chưa đúng định dạng',
            'phone.required'       => 'Vui lòng nhập vào số điện thoại',
            'phone.numeric'        => 'Số điện thoại sai định dạng',
            'phone.min'            => 'Số điện thoại chưa đúng định dạng',
            'content'              => 'Vui lòng nhập nội dung',
        ];
    }
}
