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
            "file" => "mimes:jpeg,png,jpg,pdf|max:15000",
        ];
    }

    public function messages(){
        return [
            'fecha_inicio.after' => 'La fecha de inicio no puede ser anterior a la del dia de hoy',
            'fecha_fin.after' => 'La fecha de finalización no debe ser anterior a la de la fecha de inicio',
            'file.mimes'=>'El archivo adjunto debe ser un archivo con formato: jpeg, png, jpg o pdf',
            'file.max'=>'El archivo adjunto no debe pesar más de 25mb'
        ];
    }

}
