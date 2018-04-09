<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateAutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()){
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'number' => 'required|unique:autos,number',
            'stop' => 'required|numeric|min:1|max:15',
            'drive' => 'required|numeric|min:1|max:40',
            'unload' => 'required|numeric|min:1|max:20'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Įveskite tranporto priemonės pavadinimą.',
            'name.min' => 'Transporto priemonės pavadinimas turi būti bent 3 simboliai.',
            'number.required' => 'Įveskite valstybinį numerį.',
            'number.unique' => 'Toks valstybinis numeris jau įvestas.',
            'stop.required' => 'Įveskite Stovėjimo kuro normą.',
            'stop.numeric' => 'Stovėjimo kuro normą įveskite skaičiais.',
            'stop.min' => 'Stovėjimo kuro norma negali būti neigiama.',
            'stop.max' => 'Įvesta per didelė Stovėjimo kuro norma.',
            'drive.required' => 'Įveskite Važiavimo kuro normą.',
            'drive.numeric' => 'Važiavimo kuro normą įveskite skaičiais.',
            'drive.min' => 'Važiavimo kuro norma negali būti neigiama.',
            'drive.max' => 'Įvesta per didelė Važiavimo kuro norma.',
            'unload.required' => 'Įveskite Iškrovimo kuro normą.',
            'unload.numeric' => 'Iškrovimo kuro normą įveskite skaičiais.',
            'unload.min' => 'Iškrovimo kuro norma negali būti neigiama.',
            'unload.max' => 'Įvesta per didelė Iškrovimo kuro norma.'
        ];
    }
}
