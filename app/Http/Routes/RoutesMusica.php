<?php


Route::group(['middleware' => 'web'], function () {

    Route::get('musica/calendario', 'MusicaCalendarioController@showCalendar')->name('musica.calendario');

    Route::get('musica', function () {
        return redirect('musica/calendario');
    });

    Route::resource('musica/evento','MusicaEventoController');
    Route::get('musica/evento/{evento}/remove','MusicaEventoController@removerEvento')->name('musica.evento.remover');

    Route::resource('musica/staff','MusicaStaffController');
    Route::get('musica/staff/{staff}/remove','MusicaStaffController@removerStaff')->name('musica.staff.remover');


});
