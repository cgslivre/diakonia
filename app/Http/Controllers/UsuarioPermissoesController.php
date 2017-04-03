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

    public function index() {
        if( Gate::denies('user-permissions')){
            abort(403);
        }

        $rolesGroup = Bouncer::role()->all()->sortBy('level')->sortBy('scope')
            ->groupBy('scope');

        return view('usuario.permissoes-index')->with('rolesGroup',$rolesGroup);
    }

    public function edit( $id ){
        if( Gate::denies('user-permissions')){
            abort(403);
        }
        $rolesGroup = Bouncer::role()->all()->sortBy('level')->sortBy('scope')
            ->groupBy('scope');
        $user = User::findOrFail($id);
        return view('usuario.permissoes-edit')->with('user',$user)->with('rolesGroup',$rolesGroup);
    }

    public function update( $id, Request $request ){
        if( Gate::denies('user-permissions')){
            abort(403);
        }
        $perfil = $request->input('user-perfil');
        $user = User::findOrFail($id);
        $val = $user->isAn($perfil);

        $user->retract('role-user-users');
        $user->retract('role-user-manage');
        $user->retract('role-user-admin');

        if( !$val ){
            $user->assign($perfil);
        }

        Bouncer::refreshFor($user);

        return redirect()->action('UsuarioPermissoesController@edit',$id)->with('message', 'Perfil atualizado!');
    }
}
