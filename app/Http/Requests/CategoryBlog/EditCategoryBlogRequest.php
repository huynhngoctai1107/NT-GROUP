<?php

namespace App\Http\Requests\CategoryBlog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditCategoryBlogRequest extends FormRequest
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
            'categoryBlog' => [
                'required',
                'min:3',
                'max:100',
                Rule::unique('category_blogs', 'name')->ignore($this->slug, 'slug'),
            ],
        ];
    }

    public function messages(){
        return [
            'categoryBlog.required' => 'Vui lòng nhập vào tên danh mục tin',
            'categoryBlog.unique' => 'Tên danh mục tin đã tồn tại',
            'categoryBlog.min' => 'Tên danh mục tin từ 3 ký tự trở lên',
            'categoryBlog.max' => 'Tên danh mục tin dưới 100 ký tự',
        ];
    }
}
