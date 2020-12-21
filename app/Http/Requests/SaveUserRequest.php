<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
        //SOLO LOS CAMPOS VALIDADOS SERAN LOS QUE SE VAN A GUARDAR
        //SI SE QUIERE PONER OTRO CAMPO EN EL FORMULARIO DEBE IR DENTRO DE ESTA VARIABLE

        return [
            'name' =>'required',
            'last_name' =>'required',
            'email' => 'required',
            'password' => 'required',
            'cedula' => 'required',
            'tipo_relacion_laboral' => 'required',
            'cargo' => 'required',
            'fecha_ingreso' => 'required'
        ];      
    }

    public function messages(){
        return [
            'name.required' => 'Debe ingresar un nombre'
        ];
    }
}
