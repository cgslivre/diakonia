<?php


Route::group(['middleware' => 'web'], function () {
    Route::get('/perfil', 'PerfilUsuarioController@show');
    Route::post('/perfil','PerfilUsuarioController@salvar');
    Route::match(['post'],'/perfil/{id}/editar','PerfilUsuarioController@salvar');
});
