<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCastRequest extends FormRequest
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
            'name_surname' => ['required', 'max:70', 'unique:casts'],
        ];
    }
    public function messages()
    {
        return [
            'name_surname.required' => 'Il nome del membro del cast è obbligatorio',
            'name_surname.max' => 'Il nome del membro del cast è superiore a :max caratteri',
        ];
    }
}
