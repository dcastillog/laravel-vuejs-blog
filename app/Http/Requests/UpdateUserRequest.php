<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
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
            'name' => 'required',
            'email' => [
                'required', 
                Rule::unique('users')->ignore( $this->route('user')->id )  // Verifica que no existe el email en bd, pero ignora el email del usuario que se editar
            ],  
        ];

        // La contraseña solo se guardará cuando el usuario escriba en el campo correspondiente
        if( $this->filled('password') ) // Verifica si el campo password está lleno
        {  
            $rules['password'] = ['confirmed', 'min:6'];
        }

        return $rules;
    }
}
