<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
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
                'name' => 'required|unique:users',
                'email' => 'required',
                'password' => 'required',
                'created_at' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'birthday' => 'required',
                'group_id' => 'required',
                'image' => 'required',
                'gender' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'name.unique' => 'Tên này đã tồn tại!',
            'email.required' => 'vui lòng nhập email!',
            'password.required' => 'vui lòng nhập passwoud!',
            'created_at.required' => 'vui lòng nhập ngày tháng!',
            'address.required' => 'vui lòng nhập địa chỉ!',
            'phone.required' => 'vui lòng nhập phone!',
            'birthday.required' => 'vui lòng nhập ngày sinh!',
            'group_id.required' => 'vui lòng cấp quyền!',
            'image.required' => 'Ảnh phòng bắt buộc nhập',
            'gender.required' => 'vui lòng chọn giới tính!',
        ];
    }
    // protected function failedValidation(Validator $validator)
    // {
    //     $errors = (new ValidationException($validator))->errors();

    //     throw new HttpResponseException(
    //         response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
    //     );
    // }
}
