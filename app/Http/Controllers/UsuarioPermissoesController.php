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

        $usuarios = User::all()->sortBy('name');

        return view('usuario.permissoes-index')->with('usuarios',$usuarios);
    }

    public function edit( $id ){
        if( Gate::denies('user-permissions')){
            abort(403);
        }
        $rolesGroup = Bouncer::role()->all()->sortBy('nivel')->sortBy('scope')
            ->groupBy('scope');
        $user = User::findOrFail($id);
        return view('usuario.permissoes-edit')->with('user',$user)->with('rolesGroup',$rolesGroup);
    }

    public function update( $id, Request $request ){
        if( Gate::denies('user-permissions')){
            abort(403);
        }
        $user = User::findOrFail($id);

        $scope = $request->input('scope');
        $roleChecked = $request->input('permissao');

        $roles = \Silber\Bouncer\Database\Role::where('scope',$scope)->get();
        foreach ($roles as $role) {
            if( $role->name == $roleChecked ){
                $user->assign($role->name);
            } else{
                $user->retract($role->name);
            }
        }
        Bouncer::refresh();
        return redirect()->action('UsuarioPermissoesController@edit',$id)
            ->with('message', 'Perfil atualizado!');
    }
}
