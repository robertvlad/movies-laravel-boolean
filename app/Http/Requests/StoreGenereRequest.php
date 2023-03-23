<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGenereRequest extends FormRequest
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
            'genere' => ['required', 'max:70', 'unique:generes'],
        ];
    }
    public function messages()
    {
        return [
            'genere.required' => 'Il nome del genere è obbligatorio',
            'genere.max' => 'Il nome del genere è superiore a :max caratteri',
        ];
    }
}
