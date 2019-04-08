<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'about'         => 'required|min:15',
            'image'         => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'Похоже вы забыли заполнить поле "Название"',
            'title.min'          => 'Минимальное кол-во символов для поля Название: [:min]',
            'description'        => 'Похоже вы забыли заполнить поле "Описание"',
            'description.min'    => 'Минимальное кол-во символов Описания [:min]',
            'about'              => 'Похоже вы забыли заполнить "Полный текст"',
            'about.min'          => 'Минимальное кол-во символов Описания [:min]',
            'image.image'        => 'Похоже что загруженный Вами файл не является картинкой'
        ];
    }
}
