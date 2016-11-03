<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Model\membro\Membro;

class MembroController extends Controller
{
    /**
     * Método construtor para submeter controlador a ambiente autenticado.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $membros = Membro::with('grupo')->orderBy('nome','asc')->get();
        return $membros;
    }

    public function lista(){

        //$membros = Membro::all();
        //return view('membro.index' , compact( 'membros'));
        return view('membro.index');
    }
}
