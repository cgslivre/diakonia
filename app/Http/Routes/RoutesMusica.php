<?php


Route::group(['middleware' => 'web', 'as'=>'musica.', 'prefix'=>'musica'], function () {
    Route::resource('colaborador','musica\ColaboradorMusicaController');

    Route::get('eventos','musica\EscalaMusicaController@eventos')
        ->name('eventos');

});
