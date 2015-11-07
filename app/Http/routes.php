<?php

Route::group(['prefix' => 'api'], function () {
//    Route::group(['prefix' => 'users'], function () {
//        Route::post('/login', '');
//        Route::post('');
//    });

    Route::group(['prefix' => 'faculties'], function () {
        Route::get('/', 'FacultiesController@index');
        Route::post('/', 'FacultiesController@store');
    });
});

Route::get('/doc', 'HomeController@getDocAction');