<?php


Route::group(['middleware' => ['web','auth'], 'as'=>'musica.', 'prefix'=>'musica'], function () {
    Route::resource('colaborador','musica\ColaboradorMusicaController');

    Route::get('eventos','musica\EscalaMusicaController@eventos')
        ->name('eventos');

    //Route::resource('escala','musica\EscalaMusicaController');
    Route::get('escala/{evento}/create','musica\EscalaMusicaController@create')
        ->name('escala.create');
    Route::get('escala/{escala}/edit','musica\EscalaMusicaController@edit')
        ->name('escala.edit');
    Route::get('escala/{escala}/tarefa/{servico}/add','musica\EscalaMusicaController@addTarefa')
        ->name('escala.tarefa.add');
    Route::match(['post','put','patch'],'escala/{escala}/tarefa/servico/add',
        'musica\EscalaMusicaController@addTarefaAction')->name('escala.tarefa.store');
    Route::delete('tarefa/{tarefa}/delete','musica\EscalaMusicaController@deleteTarefaAction')
        ->name('escala.tarefa.delete');
    Route::match(['post','put','patch'],'escala/{evento}/lider/update',
        'musica\EscalaMusicaController@updateLider')->name('escala.lider.update');

});
