<?php

Route::group(['prefix' => 'api', 'middleware' => 'cors'], function () {
//    Route::group(['prefix' => 'users'], function () {
//        Route::post('/login', '');
//        Route::post('');
//    });

    Route::group(['prefix' => 'faculties'], function () {
        Route::get('/', 'FacultiesController@getPaginatedFacultiesAction');
        Route::get('/random', 'FacultiesController@getRandomFacultiesAction');
        Route::get('/{slug}', 'FacultiesController@getFacultyBySlugAction');
    });

    Route::group(['prefix' => 'teachers'], function () {
        Route::get('/random', 'TeachersController@getRandomTeachersAction');
        Route::get('/', 'TeachersController@getTeachersAction');
        Route::get('/{slug}', 'TeachersController@getTeacherBySlugAction');
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'AuthController@loginAction');
        Route::post('/registration', 'AuthController@registrationAction');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@getUsersAction');
        Route::get('/{slug}', 'UsersController@getUserAction');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'faculties'], function () {
            Route::get('/', 'Admin\FacultiesController@getFacultiesAction');
            Route::post('/', 'Admin\FacultiesController@postFacultyAction');
            Route::get('/{slug}', 'Admin\FacultiesController@getFacultyAction');
            Route::put('/{slug}', 'Admin\FacultiesController@putFacultyAction');
            Route::delete('/{slug}', 'Admin\FacultiesController@deleteFacultyAction');
        });
    });
});

Route::get('/doc', 'HomeController@getDocAction');
Route::get('/', 'HomeController@indexAction');
