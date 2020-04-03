<?php

Route::group(['namespace'=> 'Pondit\Mailer\Http\Controllers'], function (){

    Route::get('/mailer', 'MailerController@index');

    Route::post('mailer', 'MailerController@send')->name('mailer');
});


