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

    public function index(){
        $ensinosAgrupados = Ensino::all()
            ->sortBy( function($ensino){
                return $ensino->categoria->nome;})
            ->groupBy( function($ensino){
                return $ensino->categoria->nome;});

        return view('material.ensino.ensino-index')
            ->with('ensinosAgrupados', $ensinosAgrupados);
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
        self::saveFile($request['arquivo'], $ensino);

        return redirect()->route('material.ensino.index')
            ->with('message', 'Ensino ' . $ensino->titulo . ' adicionado.');

    }

    public function edit( $id ){
        if(Bouncer::denies('material-curriculo-edit')){
            abort(403);
        }

        $ensino = Ensino::findOrFail($id);
        $categorias = CategoriaEnsino::all()->sortBy('nome');
        
        return view('material.ensino.ensino-edit')
            ->with('ensino', $ensino)
            ->with('categorias', $categorias);
    }

    private function saveFile( $file , $ensino ){
        $extension = $file->getClientOriginalExtension();
        $ensino->mime = $file->getClientMimeType();
        $ensino->save();

        Storage::disk('local')
            ->put(Ensino::STORAGE_PATH . '/'
                . $ensino->slug.'.'.$extension,
            File::get($file));
    }




}
