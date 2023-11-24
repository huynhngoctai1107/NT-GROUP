<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAccountRequest extends FormRequest{

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    public function rules()
    : array{


        return [
            'fullname' => [
                'required',
                'min:3',
                'max:100',
                Rule::unique('users', 'fullname')->ignore($this->token,'token'),
            ],
            'gender'   => 'required',
            'phone'    => 'required|numeric|min:10',
            'address'  => 'required',
            'image'    => 'nullable|image|mimes:webp,png,jpg,gif|max:2048',


        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    : array{

        session()->flash('active', 'updateProfile');

        return [
            'fullname.required' => 'Vui lòng nhập họ và tên.',
            'fullname.min'      => 'Vui lòng nhập họ và tên tối thiểu 5 kí tự.',
            'fullname.unique'   => 'Họ và tên đã tồn tại trong hệ thống.',
            'fullname.max'      => 'Vui lòng nhập họ và tên tối đa 30 kí tự.',
            'gender.required'   => 'Vui lòng chọn giới tính.',
            'phone.required'    => 'Vui lòng nhập số điện thoại.',
            'phone.numeric'     => 'Số điện thoại phải là số.',
            'phone.min'         => 'Số điện thoại phải có ít nhất 10 chữ số.',
            'address.required'  => 'Vui lòng nhập địa chỉ.',
            'image.image'       => 'Tệp phải là hình ảnh.',
            'image.mimes'       => 'Hình ảnh phải có định dạng PNG, JPG hoặc GIF.',
            'image.max'         => 'Kích thước hình ảnh không được vượt quá 2048KB.',
        ];
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

}