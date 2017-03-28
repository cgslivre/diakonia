<?php

namespace App\Http\Controllers\membro;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Regiao;
use Bouncer;
use Validator;

class ConsultaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($consulta){
        /*
        $year = 2012;
        $published = true;

        DB::table('node')
        ->where(function($query) use ($published, $year)
        {
            if ($published) {
                $query->where('published', 'true');
            }

            if (!empty($year) && is_numeric($year)) {
                $query->where('year', '>', $year);
            }
        })
        ->get( array('column1','column2') );
*/
        return view('membro.consulta.show');

    }

}
