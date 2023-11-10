<?php

namespace App\Http\Requests\Tools;

use Illuminate\Foundation\Http\FormRequest;

class MapLocationRequest extends FormRequest{


    public function authorize()
    : bool{
        return TRUE;
    }


    public function rules()
    : array{
        return [
            'price'     => "required",
            'kilometer' => "required",
            'acreage'   => "required",
            'location'  => "required",
        ];
    }

    public function messages(){
        return [
            'price.required'     => "Giá không được rỗng",
            'kilometer.required' => "Kilometer không được rỗng",
            'acreage.required'   => "Diên tích không được rỗng",
            'location.required'  => "Định vị địa lý không được hỗ trợ. Xin vui lòng kiểm tra lại. ",
        ];
    }
}
