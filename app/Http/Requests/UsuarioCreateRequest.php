<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Log;

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
        $input = $this->all();

        //dd($input);
        return [
            'name' => 'required|min:2',
            'avatar' => 'image',
            'email' => 'required|min:3|unique:users|email',
            'telefone' => 'numeric',
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

    public function all(){
        $input = parent::all();

        $input['telefone'] = preg_replace("/[^0-9]/","",$input['telefone']);

        return $input;
    }

    protected function getValidatorInstance()
    {

        // Add new data field before it gets sent to the validator
        //$this->merge(array('date_of_birth' => 'test'));
        $input = parent::all();
        // OR: Replace ALL data fields before they're sent to the validator
        $input['telefone'] = preg_replace("/[^0-9]/","",$input['telefone']);
        $this->replace($input);
        // Fire the parent getValidatorInstance method
        return parent::getValidatorInstance();

    }
}
