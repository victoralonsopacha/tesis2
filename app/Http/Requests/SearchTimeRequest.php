<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchTimeRequest extends FormRequest
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
            'fecha_fin' => 'required|before:tomorrow',
            'fecha_inicio' => 'required',
        ];
    }

    public function messages(){
        return [
            'fecha_fin.required' => 'La fecha de finalización es requerida',
            'fecha_fin.before' => 'El sistema no tiene información para fechas posteriores a la actual',
            'fecha_inicio.required' => 'La fecha de inicio es requerida',
        ];
    }
}
