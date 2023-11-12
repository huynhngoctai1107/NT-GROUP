<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'emailnew'    => 'bail||required|email',
        ];
    }
    public function messages(){
        return [
            'emailnew.required'       => 'Vui lòng nhập vào email',
            'emailnew.email'          => 'Email chưa đúng định dạng',
        ];
    }
}
