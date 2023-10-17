<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditVoucherRequest extends FormRequest{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'code'            => [
                'required',
                'min:5',
                'max:100',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                Rule::unique('vouchers', 'code')->ignore($this->slug, 'slug'),
            ],
            'name'            => 'required',
            'condition'       => 'required',
            'discount'        => 'required|numeric',
            'expiration_date' => 'required|date|after:created_at',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            'code.required'            => 'Vui lòng nhập mã voucher.',
            'code.unique'              => 'Mã voucher đã tồn tại.',
            'code.min'                 => 'Mã voucher phải có ít nhất 5 ký tự.',
            'code.max'                 => 'Mã voucher không được vượt quá 100 ký tự.',
            'code.regex'               => 'Mã voucher phải viết hoa, không dấu, chỉ chứa chữ cái viết hoa và chữ số.',
            'name.required'            => 'Vui lòng nhập tên voucher.',
            'condition.required'       => 'Vui lòng nhập điều kiện voucher.',
            'discount.required'        => 'Vui lòng nhập giá trị giảm giá.',
            'discount.numeric'         => 'Giá trị giảm giá phải là một số.',
            'expiration_date.required' => 'Vui lòng nhập ngày hết hạn.',
            'expiration_date.date'     => 'Ngày hết hạn không hợp lệ.',
            'expiration_date.after'    => 'Ngày hết hạn phải sau ngày bắt đầu.',
        ];
    }
}