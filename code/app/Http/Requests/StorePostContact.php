<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostContact extends FormRequest
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
            'fName' => 'required|max:255',
            'fPhone' => 'required|max:255',
            'fText' => 'required|max:255',
        ];
    }
    public function messages()
    {
        return [
            'fName.required' => 'Заполните поле ИМЯ',
            'fPhone.required'  => 'Заполните поле Телефон',
            'fText.required'  => 'Заполните поле Текст',
        ];
    }
}
