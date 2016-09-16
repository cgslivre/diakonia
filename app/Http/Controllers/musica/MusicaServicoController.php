<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\musica\MusicaServico;

class MusicaServicoController extends Controller
{
    public function index(){
        $servicos = MusicaServico::all();
        return $servicos;
    }
}
