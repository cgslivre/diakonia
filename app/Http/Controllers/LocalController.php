<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class LocalController extends Controller
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
        $locais = \App\Local::all();
        return view('local.local-index')->with('locais', $locais);
    }

    public function show($slug){
        $local = \App\Local::slug($slug)->first();

        if( !$local ){
            abort(404);
        }
        return view('local.local-show')->with('local', $local);
    }

    public function edit( $id ){
        $local = \App\Local::findOrFail($id);

        return view('local.local-edit')->with('local', $local);
    }

    public function update( $id, Request $request ){

    }


}
