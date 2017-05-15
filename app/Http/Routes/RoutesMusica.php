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
    Route::get('escala/{escala}','musica\EscalaMusicaController@show')
        ->name('escala.show');
    Route::get('escala/{escala}/publicar','musica\EscalaMusicaController@publish')
        ->name('escala.analisar');
    Route::match(['post','put','patch'],'escala/{escala}/publicar',
        'musica\EscalaMusicaController@publishAction')->name('escala.publicar');
    Route::delete('escala/{escala}/delete','musica\EscalaMusicaController@destroy')
        ->name('escala.destroy');
    Route::get('escala/{escala}/tarefa/{servico}/add','musica\EscalaMusicaController@addTarefa')
        ->name('escala.tarefa.add');
    Route::match(['post','put','patch'],'escala/{escala}/tarefa/servico/add',
        'musica\EscalaMusicaController@addTarefaAction')->name('escala.tarefa.store');
    Route::delete('tarefa/{tarefa}/delete','musica\EscalaMusicaController@deleteTarefaAction')
        ->name('escala.tarefa.delete');
    Route::match(['post','put','patch'],'escala/{evento}/lider/update',
        'musica\EscalaMusicaController@updateLider')->name('escala.lider.update');

});
