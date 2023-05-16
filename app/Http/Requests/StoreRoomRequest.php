<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
class StoreRoomRequest extends FormRequest
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
            'name' => 'required|unique:rooms',
            'category_id' => 'required',
            'quantity' => 'required|min:1',
            'price' => 'required',
            'description' => 'required',
            // 'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên phòng bắt buộc phải nhập!',
            'name.unique' => 'Tên phòng đã tồn tại!',
            'category_id.required' => 'Loại phòng bắt buộc phải nhập!',
            'quantity.required' => 'Số lượng phòng bắt buộc nhập',
            'quantity.min' => 'Số lượng phòng phải lớn hơn hoặc bằng 1',
            'price.required' => 'Giá phòng bắt buộc nhập',
            'description.required' => 'Mô tả phòng bắt buộc nhập',
            // 'image.required' => 'Ảnh phòng bắt buộc nhập',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }


}
