<?php

Route::group(['prefix' => 'api'], function () {
//    Route::group(['prefix' => 'users'], function () {
//        Route::post('/login', '');
//        Route::post('');
//    });

    Route::group(['prefix' => 'faculties'], function () {
        Route::get('/random', 'FacultiesController@randomFacultiesAction');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@getUsersAction');
        Route::post('/authenticate', 'UsersController@authenticateUserAction');
        Route::get('/{slug}', 'UsersController@getUserAction');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'faculties'], function () {
            Route::get('/', 'FacultiesController@getFacultiesAction');
            Route::post('/', 'FacultiesController@postFacultyAction');
            Route::get('/{slug}', 'FacultiesController@getFacultyAction');
            Route::put('/{slug}', 'FacultiesController@putFacultyAction');
            Route::delete('/{slug}', 'FacultiesController@deleteFacultyAction');
        });
    });
});

Route::get('/doc', 'HomeController@getDocAction');