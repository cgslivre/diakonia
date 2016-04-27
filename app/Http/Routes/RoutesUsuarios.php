<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('usuario/permissoes', 'UsuarioPermissoesController@index')->name('usuario.permissoes');
    Route::get('usuario/{usuario}/permissoes', 'UsuarioPermissoesController@edit');
    Route::match(['post','put','patch'],'usuario/{usuario}/permissoes','UsuarioPermissoesController@update');

    Route::resource('usuario','UsuarioController');

    Route::get('usuarios', 'UsuarioController@lista');
    Route::get('perfil', 'UsuarioController@perfil');
    Route::match(['post','put','patch'],'/perfil/{id}/editar','UsuarioController@atualizaPerfil');
    Route::post('api/usuarios/email', 'UsuarioController@verificaEmail');

});
