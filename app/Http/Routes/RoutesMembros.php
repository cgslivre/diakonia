<?php


Route::group(['middleware' => 'web'], function () {

    //Route::resource('membro/grupo-caseiro','membro\GrupoCaseiroController');
    //
    Route::get('membro/grupo-caseiro','membro\GrupoCaseiroController@index')->name('membros.grupo-caseiro');
    Route::post('membro/grupo-caseiro','membro\GrupoCaseiroController@salvar');

    Route::resource('membro','membro\MembroController');
    Route::get('membros', 'membro\MembroController@lista')->name('membros.lista');




});
