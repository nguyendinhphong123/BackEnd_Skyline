<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            // 'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên phòng bắt buộc phải nhập!',
            'category_id.required' => 'Loại phòng bắt buộc phải nhập!',
            'quantity.required' => 'Tình trạng bắt buộc nhập',
            'price.required' => 'Giá Phòng bắt buộc nhập',
            'description.required' => 'Mô Tả phòng bắt buộc nhập',
            // 'image.required' => 'Ảnh phòng bắt buộc nhập',
        ];
    }
}
