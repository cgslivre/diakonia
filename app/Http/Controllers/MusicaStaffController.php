<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\MusicaServico;
use App\Http\Requests\musica\MusicaStaffRequest;

class MusicaStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        $usuarios = User::all();
        $servicos = MusicaServico::all();
        return view('musica.staff.create', compact('usuarios','servicos'));
    }

    public function index(){

    }

    public function store(MusicaStaffRequest $request){
        dd($request);

    }

    public function show($id){

    }

    public function update($id, MusicaStaffRequest $request){

    }

    public function destroy($id){

    }

    public function edit($id){

    }
}
