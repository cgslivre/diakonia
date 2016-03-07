<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class PerfilUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    function show(){
        return view('usuario.perfil');
    }

    function salvar($id, Request $request){

        $messages = [
            'password.required_with' => 'É necessário informar a senha antiga para gravar uma nova senha.',
            'newPassword.same' => 'Os campos "Nova Senha" e "Repetir nova Senha" devem ser iguais.',
            'newPassword.min' => 'A nova senha deve conter no mínimo 6 caracteres.',
            'newPassword.required_with' => 'A nova senha conter no mínimo 6 caracteres.',
            'newPassword2.required_with' => 'A nova senha conter no mínimo 6 caracteres.',
            'newPassword2.same' => 'Os campos "Nova Senha" e "Repetir nova Senha" devem ser iguais.',
        ];

        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:2',
            'password' => 'required_with:newPassword',
            'newPassword' => 'min:6|same:newPassword2|required_with:password',
            'newPassword2' => 'min:6|same:newPassword|required_with:password'
        ],$messages);
        if( $validator->fails()){
            return redirect('/perfil')->withErrors($validator);
        }

        $input = $request->all();
        $novaSenha = $input['newPassword'];
        $novaSenha = trim($novaSenha) !== '' ? $novaSenha : null;

        $user = User::findOrFail($id);

        if( !is_null($novaSenha ) ){
            // Verificação no caso de nova senha informada
            $oldPass = $input['password'];
            if (Hash::check($oldPass, $user->password)){
                $user->password = bcrypt($input['newPassword']);
            } else{
                $validator->after(function($validator) {
                    $validator->errors()->add('password', 'Senha inválida!');
                });
            }
        }

        $user->name = $input['nome'];
        $user->save();

        if( $validator->fails()){
            return redirect('/perfil')->withErrors($validator);
        } else{
            return redirect('/perfil')->with('message', 'Perfil atualizado com sucesso!');
        }

    }
}
