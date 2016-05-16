<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MusicaCalendarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCalendar() {

        return view('musica.calendario.index');
    }
}