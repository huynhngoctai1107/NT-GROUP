<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditCategoryRequest extends FormRequest
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
            'category' => [
                'required',
                'min:5',
                'max:100',
                Rule::unique('category_posts', 'name')->ignore($this->slug, 'slug'),
            ],
        ];
    }
    public function messages(){
        return [
            'category.required' => 'Vui lòng nhập vào tên danh mục',
            'category.unique' => 'Tên danh mục đã tồn tại',
            'category.min' => 'Tên danh mục từ 5 ký tự trở lên',
            'category.max' => 'Tên danh mục dưới 100 ký tự',
        ];
    }

}
