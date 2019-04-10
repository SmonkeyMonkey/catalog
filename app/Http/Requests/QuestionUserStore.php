<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUserStore extends FormRequest
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
            'name'      => 'required|min:2',
            'message'   => 'required|min:5|max:500',
            'g-recaptcha-response' => 'required|captcha'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Похоже вы забыли указать свое имя',
            'name.min' => 'Минимальная длинная Вашего имени должна составлять [:min] символа',
            'message.required' => 'Вы забыли указать вопрос',
            'message.min' => 'Минимальная длинна вопроса должна составлять [:min] символа',
            'message.max' => 'Ваш вопрос слишком большой,максимальная длинна вопроса [:max]',
            'g-recaptcha-response.captcha' => 'Поле "Я не робот" заполнено неверно',
            'g-recaptcha-response.required' => 'Похоже вы забыли подтвердить что вы не робот'
        ];
    }
}
