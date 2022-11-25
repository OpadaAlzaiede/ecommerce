<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'name' => ['required', Rule::unique('categories', 'name'), 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:100'],
            'description' => ['required'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
            'meta_title' => ['required', 'string', 'max:100'],
            'meta_keyword' => ['required', 'string', 'max:100'],
            'meta_description' => ['required'],
        ];
    }
}
