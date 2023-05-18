<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
                'name' => 'required|unique:customer',
                'email' => 'required',
                'password' => 'required',
                'address' => 'required',
                'phone' => 'required'  
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên!',
            'email.required' => 'vui lòng nhập email!',
            'password.required' => 'vui lòng nhập password!',
            'address.required' => 'vui lòng nhập password!',
            'phone.required' => 'vui lòng nhập password!'        
        ];
    }
}