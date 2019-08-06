<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSanPham extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:32|',
            // 'anh' => 'required|min:2|max:128|',
            'tomtat' => 'required|min:2|max:500|',
            'danhgia' => 'required|min:1|max:2'
        ];
    }

    public function messages(){
        return [
            'name.required'     => 'Tên sản phẩm không được để trống',
            'name.min'          => 'Tên sản phẩm cần ít nhất 2 kí tự',
            'name.max'          => 'Tên sản phẩm không được quá 32 kí tự',
            'tomtat.required'   => 'Tóm tắt không được để trống',
            'tomtat.min'        => 'Tóm tắt cần ít nhất 2 kí tự',
            'tomtat.max'        => 'Tóm tắt không được quá 500 kí tự',
            '.danhgiarequired'     => 'Đánh giá không được để trống',
            'danhgia.max'       => 'Đánh giá tối đa 100 điểm'
        ];
    }
}
