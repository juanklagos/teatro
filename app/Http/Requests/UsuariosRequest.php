<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'numero_documento' => 'required|integer|unique:usuarios',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'=> 'Debe escribir un nombre',
            'apellidos.required'=> 'Debe escribir un apellido',
            'numero_documento.required'=> 'Debe escribir el numero de documento',
            'numero_documento.integer'=> 'En este campo solo se permiten numeros',
            'numero_documento.unique'=> 'Ya existe un usuario con ese numero de documento',
        ];
    }
}
