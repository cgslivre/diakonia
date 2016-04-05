<?php


Route::group(['middleware' => 'web'], function () {
    Route::get('/perfil', 'PerfilUsuarioController@show');
    Route::post('/perfil','PerfilUsuarioController@salvar');
    Route::match(['post'],'/perfil/{id}/editar','PerfilUsuarioController@salvar');


    Route::resource('usuario','UsuarioController');
    Route::get('usuarios', 'UsuarioController@lista');
    Route::get('perfil-usuario', 'UsuarioController@perfil');
    Route::match(['post','put','patch'],'/perfil-usuario/{id}/editar','UsuarioController@atualizaPerfil');
    Route::post('api/usuarios/email', 'UsuarioController@verificaEmail');

});
