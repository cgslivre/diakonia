<?php

namespace App\Http\Controllers\material;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Model\material\Ensino;
use Bouncer;
use App\Model\material\CategoriaEnsino;

class EnsinoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        if(Bouncer::denies('material-curriculo-edit')){
            abort(403);
        }

        $ensino = new Ensino;
        $categorias = CategoriaEnsino::all()->sortBy('nome');

        return view('material.ensino.ensino-create')
            ->with('ensino', $ensino)
            ->with('categorias', $categorias);

    }




}
