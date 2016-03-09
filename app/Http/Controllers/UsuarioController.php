<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UsuarioRequest;



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

    public function store( UsuarioRequest $request){
        dd($request);

    }

    public function update($id, UsuarioRequest $request){
        $user = User::findOrFail($id);

    }
}
