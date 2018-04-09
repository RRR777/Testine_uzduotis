<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateTripRequest extends FormRequest
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
            'date' => 'required|date',
            'route' => 'required|string',
            'timeStart' => 'required',
            'timeToCustomer' => 'required|after:timeStart',
            'timeFromCustomer' => 'required|after:timeToCustomer',
            'timeEnd' => 'required|after:timeFromCustomer',
            'spidometerStart' => 'required|numeric|min:1',
            'spidometerEnd' => 'required|numeric|min:spidometerStart',
            'timeunload' => 'required|numeric'
        ];

    }
    public function messages()
    {
        return [
            'date.required' => 'Įveskite kelionės datą (pvz.2018-04-12).',
            'date.date' => 'Įveskite teisingą kelionės datą (pvz.2018-04-12)',
            'route.required' => 'Įveskite kelionės maršrutą.',
            'route.string' => 'Įveskite kelionės maršrutą.',
            'timeStart.required' => 'Įveskite Išvykimo iš terminalo laiką.',
            'timeToCustomer.required' => 'Įveskite Atvykimo pas klientą laiką.',
            'timeToCustomer.after' => 'Atvykimo pas klientą laikas turi būti vėlesis nei Išvykimo iš terminalo laikas.',
            'timeFromCustomer.required' => 'Įveskite Išvykimo iš kliento laiką.',
            'timeFromCustomer.after' => 'Išvykimo iš kliento laikas turi būti vėlesis nei Atvykimo pas klientą laikas.',
            'timeEnd.required' => 'Įveskite Atvykimo į terminalą laiką.',
            'timeEnd.after' => 'Atvykimo į terminalą laikas turi būti vėlesis nei Išvykimo iš kliento laikas.',
            'spidometerStart.required' => 'Įveskite pradinius spidometro parodymus.',
            'spidometerStart.numeric' => 'Pradiniai spidometro parodymai turi būti skaičiai.',
            'spidometerStart.min' => 'Pradiniai spidometro parodymai turi būti teigiami skaičiai.',
            'spidometerEnd.required' => 'Įveskite galutinius spidometro parodymus.',
            'spidometerEnd.numeric' => 'Galutiniai spidometro parodymai turi būti skaičiai.',
            'spidometerEnd.min' => 'Galutiniai spidometro parodymai turi būti didesni nei pradiniai spidometro parodymai.',
            'timeunload.required' => 'Įveskite Iškrovimo laiką minutėmis.',
            'timeunload.numeric' => 'Iškrovimo laikas turi būti įvestas skaičiais.'
        ];
    }
    
}
