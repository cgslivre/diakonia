<?php


Route::group(['middleware' => 'web'], function () {

    Route::resource('usuario','UsuarioController');
    Route::get('usuarios', 'UsuarioController@lista');
    Route::get('perfil', 'UsuarioController@perfil');
    Route::match(['post','put','patch'],'/perfil/{id}/editar','UsuarioController@atualizaPerfil');
    Route::post('api/usuarios/email', 'UsuarioController@verificaEmail');

    Route::get('usuario/{usuario}/permissoes', 'UsuarioPermissoesController@index');
    Route::match(['post','put','patch'],'usuario/{usuario}/permissoes','UsuarioPermissoesController@update');

});
