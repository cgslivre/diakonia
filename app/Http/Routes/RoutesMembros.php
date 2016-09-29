<?php


Route::group(['middleware' => 'web'], function () {

    Route::resource('membro','MembroController');


});
