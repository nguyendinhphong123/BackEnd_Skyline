<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'room_id' => 'required',
            'customer_id' => 'required',
            'price' => 'required',
            'checkin' => 'required',
            'checkout' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'room_id.required' => 'Tên phòng bắt buộc phải nhập!',
            'customer_id.required' => 'Khách hàng bắt buộc phải nhập!',
            'price.required' => 'Giá phòng bắt buộc nhập',
            'checkin.required' => 'Ngày đặt bắt buộc nhập',
            'checkout.required' => 'Ngày trả bắt buộc nhập',
        ];
    }
}
