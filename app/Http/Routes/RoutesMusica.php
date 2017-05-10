<?php


Route::group(['middleware' => 'web', 'as'=>'musica.', 'prefix'=>'musica'], function () {
    Route::resource('colaborador','musica\ColaboradorMusicaController');

    Route::get('eventos','musica\EscalaMusicaController@eventos')
        ->name('eventos');

    //Route::resource('escala','musica\EscalaMusicaController');
    Route::get('escala/{evento}/create','musica\EscalaMusicaController@create')
        ->name('escala.create');
    Route::get('escala/{evento}/{escala}/edit','musica\EscalaMusicaController@edit')
        ->name('escala.edit');
    Route::match(['post','put','patch'],'escala/{evento}/lider/update','musica\EscalaMusicaController@updateLider')
        ->name('escala.lider.update');

});
