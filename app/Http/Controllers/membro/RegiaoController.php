<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Regiao;

class RegiaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $regioes = Regiao::orderBy('nome','asc')->get();
        if(!$regioes->isEmpty()){
            $half = ceil($regioes->count()/3);
            $regioes = $regioes->chunk($half);
        }
        return view('membro.regiao')->with('regioes',$regioes);
    }

}
