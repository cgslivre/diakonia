<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\User;

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
            "membro" => false,
        ];
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
        }



        return $dashboards;
    }

}
