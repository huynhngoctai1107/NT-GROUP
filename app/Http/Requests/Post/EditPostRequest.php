<?php

namespace App\Http\Requests\Post;

use App\Models\Price;
use App\Models\Acreage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditPostRequest extends FormRequest
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
            'title' => [
                'required',
                'min:50',
                'max:100',
                Rule::unique('posts', 'title')->ignore($this->slug, 'slug'),
            ],
            'id_demand' => 'required',
            'id_category' => 'required',
            'id_user' => 'required',
            'id_price' => 'required',
            'id_acreage' => 'required',
            'price' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $idPrice = request()->input('id_price');
                    $selectedPrice = Price::find($idPrice);

                    if (!$selectedPrice || ($value < $selectedPrice->name_min || $value > $selectedPrice->name_max)) {
                        $fail('Giá không nằm trong giới hạn cho phép.');
                    }
                },
            ],
            'acreage' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $idAcreage = request()->input('id_acreage');
                    $selectedAcreage = Acreage::find($idAcreage);

                    if (!$selectedAcreage || ($value < $selectedAcreage->name_min || $value > $selectedAcreage->name_max)) {
                        $fail('Diện tích phải nằm trong giới hạn cho phép từ.');
                    }
                },
            ],
            'subtitles' => 'required|min:50',
            'content' => 'required|min:50',
            'link_youtube' => 'required|max:255|url',
            'city' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'address' => 'required|min:5|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Vui lòng nhập vào tên bài viết',
            'title.unique' => 'Tên bài viết đã tồn tại',
            'title.min' => 'Tên bài viết từ 50 ký tự trở lên',
            'title.max' => 'Tên bài viết dưới 255 ký tự',
            'id_demand.required' => 'Vui lòng chọn nhu cầu',
            'id_category.required' => 'Vui lòng chọn danh mục',
            'id_user.required' => 'Vui lòng chọn người đăng',
            'id_price.required' => 'Vui lòng chọn giá',
            'id_acreage.required' => 'Vui lòng chọn diện tích',
            'price.required' => 'Vui lòng nhập vào giá',
            'price.numeric' => 'Giá bài viết phải là số',
            'acreage.required' => 'Vui lòng nhập diện tích',
            'acreage.numeric' => 'Diện tích bài viết phải là số',
            'subtitles.required' => 'Vui lòng nhập vào tiêu đề phụ bài viết',
            'subtitles.min' => 'Tiêu đề phụ bài viết từ 50 ký tự trở lên',
            'content.required' => 'Vui lòng nhập vào nội dung bài viết',
            'content.min' => 'Nội dung bài viết từ 50 ký tự trở lên',
            'link_youtube.required' => 'Vui lòng nhập vào Link Youtube bài viết',
            'link_youtube.max' => 'Link Youtube bài viết dưới 255 ký tự',
            'link_youtube.url' => 'Nhập vào đường dẫn Youtube',
            'city.required' => 'Vui lòng chọn tỉnh thành',
            'district.required' => 'Vui lòng chọn quận huyện',
            'ward.required' => 'Vui lòng chọn phường xã',
            'address.required' => 'Vui lòng nhập vào địa chỉ',
            'address.min' => 'Địa chỉ từ 5 ký tự trở lên',
            'address.max' => 'Địa chỉ dưới 255 ký tự',
            'longitude.required' => 'Vui lòng nhập vào kinh độ',
            'latitude.required' => 'Vui lòng nhập vào vĩ độ',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($validator->failed()) {
                // Xử lý khi có lỗi kiểm tra
            }
        });
    }
}
