<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePermisoRequet extends FormRequest
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
            'cedula' =>'required',
            'fecha_inicio' =>'required',
            'fecha_fin' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            'descripcion' => 'required',
            'tipo_permiso' => 'required',

        ];
    }

    public function messages(){
        return [
            'cedula.required' => 'Debe ingresar un nombre'
        ];
    }
}
