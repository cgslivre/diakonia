<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Gate;
use Bouncer;
use App\User;

class UsuarioPermissoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index( $id ){
        if( Gate::denies('user-permissions')){
            abort(403);
        }
        $user = User::findOrFail($id);
        return view('usuario.permissoes-index', compact('user'));
    }

    public function update( $id, Request $request ){
        if( Gate::denies('user-permissions')){
            abort(403);
        }
        $perfil = $request->input('user-perfil');
        $user = User::findOrFail($id);
        $val = $user->is($perfil);

        $user->retract('role-user-users');
        $user->retract('role-user-manage');
        $user->retract('role-user-admin');

        if( !$val ){
            $user->assign($perfil);
        }

        Bouncer::refreshFor($user);

        return redirect()->action('UsuarioPermissoesController@index',$id)->with('message', 'Perfil atualizado!');
    }
}
