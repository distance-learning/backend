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

    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'AccountController@getUserInfoAction');
        Route::get('/logout', 'AccountController@logoutAction');
        Route::put('/update', 'AccountController@updateUserInformationAction');
        Route::put('/reset-password', 'AccountController@updateUserPasswordAction');
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::post('/login', 'AuthController@loginAction');
        Route::post('/registration', 'AuthController@registrationAction');
        Route::post('/reset-password', 'AuthController@postResetPassword');
        Route::post('/reset-password/{token}', 'AuthController@postResetPasswordCheck');
        Route::get('/faculties', 'AuthController@getFacultiesAction');
    });

    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::group(['prefix' => 'account'], function () {
            Route::get('/tasks', 'AccountController@getTasksAction');
        });

        Route::group(['prefix' => 'events'], function () {
            Route::get('/', 'EventsController@getEventsByInterval');
        });

        Route::group(['prefix' => 'files'], function () {
            Route::post('/', 'FilesController@uploadFileAction');
        });

        Route::group(['prefix' => 'tasks'], function () {
            Route::post('/', 'TasksController@createTaskAction');
            Route::get('/{task}', 'TasksController@getTaskAction');
            Route::put('/{task}', 'TasksController@updateTaskAction');
            Route::delete('/{task}', 'TasksController@deleteTaskAction');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@getUsersAction');
            Route::get('/{slug}', 'UsersController@getUserAction');
        });

        Route::group(['prefix' => 'courses'], function () {
            Route::get('/', 'Admin\CoursesController@getCoursesAction');
            Route::get('/{course}', 'Admin\CoursesController@getCourseAction');
            Route::post('/', 'Admin\CoursesController@postCourseAction');
            Route::put('/{course}', 'Admin\CoursesController@putCourseAction');
            Route::delete('/{course}', 'Admin\CoursesController@deleteCourseAction');
        });

        Route::group(['prefix' => 'tests'], function () {
            Route::post('/', 'TestsController@postTestAction');
            Route::get('/', 'TestsController@getTestsAction');
            Route::put('/{test}', 'TestsController@updateTestAction');
            Route::get('/{test}', 'TestsController@getTestAction');
            Route::delete('/{test}', 'TestsController@deleteTestAction');
            Route::get('/{test}/passing', 'TestsController@getTestsForPassingTest');

            Route::group(['prefix' => '/{test}/questions'], function () {
                Route::post('/', 'QuestionsController@createQuestionAction');
                Route::get('/{question}', 'QuestionsController@getQuestionByCodeAction');
                Route::put('/{question}', 'QuestionsController@updateQuestionAction');
                Route::post('/{question}/upload', 'QuestionsController@updateImageToQuestionByCodeAction');
            });
        });

        Route::group(['prefix' => 'subjects'], function () {
            Route::get('/{subject_id}/courses', 'SubjectsController@getCoursesBySubjectAndTeacherAction');
        });
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::group(['prefix' => 'groups'], function () {
            Route::get('/', 'Admin\GroupsController@getGroupsAction');
            Route::post('/', 'Admin\GroupsController@postGroupAction');
            Route::get('/{group}', 'Admin\GroupsController@getGroupAction');
            Route::put('/{group}', 'Admin\GroupsController@putGroupAction');
            Route::delete('/{group}', 'Admin\GroupsController@deleteGroupAction');

            Route::post('/{group}/students', 'Admin\GroupsController@addStudentsToGroupAction');
            Route::delete('/{group}/students', 'Admin\GroupsController@removeStudentsFromGroupAction');
        });

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
            Route::post('/', 'Admin\DirectionsController@storeAction');
            Route::put('/{slug}', 'Admin\DirectionsController@putAction');
            Route::delete('/{slug}', 'Admin\DirectionsController@deleteAction');

            Route::get('/{slug}/groups', 'Admin\DirectionsController@getGroupsByDirectionSlugAction');

            Route::group(['prefix' => '/{slug}/subjects'], function () {
                Route::get('/', 'Admin\SubjectsController@getSubjectsAction');
                Route::get('/{subject}', 'Admin\SubjectsController@getSubjectAction');
                Route::post('/', 'Admin\SubjectsController@createSubjectAction');
                Route::put('/{subject}', 'Admin\SubjectsController@editSubjectAction');
                Route::delete('/{subject}', 'Admin\SubjectsController@deleteSubjectAction');
            });
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

        Route::group(['prefix' => 'students'], function () {
            Route::get('/', 'Admin\StudentsController@getStudentsAction');
            Route::get('/search', 'Admin\StudentsController@findStudentsAction');
        });

        Route::group(['prefix' => 'courses'], function () {
            Route::get('/', 'Admin\CoursesController@getCoursesAction');
            Route::get('/{course}', 'Admin\CoursesController@getCourseAction');
            Route::post('/', 'Admin\CoursesController@postCourseAction');
            Route::put('/{course}', 'Admin\CoursesController@putCourseAction');
            Route::delete('/{course}', 'Admin\CoursesController@deleteCourseAction');
        });
    });
});

Route::get('/doc', 'HomeController@getDocAction');
Route::get('/', 'HomeController@indexAction');
