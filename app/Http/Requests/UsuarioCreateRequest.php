<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioCreateRequest extends Request
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
            'name' => 'required|min:2',
            'avatar' => 'image',
            'email' => 'required|min:3|unique:users|email',
            'password' => 'required|min:6|same:password_confirm',
            'password_confirm' => 'same:password'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'name.min' => 'O nome deve ter no mínimo 2 caracteres',
            'name.min' => 'O nome deve ter no mínimo 2 caracteres',
            'avatar.image' => 'O arquivo deve ser uma imagem',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres',
            'password.same' => 'A senha deve ser igual nos campos "Senha" e "Confirmação da Senha"',
            'password_confirm.same' => 'A senha deve ser igual nos campos "Senha" e "Confirmação da Senha"'
        ];
    }
}
