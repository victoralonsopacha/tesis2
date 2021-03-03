<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePermisoProfesorRequest extends FormRequest
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
            'fecha_inicio' => 'nullable|required|after:yesterday',
            'fecha_fin' => 'nullable|required|after:yesterday',
            'hora_inicio' => 'nullable|required',
            'hora_fin' => 'nullable|required',
            'tipo_permiso'=>'nullable|required',
        ];
    }

    public function messages(){
        return [
            'fecha_inicio.after' => 'La fecha de inicio no puede ser anterior a la del dia de hoy',
            'fecha_fin.after' => 'La fecha de finalizacion no debe ser anterior a la de la fecha de inicio'

        ];
    }

}
