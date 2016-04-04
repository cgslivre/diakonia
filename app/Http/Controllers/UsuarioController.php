<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use Auth;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        //$usuarios = User::orderBy('name','asc')->get();

        //return view('usuario.index' , compact( 'usuarios'));
        return User::all();
    }

    public function lista(){
        $usuarios = User::all();
        return view('usuario.index' , compact( 'usuarios'));
    }

    public function create(){
        return view('usuario.create');
    }

    public function edit( $id ){
        $user = User::findOrFail($id);
        return view('usuario.edit', compact('user'));
    }

    public function store( UsuarioCreateRequest $request){
        User::create($request->all());
        return redirect('usuarios')->with('message', 'Usuário adicionado!');
    }

    public function update($id, UsuarioUpdateRequest $request){

        $user = User::findOrFail($id);

        $user->update( $request->all());

        return Redirect::back()->withInput()->with('message', 'Usuário atualizado!');

    }

    public function destroy($id){
        if(Auth::user()->id == $id){
            return Redirect::back()->with('erro', 'Não é possível remover seu próprio usuário!');
        } else{
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('usuarios')->with('message', 'Usuário removido!');
        }
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('usuario.show', compact('user'));
    }

    public function verificaEmail(Request $request){
        // Recebe o parametro email
        $request = Request::instance();
        $inputRequest = json_decode($request->getContent(), true);
        $email = $inputRequest['value'];

        $user = User::where('email',$email)->first();
        if( $user === null ){
            return response()->json(['isValid' => true, 'email' => $email]);
        } else{
            return response()->json(['isValid' => false, 'email' => $email]);
        }


    }
}
