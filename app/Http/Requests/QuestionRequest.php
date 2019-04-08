<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'answer'           => 'required|min:3'
        ];
    }
    public function messages()
    {
        return [
            'answer.required'   => 'Похоже что вы забыли указать свой вопрос',
            'answer.min'        => 'Минимальное кол-во символов: [:min]'
        ];
    }
}
