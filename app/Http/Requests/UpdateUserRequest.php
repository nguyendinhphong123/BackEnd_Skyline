<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        // dd($this);
        return [
                'name' => 'required|unique:users,id,'.$this->user,
                'email' => 'required',
                'password' => 'required',
                'created_at' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'group_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'email.required' => 'vui lòng nhập email!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'gender.required' => 'vui lòng chọn giới tính   !',
            'created_at.required' => 'vui lòng nhập ngày tháng!',
            'address.required' => 'vui lòng nhập địa chỉ!',
            'phone.required' => 'vui lòng nhập phone!',
            'birthday.required' => 'vui lòng nhập ngày sinh!',
            'group_id.required' => 'vui lòng cấp quyền!',
        ];
    }
}
