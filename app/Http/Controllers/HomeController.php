<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;
use App\Model\evento\Evento;
use App\Model\material\Ensino;
use Carbon\Carbon;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $dashboards = self::getDashboards(Auth::user(), $data);

        //dd($data);
        return view('home')
            ->with('dashboards', $dashboards)
            ->with('data', $data);
    }

    public function welcome(){
        if( Auth::guest() ){
            return view('welcome');
        } else{
            return Redirect::route('home');
        }
    }

    protected function getDashboards(User $user, &$data){
        $dashboards = [
            "user" => false,
            "evento" => false,
            "material" => false,
            "musica" => false,
            "membro" => false,
        ];

        // Dashboards de Usuário
        if( !isset($user->telefone) || trim($user->telefone) === '' ){
            $dashboards["user"] = true;
            $data["usuario.sem-telefone"] = true;
        }

        if( $user->isAn('role-membro-admin') ){
            $dashboards["user"] = true;
            $usuarios = User::whereNotIn('id', function( $query ) {
                $query->select('entity_id')
                    ->from('assigned_roles')
                    ->where('entity_type','=','App\User');
                })->get();
            if($usuarios->count() > 0 ) {
                $data["usuario.usuarios-sem-perfil"] = $usuarios;
            }
        } else if($user->roles->count() == 0){
            $data["usuario.sem-perfil"] = true;
        }

        // Dashboards de Evento
        if( $user->can('evento-view')){
            $dashboards["evento"] = true;
            $eventos = Evento::where('data_hora_inicio', '>=', Carbon::now())
                ->take(5)->get()->sortBy('data_hora_inicio');
            $data["evento.proximos"] = $eventos;
        }

        // Dashboards de Evento
        if( $user->can('musica-escala-view')){
            $dashboards["musica"] = true;

            $data["musica.proximas-escalas"] =
                DB::select("
                    select e.titulo, e.escala_musica_id, e.data_hora_inicio ,
                    DATE_FORMAT(e.data_hora_inicio,'%d/%m/%Y') AS dia
                    from eventos e
                    inner join escalas_musica em on e.escala_musica_id = em.id
                    where e.data_hora_inicio > NOW()
                    AND (
                        em.lider_id = :user1
                        OR
                        :user2 in (select colaborador_id from tarefas_escala_musica where escala_id = em.id)
                    ) ORDER BY e.data_hora_inicio LIMIT 5",[
                        'user1' => Auth::user()->id,
                        'user2' => Auth::user()->id,
                    ]);
        }
        if( $user->can('musica-escala-edit')){
            $data["musica.eventos-sem-escala"] = Evento::proximos30dias()
                ->whereNull('escala_musica_id')->take(5)->get()->sortBy('data_hora_inicio');
        }

        // Dashboards de Materias
        if( $user->can('material-curriculo-view')){
            $dashboards["material"] = true;
            $ensinos = Ensino::orderBy('id','desc')->take(5)->get();
            $data["material.ultimos-ensinos"] = $ensinos;
        }


        return $dashboards;
    }

}
