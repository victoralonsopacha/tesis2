<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchPermisoProfesorRequest extends FormRequest
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
            'fecha_inicio' => 'required|before:fecha_fin',
        ];
    }
    public function messages(){
        return [
            'fecha_fin.required' => 'La fecha de finalizacion es requerida',
            'fecha_fin.before' => 'El sistema no tiene informacion para fechas posteriores a la actual',
            'fecha_inicio.required' => 'La fecha de inicio es requerida',
            'fecha_inicio.before' => 'La fecha de inicio debe ser una fecha anterior a la fecha de finalizacion',

        ];
    }
}
