<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'                 => 'required|min:4',
            'image'                 => 'image|nullable',
            'text'                  => 'required|min:5',
            'description'           => 'required|min:3'
        ];
    }
    public function messages()
    {
        return [
            'title.required'         => 'Поле "Название" обязательно к заполнению',
            'title.min'              => 'Минимальное кол-во символов поля "Название" : [:min]',
            'image.image'            => 'Похоже что загруженный Вами файл не является картинкой',
            'text.required'          => 'Похоже вы забли заполнить поле "Краткий текст"',
            'text.min'               => 'Минимальное кол-во символов поля "Краткий текст" : [:min]',
            'description.required'   => 'Похоже вы забли заполнить поле "Полный текст новости"',
            'description.min'        => 'Минимальное кол-во символов поля "Полный текст новости" : [:min]'
        ];
    }
}
