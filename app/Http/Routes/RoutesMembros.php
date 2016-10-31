<?php


Route::group(['middleware' => 'web'], function () {

    Route::resource('membro','MembroController');
    Route::get('membros', 'MembroController@lista')->name('membro.lista');


});
