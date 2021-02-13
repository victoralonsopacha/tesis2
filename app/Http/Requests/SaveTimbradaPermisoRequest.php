<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveTimbradaPermisoRequest extends FormRequest
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
            
            'fecha' =>'required',
            'hora' => 'required',
            'tipo_permiso' => 'required'
            
        ];
    }

    public function messages(){
        return [
            'fecha.required' => 'Debe ingresar una fecha',
            'hora.required' => 'Debe ingresar una hora',
            'tipo_permiso.required' => 'Debe ingresar una permiso'
            
        ];
    }
}
