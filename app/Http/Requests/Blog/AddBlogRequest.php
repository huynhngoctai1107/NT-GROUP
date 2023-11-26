<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class AddBlogRequest extends FormRequest
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
            'title' => 'required|min:3|max:200|unique:blogs,title',
            'id_category_blog'=>'required',
            'excerpt' => 'required|min:50',
            'content' => 'required|min:50',
            'uploadfile' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

        ];
    }

    public function messages(){
        return [
            'title.required' => 'Vui lòng nhập vào tên danh mục',
            'title.unique' => 'Tên danh mục đã tồn tại',
            'title.min' => 'Tên danh mục từ 3 ký tự trở lên',
            'title.max' => 'Tên danh mục dưới 200 ký tự',
            'id_category_blog.required'=>'Chọn danh mục tin',
            'excerpt.required'=>'Nhập tiêu đề phụ tin',
            'excerpt.min' => 'Tiêu đề phụ từ 50 ký tự trở lên',
            'content.required'=>'Nhập tiêu đề phụ tin',
            'content.min' => 'Tiêu đề phụ từ 50 ký tự trở lên',
            'uploadfile.required' => 'Vui lòng thêm ảnh',
            'uploadfile.image' => 'Vui lòng thêm tệp ảnh',
            'uploadfile.mimes' => 'Trường ảnh phải có một trong các phần mở rộng: jpeg, png, jpg, gif.',
            'uploadfile.max' => 'Trường ảnh không thể lớn hơn 2MB.',
        ];
    }
}
