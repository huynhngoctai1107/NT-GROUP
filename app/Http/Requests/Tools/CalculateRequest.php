<?php

namespace App\Http\Requests\Tools;

use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
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
            'principal'          => 'required|min:1|max:50000000000',
            'loanTermMonths'     => 'required|min:1|max:300|numeric',
            'annualInterestRate' => 'required|min:1|max:20|numeric',
            'method'             => 'required',
        ];
    }
    public function messages(){
        return [
            'principal.required'          => 'Số tiền gốc là bắt buộc.',
            'principal.min'               => 'Số tiền gốc phải ít nhất là 1',
            'principal.max'               => 'Số tiền gốc cho vay lớn nhất là 5 tỷ',
            'annualInterestRate.max'      => 'Số lãi cao nhất trong một năm là 20%',
            'loanTermMonths.max'          => 'Thời gian vay tối đa là 300 tháng',
            'principal.numeric'           => 'Số tiền gốc phải là một giá trị số.',
            'loanTermMonths.required'     => 'Thời hạn vay (tháng) là bắt buộc.',
            'loanTermMonths.min'          => 'Thời hạn vay (tháng) phải ít nhất là 1.',
            'loanTermMonths.numeric'      => 'Thời hạn vay (tháng) phải là một giá trị số.',
            'annualInterestRate.required' => 'Lãi suất hàng năm là bắt buộc.',
            'annualInterestRate.min'      => 'Lãi suất hàng năm phải ít nhất là 0.',
            'annualInterestRate.numeric'  => 'Lãi suất hàng năm phải là một giá trị số.',
            'method.required'             => 'Phương thức là bắt buộc.',
        ];
    }
}
