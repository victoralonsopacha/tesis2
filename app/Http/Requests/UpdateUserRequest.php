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
        return [
            'name' =>'required|string|max:100',
            'last_name' =>'required|string|max:100',
            'password' => 'nullable|min:5|required_with:password_confirmation|string|confirmed',
            'fecha_ingreso' => 'required|before:tomorrow'
        ];
    }
}
