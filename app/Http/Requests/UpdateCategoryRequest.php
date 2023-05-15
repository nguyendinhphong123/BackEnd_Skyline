<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        // dd($this->category);
        return [
            'name' => 'required|unique:categories,id,'.$this->category,
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên thể loại bắt buộc phải nhập!',
            'name.unique' => 'Tên thể loại đã tồn tại!',
        ];
    }
}
