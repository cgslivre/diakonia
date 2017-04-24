<?php

namespace App\Http\Controllers\material;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Model\material\Ensino;
use Bouncer;
use App\Model\material\CategoriaEnsino;
use App\Http\Requests\material\EnsinoRequest;

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

    public function store( EnsinoRequest $request){
        if(Bouncer::denies('material-curriculo-edit')){
            abort(403);
        }

        $ensino = Ensino::create($request->all());

        $file = $request['arquivo'];
        $extension = $file->getClientOriginalExtension();

        Storage::disk('local')
            ->put(Ensino::STORAGE_PATH . '/'
                . $ensino->slug.'.'.$extension,
            File::get($file));

        dd($file, $extension, $file->getFilename(), $ensino);


    }

    private function saveFile( $file ){

    }




}
