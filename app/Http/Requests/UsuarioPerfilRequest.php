<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsuarioPerfilRequest extends Request
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
            'old-password' => 'required_with:password',
            'avatar' => 'image',
            'telefone' => 'required|numeric',
            'password' => 'min:6|same:password_confirm|required_with:old-password',
            'password_confirm' => 'min:6|same:password|required_with:old-password'
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
            'password.required_with' => 'A senha não pode ser vazia',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres',
            'password.same' => 'A senha deve ser igual nos campos "Senha" e "Confirmação da Senha"',
            'password_confirm.required_with' => 'A senha não pode ser vazia',
            'password_confirm.same' => 'A senha deve ser igual nos campos "Senha" e "Confirmação da Senha"'
        ];
    }

    public function all(){
        $input = parent::all();
        $input['telefone'] = preg_replace("/[^0-9]/","",$input['telefone']);
        return $input;
    }
}
