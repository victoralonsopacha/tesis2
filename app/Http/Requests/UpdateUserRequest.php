<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $rules = [
            'name' =>'required|string|max:50',
            'last_name' =>'required|string|max:50',
            'cedula' =>'size:10',
            'fecha_ingreso' => 'required|before:tomorrow'
        ];
        // Si es diferente a Post
        if($this->method() !== 'PUT')
        {
            $rules ['email' ] = 'required|string|email|max:255|regex:/(.*)@(.*)\.(.*)$/i' . $this->id;
        }
        return $rules;
    
    }
    public function messages(){
        return [
            'email.regex'=>'El formato del correo es incorrecto. (ejemplo@ejemplo.com)',
            'cedula.size'=> 'La cédula debe tener 10 dígitos',
            'fecha_ingreso.before' => 'La fecha de ingreso no debe ser una fecha posterior a la de hoy',
        ];
    }
}
