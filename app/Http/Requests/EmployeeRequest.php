<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        $employee = $this->route()->parameter('employee');

        $rules =  [
            'name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:18'],
            'photo' => ['nullable', 'mimes:jpeg,png', 'max:2048'],
            'position' => ['required'],
        ];

        if(!$employee){
            $rules = array_merge($rules, [
                'password' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'],
            ]);
        }else{
            $rules = array_merge($rules, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $employee->id . ',id'],
            ]);
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre debe tener como máximo 50 caracteres.',
            'last_name.required' => 'El apellido es requerido.',
            'last_name.max' => 'El apellido debe tener como máximo 50 caracteres.',
            'email.unique' => 'El correo ya se encuentra registrado.',
            'email.required' => 'El correo es requerido.',
            'phone' => 'El teléfono es requerido',
            'photo.mimes' => 'Archivos no permitido, solo jpeg, jpg y png',
            'photo.max' => 'La imagen no debe ser mayor de 2048 Kilobytes',
            'position.required' => 'La posición es requerida.',
            'password.required' => 'La contraseña es requerida',
            'phone.required' => 'El Telefono es requerido'
        ];

    }
}
