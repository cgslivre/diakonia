<?php


Route::group(['middleware' => 'web'], function () {    

    Route::resource('usuario','UsuarioController');
    Route::get('usuarios', 'UsuarioController@lista');
    Route::get('perfil', 'UsuarioController@perfil');
    Route::match(['post','put','patch'],'/perfil/{id}/editar','UsuarioController@atualizaPerfil');
    Route::post('api/usuarios/email', 'UsuarioController@verificaEmail');

});
