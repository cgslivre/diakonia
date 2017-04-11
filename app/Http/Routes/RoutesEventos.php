<?php


Route::group(['middleware' => 'web','as'=>'eventos.','prefix'=>'eventos'], function () {

    // Tipos Eventos
    //Route::resource('tipo' ,'evento\TipoEventoController');
    Route::get('tipos','evento\TipoEventoController@index')
        ->name('tipos.index');

    Route::get('publico-alvo','evento\PublicoAlvoController@index')
        ->name('publico-alvo.index');


});
