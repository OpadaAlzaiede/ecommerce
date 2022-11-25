<?php

namespace App\Http\Requests\Category;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => [Rule::unique('categories', 'name')->ignore($this->route('category')), 'string', 'max:100'],
            'slug' => ['string', 'max:100'],
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png'],
            'meta_title' => ['string', 'max:100'],
            'meta_keyword' => ['string', 'max:100'],
        ];
    }
}
