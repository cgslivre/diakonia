<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use App\Regiao;
use Bouncer;
use DB;
use Auth;
use Validator;

use App\Model\membro\ConsultaMembro;
use App\Model\membro\Membro;
use App\Model\membro\Relacionamento;
use App\Http\Requests\membro\ConsultaMembroRequest;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Bouncer::denies('membro-list')){
            abort(403);
        }

        $consultasPublicas = ConsultaMembro::publica()->orderBy('titulo')->get();

        $consultasPrivadas = ConsultaMembro::where('created_by',Auth::user()->id)
            ->where('consulta_publica',false)->orderBy('titulo')->get();



        return view('membro.consulta.index')
            ->with('consultasPublicas',$consultasPublicas)
            ->with('consultasPrivadas',$consultasPrivadas);

    }

    public function show($slug){
        if(Bouncer::denies('membro-list')){
            abort(403);
        }

        // Aborta se não encontrar consulta com o slug informado
        $consulta = ConsultaMembro::slug($slug)->first();
        if( !$consulta ){
            abort(404);
        }

        $membros = $this->consultar($consulta);

        return view('membro.consulta.show')
            ->with('membros',$membros)
            ->with('consulta',$consulta);

    }

    public function create(){
        if(Bouncer::denies('membro-list')){
            abort(403);
        }
        $regioes = \App\Regiao::all()->pluck('nome');
        $grupos = \App\Model\membro\GrupoCaseiro::all()
            ->sortBy('nome');
        $consulta = new ConsultaMembro;
        return view('membro.consulta.create')
            ->with('consulta',$consulta)
            ->with('grupos',$grupos)
            ->with('regioes',$regioes);
    }

    public function edit( $id ){
        $consulta = ConsultaMembro::findOrFail($id);
        if(Bouncer::denies('membro-list') ||
            $consulta->create_by == Auth::user()->id){
            abort(403);
        }

        $membros = $this->consultar($consulta);
        $regioes = \App\Regiao::all()->pluck('nome');
        $grupos = \App\Model\membro\GrupoCaseiro::all()
            ->sortBy('nome');

        return view('membro.consulta.edit')
            ->with('membros',$membros)
            ->with('consulta',$consulta)
            ->with('grupos',$grupos)
            ->with('regioes',$regioes);

    }

    public function store(ConsultaMembroRequest $request){
        if(Bouncer::denies('membro-list')){
            abort(403);
        }

        $request['regioes'] = $request['regioes'] ?
            collect($request['regioes'])->toJson() : null;
        $request['grupos'] = $request['grupos'] ?
            collect($request['grupos'])->toJson() : null;
        $request['idade_minima'] = $request['idade_minima'] ?
            $request['idade_minima'] : null;
        $request['idade_maxima'] = $request['idade_maxima'] ?
            $request['idade_maxima'] : null;

        $request['created_by'] = Auth::user()->id;
        $request['modified_by'] = Auth::user()->id;
        //dd($request);
        $consulta = ConsultaMembro::create($request->all());

        return redirect()->route('consulta.edit', ['id' => $consulta->id])
            ->with('message', 'Consulta salva!');
    }

    public function update($id, ConsultaMembroRequest $request){
        $consulta = ConsultaMembro::findOrFail($id);
        if(Bouncer::denies('membro-list') ||
            $consulta->create_by == Auth::user()->id){
            abort(403);
        }

        $request['regioes'] = $request['regioes'] ?
            collect($request['regioes'])->toJson() : null;
        $request['grupos'] = $request['grupos'] ?
            collect($request['grupos'])->toJson() : null;
        $request['idade_minima'] = $request['idade_minima'] ?
            $request['idade_minima'] : null;
        $request['idade_maxima'] = $request['idade_maxima'] ?
            $request['idade_maxima'] : null;

        $request['modified_by'] = Auth::user()->id;

        $consulta->update( $request->all());

        return Redirect::route('consulta.edit', $id)
            ->withInput()->with('message', 'Consulta atualizada!');
    }

    private function consultar($consulta){
        $query = Membro::query();
        $query
            // Opção [tem discípulos]
            ->when($consulta->tem_discipulos, function( $query ) use ($consulta ){
                if( $consulta->tem_discipulos == 'S' ){
                    return $query->whereIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULADOR);
                    });
                } else if( $consulta->tem_discipulos == 'N'){
                    return $query->whereNotIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULADOR);
                    });
                }
            })
            // Opção [é discipulador]
            ->when($consulta->tem_discipulador, function( $query ) use ($consulta ){
                if( $consulta->tem_discipulador == 'S' ){
                    return $query->whereIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULO);
                    });
                } else if( $consulta->tem_discipulador == 'N'){
                    return $query->whereNotIn('id', function( $query){
                        $query->select('membro_de_id')
                            ->from('relacionamento_membros')
                            ->where('relacionamento_id','=',Relacionamento::ID_RELACIONAMENTO_DISCIPULO);
                    });
                }
            })
            // Opção [Idade Mínima]
            ->when($consulta->idade_minima, function( $query ) use ($consulta ){
                $data = \Carbon\Carbon::now()->subYears($consulta->idade_minima)->toDateString();
                return $query->where('data_nascimento','<=',$data);
            })
            // Opção [Idade Máxima]
            ->when($consulta->idade_maxima, function( $query ) use ($consulta ){
                $data = \Carbon\Carbon::now()->subYears($consulta->idade_maxima+1)->toDateString();
                return $query->where('data_nascimento','>',$data);
            })
            // Opção [Sexo]
            ->when($consulta->sexo, function( $query ) use ($consulta ){
                return $query->where('sexo','=',$consulta->sexo);
            })
            // Opção [regiao]
            ->when($consulta->regioes, function( $query ) use ($consulta){
                $arrayRegioes = json_decode($consulta->regioes);
                return $query->whereIn( 'regiao',$arrayRegioes);
            })
            // Opção [grupo caseiro]
            ->when($consulta->grupos, function( $query ) use ($consulta){
                $arrayGrupos = json_decode($consulta->grupos);
                return $query->whereIn( 'grupo_caseiro_id',$arrayGrupos);
            })
            ->with('grupo')
            ->orderBy('nome','ASC');

            return $query->get();
    }

    public function destroy($id){
        $consulta = ConsultaMembro::findOrFail($id);
        $consulta->delete();

        if(Bouncer::denies('membro-list') ||
            $consulta->create_by == Auth::user()->id){
            abort(403);
        }

        return Redirect::route('consulta.index')->with('message',
            'Consulta: ' . $consulta->titulo . ' removida!');
    }

}
