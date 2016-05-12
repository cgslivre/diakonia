<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\MusicaServico;

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
}
