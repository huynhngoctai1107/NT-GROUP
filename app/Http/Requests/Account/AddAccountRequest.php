<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AddAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_role'  => 'required',
            'fullname' => 'required|min:5|max:30|unique:users,fullname',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:10|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'gender'   => 'required',
            'phone'    => 'required|numeric|min:10',
            'address'  => 'required',
            'image'    => 'required|image|mimes:webp,png,jpg,gif|max:2048',
            'wallet'   => 'required|numeric|min:0', // Thêm rule numeric và min:0
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'id_role.required'  => 'Vui lòng chọn vai trò.',
            'fullname.required' => 'Vui lòng nhập họ và tên.',
            'fullname.min'      => 'Vui lòng nhập họ và tên tối thiểu 5 kí tự.',
            'fullname.max'      => 'Vui lòng nhập họ và tên tối đa 30 kí tự.',
            'fullname.unique'      => 'Họ và tên đã tồn tại trong hệ thống.',
            'email.required'    => 'Vui lòng nhập địa chỉ email.',
            'email.email'       => 'Vui lòng nhập địa chỉ email hợp lệ.',
            'email.unique'      => 'Địa chỉ email đã tồn tại.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min'      => 'Mật khẩu phải có ít nhất 10 ký tự.',
            'password.regex'    => 'Mật khẩu phải chứa ít nhất một ký tự in hoa, một ký tự thường, một ký tự số và một ký tự đặc biệt.',
            'gender.required'   => 'Vui lòng chọn giới tính.',
            'phone.required'    => 'Vui lòng nhập số điện thoại.',
            'phone.numeric'     => 'Số điện thoại phải là số.',
            'phone.min'         => 'Số điện thoại phải có ít nhất 10 chữ số.',
            'address.required'  => 'Vui lòng nhập địa chỉ.',
            'image.required'    => 'Vui lòng tải lên hình ảnh.',
            'image.image'       => 'Tệp phải là hình ảnh.',
            'image.mimes'       => 'Hình ảnh phải có định dạng PNG, JPG hoặc GIF.',
            'image.max'         => 'Kích thước hình ảnh không được vượt quá 2048KB.',
            'wallet.required'   => 'Vui lòng nhập giá trị ví.',
            'wallet.numeric'    => 'Giá trị ví phải là số.',
            'wallet.min'        => 'Giá trị ví không được là số âm.',
        ];
    }
}