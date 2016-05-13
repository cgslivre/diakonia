<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Model\musica\MusicaServico;
use App\Model\musica\MusicaStaff;
use App\Http\Requests\musica\MusicaStaffRequest;
use Illuminate\Support\Facades\Redirect;

class MusicaStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $usuarios = User::all();
        $servicos = MusicaServico::all();
        $usuariosCadastrados = MusicaStaff::all()->lists(['user_id']);
        return view('musica.staff.create', compact('usuarios','servicos','usuariosCadastrados'));
    }

    public function index(){
        $equipe = MusicaStaff::all();
        $servicos = MusicaServico::all();
        return view('musica.staff.index' , compact( 'equipe','servicos'));
    }

    public function store(MusicaStaffRequest $request){
        $input = $request->all();

        $staff = new MusicaStaff;
        $staff->user_id = $input['usuario'];
        $staff->lideranca = $input['lider'];
        $staff->save();

        $staff->servicos()->attach($input['servico']);

        return Redirect::route('musica.staff.index')->with('message', 'Evento adicionado!');

    }

    public function show($id){

    }

    public function update($id, MusicaStaffRequest $request){

    }

    public function destroy($id){

    }

    public function edit($id){

    }
}
