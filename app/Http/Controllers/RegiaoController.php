<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Regiao;

class RegiaoController extends Controller
{
    public function index(){
        $regioes = Regiao::orderBy('nome','asc')->get();
        return $regioes;
    }
}
