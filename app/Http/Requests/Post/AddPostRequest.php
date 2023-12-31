<?php

namespace App\Http\Requests\Post;

use App\Models\Acreage;
use App\Models\Price;
use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'title' => 'required|min:50|max:255|unique:posts,title',
            'id_demand' => 'required',
            'id_category' => 'required',
            'id_user' => 'required',
            'id_price' => 'required',
            'id_acreage' => 'required',
            'price' => [
                'required',
                function ($attribute, $value, $fail) {
                    $idPrice = request()->input('id_price');
                    $selectedPrice = Price::find($idPrice);

                    // Loại bỏ dấu chấm và dấu phẩy từ giá trị nhập vào
                    $formattedValue = str_replace(['.', ','], '', $value);

                    if (!$selectedPrice || ($formattedValue < $selectedPrice->name_min || $formattedValue > $selectedPrice->name_max)) {
                        $fail("Giá phải nằm trong giới hạn từ " . number_format($selectedPrice->name_min) . " đến " . number_format($selectedPrice->name_max) . ".");
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
                        $fail("Diện tích phải nằm trong giới hạn từ {$selectedAcreage->name_min} đến {$selectedAcreage->name_max}.");
                    }
                },
            ],
            'subtitles' => 'required|min:50',
            'uploadfile' =>'required',
            'content' => 'required|min:50',
            'link_youtube' => 'required|max:255|url',
            'city' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'address' => 'required|min:5|max:255',
            'longitude' => 'required',
            'latitude' => 'required',
            'name1' => 'required|min:5|max:255',
            'name2' => 'required|min:5|max:255',
            'phone1' => [
                'required',
                'regex:/^0[0-9]{9}$/'
            ],
            'phone2' => [
                'required',
                'regex:/^0[0-9]{9}$/'
            ],
            'img1' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',


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
            'acreage.numeric' => 'Diện tích bài viết phải là số',
            'acreage.required' => 'Vui lòng nhập vào diện tích',
            'price.numeric' => 'Giá bài viết phải là số',
            'uploadfile.required'=>'Vui lòng thêm ít nhất 1 ảnh',
            'subtitles.required' => 'Vui lòng nhập vào tiêu đề phụ bài viết',
            'subtitles.min' => 'Tiêu đề phụ bài viết từ 30 ký tự trở lên',
            'content.required' => 'Vui lòng nhập vào nội dung bài viết',
            'content.min' => 'Nội dung bài viết từ 50 ký tự trở lên',
            'link_youtube.required' => 'Vui lòng nhập vào Link Youtube bài viết',
            'link_youtube.max' => 'Link Youtube bài viết dưới 255 ký tự',
            'link_youtube.url' => 'Nhập vào đường dẫn Youtube',
            'city.required' => 'Vui lòng chọn tỉnh thành',
            'district.required' => 'Vui lòng chọn quận huyện',
            'ward.required' => 'Vui lòng chọn phường xã',
            'address.required' => 'Vui lòng nhập vào số nhà và tên đường',
            'address.min' => 'Địa chỉ từ 5 ký tự trở lên',
            'address.max' => 'Địa chỉ dưới 255 ký tự',
            'longitude.required' => 'Vui lòng nhập vào kinh độ',
            'latitude.required' => 'Vui lòng nhập vào vĩ độ',
            'name1.required' => 'Vui lòng nhập vào tên liên hệ 1',
            'name1.min' => 'Tên liên hệ từ 5 ký tự trở lên',
            'name1.max' => 'Tên liên hệ dưới 255 ký tự',
            'name2.required' => 'Vui lòng nhập vào tên liên hệ 1',
            'name2.min' => 'Tên liên hệ từ 5 ký tự trở lên',
            'name2.max' => 'Tên liên hệ dưới 255 ký tự',
            'phone1.required' => 'Vui lòng nhập vào số điện thoại',
            'phone1.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'phone2.required' => 'Vui lòng nhập vào số điện thoại',
            'phone2.regex' => 'Vui lòng nhập đúng định dạng số điện thoại',
            'img1.required' => 'Vui lòng thêm ảnh',
            'img1.image' => 'Vui lòng thêm tệp ảnh',
            'img1.mimes' => 'Trường ảnh phải có một trong các phần mở rộng: jpeg, png, jpg, gif.',
            'img1.max' => 'Trường ảnh không thể lớn hơn 2MB.',
            'img2.required' => 'Vui lòng thêm ảnh',
            'img2.image' => 'Vui lòng thêm tệp ảnh',
            'img2.mimes' => 'Trường ảnh phải có một trong các phần mở rộng: jpeg, png, jpg, gif.',
            'img2.max' => 'Trường ảnh không thể lớn hơn 2MB.',
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
