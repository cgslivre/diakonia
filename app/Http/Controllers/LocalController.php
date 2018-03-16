<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LocalRequest;
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

    public function index()
    {
        $locais = \App\Local::all();
        return view('local.local-index')->with('locais', $locais);
    }

    public function show($slug)
    {
        $local = \App\Local::slug($slug)->first();

        if (!$local) {
            abort(404);
        }
        return view('local.local-show')->with('local', $local);
    }

    public function edit($id)
    {
        if (Bouncer::denies('geral-edit-local')) {
            abort(403);
        }

        $local = \App\Local::findOrFail($id);

        return view('local.local-edit')->with('local', $local);
    }

    public function update($id, LocalRequest $request)
    {
        if (Bouncer::denies('geral-edit-local')) {
            abort(403);
        }

        $local = \App\Local::findOrFail($id);
        $local->update($request->all());

        return Redirect::route('local.edit', $id)
            ->withInput()->with('message', 'Local atualizado!');

    }

    public function create()
    {
        if (Bouncer::denies('geral-create-local')) {
            abort(403);
        }

        $local = new \App\Local;

        return view('local.local-create')->with('local', $local);
    }

    public function store(LocalRequest $request)
    {
        if (Bouncer::denies('geral-create-local')) {
            abort(403);
        }

        $local = \App\Local::create($request->all());

        return Redirect::route('local.edit', $local->id)
            ->withInput()->with('message', 'Local criado!');

    }

    public function destroy($id)
    {
        if (Bouncer::denies('geral-remove-local')) {
            abort(403);
        }

        $local = \App\Local::findOrFail($id);
        $local->delete();

        return Redirect::route('local.index')->with(
            'message',
            'Local: ' . $local->nome . ' removida!'
        );
    }


}
