<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioUpdateRequest;



class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $usuarios = User::orderBy('name','asc')->get();

        return view('usuario.index' , compact( 'usuarios'));
    }

    public function create(){
        return view('usuario.create');
    }

    public function edit( $id ){
        $user = User::findOrFail($id);
        return view('usuario.edit', compact('user'));
    }

    public function store( UsuarioCreateRequest $request){
        User::create( $request->all() );
        return redirect('usuario')->with('message', 'Usuário adicionado!');
    }

    public function update($id, UsuarioUpdateRequest $request){

        $user = User::findOrFail($id);

        $user->update( $request->all());

        return Redirect::back()->withInput()->with('message', 'Usuário atualizado!');

    }

    private function saveAvatar( User $user , $avatar ){

    }
}
