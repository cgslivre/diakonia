<?php


Route::group(['middleware' => 'web','as'=>'evento.','prefix'=>'evento'], function () {

    // Tipos Eventos
    //Route::resource('tipo' ,'evento\TipoEventoController');
    Route::get('tipos','evento\TipoEventoController@index')
        ->name('tipos.index');

    Route::get('publico-alvo','evento\PublicoAlvoController@index')
        ->name('publico-alvo.index');

    Route::get('passado','evento\EventoController@passado')
        ->name('passado.index');


});

Route::group(['middleware' => 'web'], function () {
    Route::resource('evento','evento\EventoController');
});
