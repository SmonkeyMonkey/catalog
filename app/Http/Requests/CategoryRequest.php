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
            'title'             => 'required|min:2',
            'image'             => 'nullable|image'
        ];
    }
    public function messages()
    {
        return [
            'title.required'     => 'Похоже вы забыли заполнить поле "Название"',
            'title.min'          => 'Минимальное кол-во символов поля "Название" : [:min]',
            'image.image'        => 'Похоже что загруженный Вами файл не является картинкой'
        ];
    }
}
