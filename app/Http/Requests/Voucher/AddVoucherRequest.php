<?php

namespace App\Http\Requests\Voucher;

use Illuminate\Foundation\Http\FormRequest;

class AddVoucherRequest extends FormRequest{

    /**
     * Determine if the user is authorized to make this request.
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
            'code'            => 'required|min:5|max:100|unique:vouchers,code|regex:/[A-Z][0-9]/',
            'name'            => 'required|unique:vouchers,name',
            'image'           => 'required|image|mimes:webp,png,jpg,gif|max:2048',
            'discount'        => 'required|numeric|min:0',
            'expiration_date' => 'required|date|after:today',

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
            'name.unique'              => 'Tên đã tồn tại.',
            'discount.required'        => 'Vui lòng nhập số tiền giảm giá.',
            'discount.numeric'         => 'Số tiền giảm giá phải là một số.',
            'discount.min'             => 'Số tiền giảm giá không được âm.',
            'expiration_date.required' => 'Vui lòng nhập ngày hết hạn.',
            'expiration_date.after'    => 'Ngày hết hạn phải nhập sau hôm nay',
            'image.required'    => 'Vui lòng tải lên hình ảnh.',
            'image.image'              => 'Tệp phải là hình ảnh.',
            'image.mimes'              => 'Hình ảnh phải có định dạng PNG, JPG hoặc GIF.',
            'image.max'                => 'Kích thước hình ảnh không được vượt quá 2048KB.',
        ];
    }
}