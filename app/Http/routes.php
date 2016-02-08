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
        Route::get('/user', 'AuthController@getUserInfoAction');
        Route::post('/reset-password', 'AuthController@postResetPassword');
        Route::post('/reset-password/{token}', 'AuthController@postResetPasswordCheck');
        Route::get('/logout', 'AuthController@logoutAction');
    });

    Route::group(['prefix' => 'user', 'middleware' =>  ['jwt.auth', 'jwt.refresh']], function () {
        Route::put('/update', 'AuthController@updateUserInformationAction');
        Route::put('/reset-password', 'AuthController@updateUserPasswordAction');
    });

    Route::group(['prefix' => 'users', 'middleware' =>  ['jwt.auth', 'jwt.refresh']], function () {
        Route::get('/', 'UsersController@getUsersAction');
        Route::get('/{slug}', 'UsersController@getUserAction');
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['jwt.auth', 'jwt.refresh']], function () {
        Route::group(['prefix' => 'faculties'], function () {
            Route::get('/', 'Admin\FacultiesController@getFacultiesAction');
            Route::post('/', 'Admin\FacultiesController@postFacultyAction');
            Route::get('/{slug}', 'Admin\FacultiesController@getFacultyAction');
            Route::put('/{slug}', 'Admin\FacultiesController@putFacultyAction');
            Route::delete('/{slug}', 'Admin\FacultiesController@deleteFacultyAction');
        });

        Route::group(['prefix'  =>  'directions'], function () {
            Route::get('/', 'Admin\DirectionsController@indexAction');
            Route::get('/{slug}', 'Admin\DirectionsController@itemAction');
            Route::post('/', 'Admin\DirectionsController@createAction');
            Route::put('/{slug}', 'Admin\DirectionsController@putAction');
            Route::delete('/{slug}', 'Admin\DirectionsController@deleteAction');
        });

        Route::group(['prefix'  =>  'teachers'], function () {
            Route::get('/', 'Admin\TeachersController@indexAction');
            Route::get('/{slug}', 'Admin\TeachersController@itemAction');
            Route::post('/', 'Admin\TeachersController@createAction');
            Route::put('/{slug}', 'Admin\TeachersController@putAction');
            Route::delete('/{slug}', 'Admin\TeachersController@deleteAction');
        });

        Route::group(['prefix'  =>  'users'], function () {
            Route::get('/', 'Admin\UsersController@indexAction');
            Route::get('/{slug}', 'Admin\UsersController@itemAction');
            Route::post('/', 'Admin\UsersController@storeAction');
            Route::put('/{slug}', 'Admin\UsersController@putAction');
            Route::delete('/{slug}', 'Admin\UsersController@deleteAction');
        });
    });
});

Route::get('/doc', 'HomeController@getDocAction');
Route::get('/', 'HomeController@indexAction');
