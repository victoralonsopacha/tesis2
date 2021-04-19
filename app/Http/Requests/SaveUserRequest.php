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
        $rules = [
            'name' =>'required|alpha|max:100',
            'last_name' =>'required|alpha|max:100',
            'password' => 'required|nullable|min:5|required_with:password_confirmation|string|confirmed',
            'cedula' =>'size:10|unique:users,cedula',
            'fecha_ingreso' => 'required|before:tomorrow'
        ];

        // Si es diferente a Post
        if($this->method() !== 'PUT')
        {
            $rules ['email' ] = 'required|string|email|max:255|unique:users,email|regex:/(.*)@(.*)\.(.*)$/i' . $this->id;
        }

        return $rules;

    }

    public function messages(){
        return [
            'email.required' => 'Debe ingresar un correo electrónico',
            'email.unique'=> 'Este correo se encuentra ya registrado',
            'email.regex'=>'El formato del correo es incorrecto. (ejemplo@ejemplo.com)',
            'cedula.size'=> 'La cédula debe tener 10 digitos',
            'cedula.unique'=> 'Esta cédula se encuentra ya registrada',
            'fecha_ingreso.before' => 'La fecha de ingreso no debe ser una fecha posterior a la de hoy',
        ];
    }
}
