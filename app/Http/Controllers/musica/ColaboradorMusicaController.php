<?php

namespace App\Http\Controllers\musica;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Model\musica\ColaboradorMusica;
use App\Model\musica\ServicoMusica;
use App\Http\Requests\musica\ColaboradorMusicaRequest;
use App\User;

class ColaboradorMusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipe = ColaboradorMusica::all();
        $servicos = ServicoMusica::all();
        return view('musica.colaboradores.index' , compact( 'equipe','servicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicos = ServicoMusica::all();
        $usuarios = User::all();
        return view('musica.colaboradores.create' , compact( 'servicos','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColaboradorMusicaRequest $request)
    {
        $input = $request->all();
        $colaborador = new ColaboradorMusica;
        $colaborador->user_id = $input['user_id'];
        $colaborador->lider = $input['lider'];
        $colaborador->save();

        $colaborador->servicos()->attach($input['servico']);

        return Redirect::route('musica.colaborador.index')
            ->with('message', 'Membro da equipe de música adicionado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function show(ColaboradorMusica $colaboradorMusica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $colaborador = colaboradorMusica::findOrFail($id);
        $servicos = ServicoMusica::all();
        return view('musica.colaboradores.edit', compact('colaborador','servicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function update(ColaboradorMusicaRequest $request, $id)
    {
        $colaborador = ColaboradorMusica::findOrFail($id);
        $input = $request->all();
        $colaborador->lider = $input['lider'];
        $colaborador->save();
        $colaborador->servicos()->sync($input['servico']);

        return Redirect::route('musica.colaborador.index')
            ->with('message', 'Membro da equipe de música atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\model\ColaboradorMusica  $colaboradorMusica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $colaborador = ColaboradorMusica::findOrFail( $id );
        $colaborador->delete();
        return Redirect::route('musica.colaborador.index')
            ->with('message', 'Usuário removido da equipe de música!');
    }

    // public function staffByServico($servico_id){
    //
    //     $staff = DB::table('musica_staff_servico')
    //         ->join('musica_staff', 'musica_staff_servico.musica_staff_id','=','musica_staff.id')
    //         ->join('users','musica_staff.user_id','=','users.id')
    //         ->select(['musica_staff_servico.*',
    //             'musica_staff.*',
    //             'users.name',
    //             'users.email',
    //             'users.avatar_path',
    //             'users.telefone',
    //             'users.regiao']);
    //     $id = intval($servico_id);
    //     if( $id > 0){
    //         $staff = $staff->where('musica_servico_id','=',$id);
    //     }
    //     return $staff->orderBy('users.name', 'asc')->get();
    //
    // }
}
