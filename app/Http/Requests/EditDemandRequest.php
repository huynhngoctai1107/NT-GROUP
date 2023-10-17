<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditDemandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'demand' => [
                'required',
                'min:5',
                'max:100',
                Rule::unique('demands', 'name')->ignore($this->slug, 'slug'),
            ],
        ];
    }

    public function messages(){
        return [
            'demand.required' => 'Vui lòng nhập vào tên nhu cầu',
            'demand.unique' => 'Tên nhu cầu đã tồn tại',
            'demand.min' => 'Tên nhu cầu từ 5 ký tự trở lên',
            'demand.max' => 'Tên nhu cầu dưới 100 ký tự',
        ];
    }
}
