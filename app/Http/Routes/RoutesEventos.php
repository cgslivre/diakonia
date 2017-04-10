<?php


Route::group(['middleware' => 'web','as'=>'eventos.','prefix'=>'eventos'], function () {

    // Tipos Eventos
    Route::resource('tipo' ,'evento\TipoEventoController');



});
