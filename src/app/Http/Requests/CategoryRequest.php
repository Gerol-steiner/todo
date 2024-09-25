<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:20|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Categoryを入力してください',
            'name.string' => 'Categoryを文字列で入力してください',
            'name.max' => 'Categoryを20文字以内で入力してください',
            'name.unique' => 'カテゴリが既に存在しています'
        ];
    }
}
