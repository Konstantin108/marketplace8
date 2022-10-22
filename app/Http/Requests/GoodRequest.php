<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'table_id' => [
                'required',
                'max:9'
            ],
            'name' => [
                'required'
            ],
            'category' => [
                'required'
            ],
            'size' => [
                'required'
            ],
            'sale' => [
                'required'
            ],
            'sex' => [
                'required'
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Не оставляйте это поле пустым.',
            'max' => 'Максимум 9 символов.'
        ];
    }
}
