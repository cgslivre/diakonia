<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Http\Requests\UsuarioCreateRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Http\Requests\UsuarioPerfilRequest;

use App\Mail\NovoUsuario;
use Auth;
use Image;
use Hash;
use Validator;
use Input;
use Gate;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if( Gate::denies('user-list')){
            abort(403);
        }
        $usuarios = User::orderBy('name','asc')->get();
        return $usuarios;
        //return User::all();
    }

    public function lista(){
        if( Gate::denies('user-list')){
            abort(403);
        }
        $usuarios = User::all();
        return view('usuario.index' , compact( 'usuarios'));
    }

    public function create(){
        return view('usuario.create')->with('perfil',false);
    }

    public function edit( $id ){
        $user = User::findOrFail($id);
        return view('usuario.edit', compact('user'))->with('perfil',false);
    }

    public function perfil(  ){
        $user = Auth::user();
        return view('usuario.edit', compact('user'))->with('perfil',true);
    }

    public function store( UsuarioCreateRequest $request){
        if( Gate::denies('user-create')){
            abort(403);
        }
        $user = User::create($request->all());
        self::saveAvatar($request['avatar'], $user);

        \Mail::to($user)->send(new UsuarioNovo($user));

        return redirect('usuarios')->with('message', 'Usuário adicionado!');
    }

    public function update($id, UsuarioUpdateRequest $request){
        if( Gate::denies('user-edit')){
            abort(403);
        }
        $user = User::findOrFail($id);
        $user->update( $request->all());
        self::saveAvatar($request['avatar'], $user);
        return Redirect::back()->withInput()->with('message', 'Usuário atualizado!');
    }

    public function atualizaPerfil( $id, UsuarioPerfilRequest $request ){

        $user = User::findOrFail($id);
        $input = $request->all();
        if(!empty($input['old-password'])){
            if ( !Hash::check($input['old-password'], $user->password)){
                $val = Validator::make($request->all(),[]);
                $val->errors ()->add('old-password', 'Senha inválida');
                return Redirect::back()->withErrors($val);
            } else{
                $data = Input::all();
            }
        } else{
            $data = Input::except('password');
        }
        $user->update( $data );
        self::saveAvatar($request['avatar'], $user);
        return Redirect::back()->withInput()->with('message', 'Perfil atualizado!');

    }

    public function destroy($id){
        if( Gate::denies('user-remove')){
            abort(403);
        }
        if(Auth::user()->id == $id){
            return Redirect::back()->with('erro', 'Não é possível remover seu próprio usuário!');
        } else{
            $user = User::findOrFail($id);
            $user->delete();
            return redirect('usuarios')->with('message', 'Usuário removido!');
        }
    }

    public function show($id){
        if( Gate::denies('user-view')){
            abort(403);
        }
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

    private static function saveAvatar($avatar, User $user){
        if( isset($avatar) ){
            $file = $avatar;
            $tempFile = User::TEMP_FILE . $file->getExtension();

            $file->move(User::AVATAR_PATH, $tempFile );

            $avatarPath = User::AVATAR_PATH . '/' . sprintf('%03d',$user->id) . '-avatar-';

            $image = Image::make(User::AVATAR_PATH . '/' . $tempFile )
                ->widen(250)
                ->save($avatarPath . User::IMG_SIZE_DEFAULT);

            $image2 = Image::make(User::AVATAR_PATH . '/' . $tempFile )
                ->widen(150)
                ->save($avatarPath . User::IMG_SIZE_MED);

            $image3 = Image::make(User::AVATAR_PATH . '/' . $tempFile )
                ->widen(70)
                ->save($avatarPath . User::IMG_SIZE_SMALL);

            $user->avatar_path = $avatarPath;
            $user->save();
        }
    }
}
