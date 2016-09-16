<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Model\musica\MusicaServico;
use App\Model\musica\MusicaStaff;
use App\Http\Requests\musica\MusicaStaffRequest;
use Illuminate\Support\Facades\Redirect;
use DB;

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

    public function equipe(){
        $equipe = MusicaStaff::all();
        return $equipe;
    }

    public function store(MusicaStaffRequest $request){
        $input = $request->all();

        $staff = new MusicaStaff;
        $staff->user_id = $input['usuario'];
        $staff->lideranca = $input['lideranca'];
        $staff->save();

        $staff->servicos()->attach($input['servico']);

        return Redirect::route('musica.staff.index')
            ->with('message', 'Membro da equipe de música adicionado!');

    }

    public function show($id){

    }

    public function staffByServico($servico_id){

        $staff = DB::table('musica_staff_servico')
            ->join('musica_staff', 'musica_staff_servico.musica_staff_id','=','musica_staff.id')
            ->join('users','musica_staff.user_id','=','users.id')
            ->select(['musica_staff_servico.*',
                'musica_staff.*',
                'users.name',
                'users.email',
                'users.avatar_path',
                'users.telefone',
                'users.regiao']);
        $id = intval($servico_id);
        if( $id > 0){
            $staff = $staff->where('musica_servico_id','=',$id);
        }
        return $staff->orderBy('users.name', 'asc')->get();

    }

    public function update($id, MusicaStaffRequest $request){
        $staff = MusicaStaff::findOrFail($id);
        $input = $request->all();
        $staff->lideranca = $input['lideranca'];
        $staff->save();
        $staff->servicos()->sync($input['servico']);

        return Redirect::route('musica.staff.index')
            ->with('message', 'Membro da equipe de música atualizado!');

    }

    public function destroy($id){
        $staff = MusicaStaff::findOrFail( $id );
        $staff->delete();
        return Redirect::route('musica.staff.index')->with('message', 'Usuário removido da equipe de música!');
    }

    public function edit($id){
        $staff = MusicaStaff::findOrFail($id);
        $servicos = MusicaServico::all();
        return view('musica.staff.edit', compact('staff','servicos'));

    }

    public function removerStaff( $id ){
        $staff = MusicaStaff::findOrFail( $id );
        return view('musica.staff.remove', compact('staff'));
    }
}
