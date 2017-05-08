<?php


Route::group(['middleware' => 'web', 'as'=>'musica.', 'prefix'=>'musica'], function () {
    Route::resource('colaborador','musica\ColaboradorMusicaController');
    // Route::get('musica/calendario', 'MusicaCalendarioController@showCalendar')->name('musica.calendario');

    // Route::get('musica', function () {
    //     return redirect('musica/calendario');
    // });

    //Route::resource('musica/evento','MusicaEventoController');
    // Route::get('musica/evento/{evento}/remove','MusicaEventoController@removerEvento')->name('musica.evento.remover');
    //
    // Route::resource('musica/staff','MusicaStaffController');
    // Route::get('musica/staff/{staff}/remove','MusicaStaffController@removerStaff')->name('musica.staff.remover');
    //
    //
    // Route::get('musica/escala/{evento}/create','MusicaEscalaController@create')->name('musica.escala.create');
    // Route::match(['post','put','patch'],'musica/escala/{evento}/create','MusicaEscalaController@analiseEscala')
    //     ->name('musica.escala.analise');
    //
    //
    // Route::get('musica/servicos','MusicaServicoController@index')->name('musica.servico.index');
    // Route::get('musica/servicos/{servico}/staff','MusicaStaffController@staffByServico')
    //     ->name('musica.servico.staffByServico');
    // Route::get('musica/equipe','MusicaStaffController@equipe')
    //     ->name('musica.staff.equipe');



});
