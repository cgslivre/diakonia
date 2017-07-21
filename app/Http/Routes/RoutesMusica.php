<?php


Route::group(['middleware' => ['web','auth'], 'as'=>'musica.', 'prefix'=>'musica'], function () {
    Route::resource('colaborador','musica\ColaboradorMusicaController');
    // Route::get('colaborador/historico/{colaborador}/{escala?}', 'musica\ColaboradorMusicaController@historico')
    //     ->('colaborador.historico');
    Route::get('colaborador/historico/{colaborador}/{escala?}','musica\ColaboradorMusicaController@historico')
        ->name('colaborador.historico');
    Route::get('lider/historico/{lider}/{evento?}','musica\ColaboradorMusicaController@historicoLider')
        ->name('lider.historico');

    Route::get('eventos/{colaborador?}','musica\EscalaMusicaController@eventos')
        ->name('eventos');

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
    Route::match(['post','put','patch'],'escala/{escala}/impedimento/create',
        'musica\ImpedimentoEscalaController@create')->name('escala.impedimento.create');
    Route::match(['post','put','patch'],'escala/{escala}/impedimento/destroy',
        'musica\ImpedimentoEscalaController@destroy')->name('escala.impedimento.destroy');
    Route::get('escala/impedimento/{t_escala}/{t_colaborador}','musica\ImpedimentoEscalaController@tokenCreate')
        ->name('escala.impedimento.create.token');



    // Remover após testes
    Route::get('testing','musica\EscalaMusicaController@testing')
        ->name('escala.testing');

});

Route::group(['middleware' => ['web'], 'as'=>'musica.', 'prefix'=>'musica'], function () {
    Route::get('escala/impedimento/{token}','musica\ImpedimentoEscalaController@token')
    ->name('escala.impedimento.token');
});
