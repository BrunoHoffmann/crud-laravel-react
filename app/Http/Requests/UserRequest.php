<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:4|max:16',
            'password_confirmation' => 'required_with:password|same:password|min:4'
        ];
    }

    /**
     * Get the messages for validations.
     *
     * @return array
     */
    public function messages()
    {
        return [
           'name.required' => 'O campo Nome é requerido',
           'email.required' => 'O campo E-mail é requerido',
           'password.required' => 'O campo Password é requerido',
           'email.email' => 'O campo E-mail requer um e-mail válido',
           'password.min' => 'O tamanho da senha inserido no campo não pode ser menor que 4 caracteres',
           'name.max' => 'O tamanho da Nome inserido no campo não pode utltrapassar 255 caracteres',
           'email.max' => 'O tamanho da Email inserido no campo não pode ultrapassar 255 caracteres',
           'password.max' => 'O tamanho da Senha inserido no campo não pode utltrapassar 16 caracteres',
           'password_confirmation.required_with' => 'Senha e a Confirmação da senha devem ser iguais'
        ];
    }
}
