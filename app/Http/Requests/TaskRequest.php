<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'task_name' => [
                'required',
                'string',
                'max:50',
                'unique:tasks,task_name'
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Не оставляйте это поле пустым.',
            'unique' => 'Задача с таким именем уже существует.',
            'max' => 'Превышено максимальное значение.',
        ];
    }
}
