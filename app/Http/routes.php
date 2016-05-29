<?php

Route::group(['prefix' => 'api', 'middleware' => 'cors'], function () {

    Route::group(['prefix' => 'faculties'], function () {
        Route::get('/', 'FacultiesController@getPaginatedFacultiesAction');
        Route::get('/random', 'FacultiesController@getRandomFacultiesAction');
        Route::get('/{faculty}', 'FacultiesController@getFacultyBySlugAction');
    });

    Route::group(['prefix' => 'teachers'], function () {
        Route::get('/random', 'TeachersController@getRandomTeachersAction');
        Route::get('/', 'TeachersController@getTeachersAction');
        Route::get('/{user}', 'TeachersController@getTeacherBySlugAction');
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

    Route::group(['prefix' => 'modules'], function () {
        Route::post('/', 'ModulesController@createModuleAction');
        Route::post('/groups', 'ModulesController@createModuleGroupAction');
        Route::put('/{module}', 'ModulesController@createModuleAction');
    });

    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::group(['prefix' => 'account'], function () {
            Route::get('/tasks', 'AccountController@getTasksAction');
            Route::get('/courses', 'AccountController@getCoursesAction');
            Route::get('/subjects', 'AccountController@getSubjectsAction');
            Route::get('/modules', 'AccountController@getModulesAction');
        });

        Route::group(['prefix' => 'events'], function () {
            Route::get('/', 'EventsController@getEventsByInterval');
        });

        Route::group(['prefix' => 'files'], function () {
            Route::post('/', 'FilesController@uploadFileAction');
            Route::get('/', 'FilesController@getFilesAction');
            Route::get('/documents', 'FilesController@getDocumentsAction');
            Route::get('/images', 'FilesController@getImagesAction');
            Route::get('/{file}', 'FilesController@getFileAction');
            Route::delete('/{file}', 'FilesController@deleteFileAction');
        });

        Route::group(['prefix' => 'tasks'], function () {
            Route::post('/', 'TasksController@createTaskAction');
            Route::get('/{task}', 'TasksController@getTaskAction');
            Route::put('/{task}', 'TasksController@updateTaskAction');
            Route::delete('/{task}', 'TasksController@deleteTaskAction');
        });

        Route::group(['prefix' => 'users'], function () {
            Route::get('/', 'UsersController@getUsersAction');
            Route::get('/{user}', 'UsersController@getUserAction');
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
            Route::get('/{test}/passing', 'TestsController@getTestsForPassingAction');
            Route::post('/{test}/check', 'TestsController@checkCompletedTestsAction');

            Route::get('/{test}/scores', 'ScoresController@getScoresAction');

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

    Route::group(['prefix' => 'admin', 'middleware' => ['jwt.auth']], function () {
        Route::group(['prefix' => 'subjects'], function () {
            Route::get('/', 'Admin\SubjectsController@getPaginatedSubjectsAction');
            Route::get('/{subject}', 'Admin\SubjectsController@getSubjectAction');
            Route::post('/', 'Admin\SubjectsController@createSubjectAction');
            Route::put('/{subject}', 'Admin\SubjectsController@updateSubjectAction');
            Route::delete('/{subject}', 'Admin\SubjectsController@deleteSubjectAction');
        });

        Route::group(['prefix' => 'groups'], function () {
            Route::get('/', 'Admin\GroupsController@getGroupsAction');
            Route::post('/', 'Admin\GroupsController@postGroupAction');
            Route::get('/{group}', 'Admin\GroupsController@getGroupAction');
            Route::put('/{group}', 'Admin\GroupsController@putGroupAction');
            Route::put('/{group}', 'Admin\GroupsController@putGroupAction');
            Route::delete('/{group}', 'Admin\GroupsController@deleteGroupAction');

            Route::post('/{group}/students', 'Admin\GroupsController@addStudentsToGroupAction');
            Route::delete('/{group}/students', 'Admin\GroupsController@removeStudentsFromGroupAction');
            Route::delete('/{group}/students/{user}', 'Admin\GroupsController@removeSingleStudentFromGroupAction');
        });

        Route::group(['prefix' => 'faculties'], function () {
            Route::get('/', 'Admin\FacultiesController@getFacultiesAction');
            Route::post('/', 'Admin\FacultiesController@postFacultyAction');
            Route::get('/{faculty}', 'Admin\FacultiesController@getFacultyAction');
            Route::put('/{faculty}', 'Admin\FacultiesController@putFacultyAction');
            Route::delete('/{faculty}', 'Admin\FacultiesController@deleteFacultyAction');
            Route::put('/{faculty}/image', 'Admin\FacultiesController@setFacultyImageAction');
        });

        Route::group(['prefix'  =>  'directions'], function () {
            Route::get('/', 'Admin\DirectionsController@indexAction');
            Route::get('/{direction}', 'Admin\DirectionsController@itemAction');
            Route::post('/', 'Admin\DirectionsController@storeAction');
            Route::put('/{direction}', 'Admin\DirectionsController@putAction');
            Route::delete('/{direction}', 'Admin\DirectionsController@deleteAction');

            Route::get('/{direction}/groups', 'Admin\DirectionsController@getGroupsByDirectionSlugAction');
        });

        Route::group(['prefix'  =>  'teachers'], function () {
            Route::get('/', 'Admin\TeachersController@indexAction');
            Route::get('/{user}', 'Admin\TeachersController@itemAction');
            Route::post('/', 'Admin\TeachersController@createAction');
            Route::put('/{user}', 'Admin\TeachersController@putAction');
            Route::delete('/{user}', 'Admin\TeachersController@deleteAction');
        });

        Route::group(['prefix'  =>  'users'], function () {
            Route::get('/', 'Admin\UsersController@getUsersAction');
            Route::get('/{user}', 'Admin\UsersController@getUserAction');
            Route::post('/', 'Admin\UsersController@storeUserAction');
            Route::put('/{user}', 'Admin\UsersController@updateUserAction');
            Route::delete('/{user}', 'Admin\UsersController@deleteUserAction');
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
