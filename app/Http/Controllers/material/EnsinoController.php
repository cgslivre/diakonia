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
                return $ensino->categoria->nome . $ensino->titulo;})
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

    public function update( $id , EnsinoRequest $request){
        if(Bouncer::denies('material-curriculo-edit')){
            abort(403);
        }

        $ensino = Ensino::findOrFail($id);

        $oldFile = $ensino->filePath;
        $oldSlug = $ensino->slug;

        $ensino->update( $request->all());

        if( isset($request["arquivo-edit"])){
            Storage::delete($oldFile);
            self::saveFile($request['arquivo-edit'], $ensino);
        } elseif ($oldSlug != $request["slug"]) {
            Storage::move($oldFile,$ensino->filePath);
        }

        return Redirect::route('material.ensino.index')
            ->with('message', 'Ensino: ' . $ensino->titulo . ' atualizado!');

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
        $ensino->extension = $extension;
        $ensino->save();

        Storage::put($ensino->filePath,File::get($file));
    }

    public function show($slug){
        $ensino = Ensino::slug($slug)->first();

        if( !$ensino ){
            abort(404);
        }

        return response()->download(storage_path() . "/app/" . $ensino->filePath);
    }

    public function destroy( $id ){
        if(Bouncer::denies('material-curriculo-edit')){
            abort(403);
        }

        $ensino = Ensino::findOrFail($id);
        Storage::delete($ensino->filePath);
        $ensino->delete();

        return Redirect::route('material.ensino.index')
            ->with('message', 'Ensino: ' . $ensino->titulo . ' removido!');
    }

}
