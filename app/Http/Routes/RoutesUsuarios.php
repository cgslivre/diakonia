<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('usuario/permissoes', 'UsuarioPermissoesController@index')->name('usuario.permissoes');
    Route::get('usuario/{usuario}/permissoes', 'UsuarioPermissoesController@edit')
        ->name('usuario.permissoes.edit');
    Route::match(['post','put','patch'],'usuario/{usuario}/permissoes','UsuarioPermissoesController@update');

    Route::resource('usuario','UsuarioController');

    Route::get('usuarios', 'UsuarioController@lista')->name('usuario.lista');
    Route::get('perfil', 'UsuarioController@perfil')
        ->name('usuario.perfil');
    Route::match(['post','put','patch'],'/perfil/{id}/editar','UsuarioController@atualizaPerfil');
    Route::post('api/usuarios/email', 'UsuarioController@verificaEmail');

});
