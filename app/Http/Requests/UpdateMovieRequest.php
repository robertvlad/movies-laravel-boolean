<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMovieRequest extends FormRequest
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
            'title' => ['required', 'max:150',Rule::unique('movies')->ignore($this->movie)],
            'original_title' => ['required', 'max:150'],
            'nationality' => 'required|max:50',
            'release_date' => 'required|date_format:Y-m-d',
            'vote' => 'required|max:20',
            'cover_path' => 'nullable',
            'cast_id' => 'exists:casts,id',
            'genere_id' => 'exists:generes,id'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => 'Il titolo è già usato',
            'title.max' => 'Il titolo è superiore a :max caratteri',
            'original_title.required' => 'Il titolo originale è obbligatorio',
            'original_title.max' => 'Il titolo originale è superiore a :max caratteri',
            'nationality.required' => 'La nazionalità è obbligatoria',
            'nationality.max' => 'La nazionalità non deve superare a :max caratteri',
            'release_date.required' => 'la data è obbligatoria',
            'release_date.date_format' => 'La data deve essere a :max caratteri',
            'vote.required' => 'Il voto è obbligatorio',
        ];
    }
}