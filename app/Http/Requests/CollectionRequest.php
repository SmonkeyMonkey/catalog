<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
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
            'title'          => 'required|min:2'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" обязательно к заполнению',
            'title.min'      => 'Минимальное кол-во символов поля "Название" : [:min]'
        ];
    }
}
