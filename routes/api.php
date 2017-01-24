<?php

use Illuminate\Routing\Router;

/** @var Router $api */
$api->group(['prefix' => 'api', 'middleware' => 'cors'], function (Router $api) {

    $api->group(['prefix' => 'faculties'], function (Router $api) {
        $api->get('/', 'FacultiesController@getPaginatedFacultiesAction');
        $api->get('/random', 'FacultiesController@getRandomFacultiesAction');
        $api->get('/{faculty}', 'FacultiesController@getFacultyBySlugAction');
    });

    $api->group(['prefix' => 'teachers'], function (Router $api) {
        $api->get('/random', 'TeachersController@getRandomTeachersAction');
        $api->get('/', 'TeachersController@getTeachersAction');
        $api->get('/{user}', 'TeachersController@getTeacherBySlugAction');
    });

    $api->group(['prefix' => 'account'], function (Router $api) {
        $api->get('/', 'AccountController@getUserInfoAction');
        $api->get('/logout', 'AccountController@logoutAction');
        $api->put('/update', 'AccountController@updateUserInformationAction');
        $api->put('/reset-password', 'AccountController@updateUserPasswordAction');
        $api->post('/image', 'AccountController@setAvatarAction');
    });

    $api->group(['prefix' => 'auth'], function (Router $api) {
        $api->post('/login', 'AuthController@loginAction');
        $api->post('/registration', 'AuthController@registrationAction');
        $api->post('/reset-password', 'AuthController@postResetPassword');
        $api->post('/reset-password/{token}', 'AuthController@postResetPasswordCheck');
        $api->get('/faculties', 'AuthController@getFacultiesAction');
    });

    $api->group(['prefix' => 'modules', 'middleware' => ['jwt.auth']], function (Router $api) {
        $api->post('/', 'ModulesController@createModuleAction');
        $api->post('/groups', 'ModulesController@createModuleGroupAction');
        $api->put('/groups/{moduleGroup}', 'ModulesController@updateModuleGroupAction');
        $api->put('/{module}', 'ModulesController@updateModuleAction');
        $api->delete('/{module}', 'ModulesController@deleteModuleAction');
    });

    $api->group(['middleware' => ['jwt.auth']], function (Router $api) {
        $api->group(['prefix' => 'account'], function (Router $api) {
            $api->get('/tasks', 'AccountController@getTasksAction');
            $api->get('/courses', 'AccountController@getCoursesAction');
            $api->get('/subjects', 'AccountController@getSubjectsAction');
            $api->get('/modules', 'AccountController@getModulesAction');
            $api->get('/tests', 'AccountController@getTeacherTestsAction');
            $api->get('/subjects/{subject}/tasks', 'AccountController@getSubjectTasksAction');
        });

        $api->group(['prefix' => 'events'], function (Router $api) {
            $api->get('/', 'EventsController@getEventsByInterval');
            $api->get('/notifications', 'EventsController@getNotificationsAction');
        });

        $api->group(['prefix' => 'files'], function (Router $api) {
            $api->post('/', 'FilesController@uploadFileAction');
            $api->get('/', 'FilesController@getFilesAction');
            $api->get('/documents', 'FilesController@getDocumentsAction');
            $api->get('/images', 'FilesController@getImagesAction');
            $api->get('/{file}', 'FilesController@getFileAction');
            $api->delete('/{file}', 'FilesController@deleteFileAction');
        });

        $api->group(['prefix' => 'tasks'], function (Router $api) {
            $api->post('/', 'TasksController@createTaskAction');
            $api->post('/groups', 'TasksController@createTaskForGroupAction');
            $api->get('/{task}', 'TasksController@getTaskAction');
            $api->put('/{task}', 'TasksController@updateTaskAction');
            $api->get('/{task}/files', 'TasksController@getFilesByTaskAction');
            $api->put('/{task}/files/{file}', 'TasksController@sendAnswerToTaskAction');
            $api->delete('/{task}', 'TasksController@deleteTaskAction');
        });

        $api->group(['prefix' => 'users'], function (Router $api) {
            $api->get('/', 'UsersController@getUsersAction');
            $api->get('/{user}', 'UsersController@getUserAction');
            $api->get('/{user}/tasks', 'UsersController@getUserTasksAction');
        });

        $api->group(['prefix' => 'courses'], function (Router $api) {
            $api->get('/', 'Admin\CoursesController@getCoursesAction');
            $api->get('/{course}', 'Admin\CoursesController@getCourseAction');
            $api->post('/', 'Admin\CoursesController@postCourseAction');
            $api->put('/{course}', 'Admin\CoursesController@putCourseAction');
            $api->delete('/{course}', 'Admin\CoursesController@deleteCourseAction');
        });

        $api->group(['prefix' => 'tests'], function (Router $api) {
            $api->post('/', 'TestsController@postTestAction');
            $api->get('/', 'TestsController@getTestsAction');
            $api->get('/scores', 'TestsController@getScoresAction');
            $api->get('/search', 'TestsController@searchTestAction');
            $api->put('/{test}', 'TestsController@updateTestAction');
            $api->get('/{test}', 'TestsController@getTestAction');
            $api->delete('/{test}', 'TestsController@deleteTestAction');
            $api->get('/{test}/export', 'TestsController@getTestAnswersAction');
            $api->get('/{test}/passing', 'TestsController@getTestsForPassingAction');
            $api->post('/{test}/check', 'TestsController@checkCompletedTestsAction');

            $api->get('/{test}/scores', 'ScoresController@getScoresAction');

            $api->group(['prefix' => '/{test}/questions'], function (Router $api) {
                $api->post('/', 'QuestionsController@createQuestionAction');
                $api->get('/{question}', 'QuestionsController@getQuestionByCodeAction');
                $api->put('/{question}', 'QuestionsController@updateQuestionAction');
                $api->post('/{question}/upload', 'QuestionsController@updateImageToQuestionByCodeAction');
            });
        });

        $api->group(['prefix' => 'subjects'], function (Router $api) {
            $api->get('/{subject_id}/courses', 'SubjectsController@getCoursesBySubjectAndTeacherAction');
        });
    });

    $api->group(['prefix' => 'admin', 'middleware' => ['jwt.auth']], function (Router $api) {
        $api->group(['prefix' => 'subjects'], function (Router $api) {
            $api->get('/', 'Admin\SubjectsController@getPaginatedSubjectsAction');
            $api->get('/search', 'Admin\SubjectsController@searchSubjectAction');
            $api->get('/{subject}', 'Admin\SubjectsController@getSubjectAction');
            $api->post('/', 'Admin\SubjectsController@createSubjectAction');
            $api->put('/{subject}', 'Admin\SubjectsController@updateSubjectAction');
            $api->delete('/{subject}', 'Admin\SubjectsController@deleteSubjectAction');
        });

        $api->group(['prefix' => 'groups'], function (Router $api) {
            $api->get('/', 'Admin\GroupsController@getGroupsAction');
            $api->post('/', 'Admin\GroupsController@postGroupAction');
            $api->get('/{group}', 'Admin\GroupsController@getGroupAction');
            $api->put('/{group}', 'Admin\GroupsController@putGroupAction');
            $api->put('/{group}', 'Admin\GroupsController@putGroupAction');
            $api->delete('/{group}', 'Admin\GroupsController@deleteGroupAction');

            $api->post('/{group}/students', 'Admin\GroupsController@addStudentsToGroupAction');
            $api->delete('/{group}/students', 'Admin\GroupsController@removeStudentsFromGroupAction');
            $api->delete('/{group}/students/{user}', 'Admin\GroupsController@removeSingleStudentFromGroupAction');
        });

        $api->group(['prefix' => 'faculties'], function (Router $api) {
            $api->get('/', 'Admin\FacultiesController@getFacultiesAction');
            $api->post('/', 'Admin\FacultiesController@postFacultyAction');
            $api->get('/search', 'Admin\FacultiesController@searchFacultiesAction');
            $api->get('/{faculty}', 'Admin\FacultiesController@getFacultyAction');
            $api->put('/{faculty}', 'Admin\FacultiesController@putFacultyAction');
            $api->delete('/{faculty}', 'Admin\FacultiesController@deleteFacultyAction');
            $api->post('/{faculty}/image', 'Admin\FacultiesController@setFacultyImageAction');
        });

        $api->group(['prefix'  =>  'directions'], function (Router $api) {
            $api->get('/', 'Admin\DirectionsController@indexAction');
            $api->get('/{direction}', 'Admin\DirectionsController@itemAction');
            $api->post('/', 'Admin\DirectionsController@storeAction');
            $api->put('/{direction}', 'Admin\DirectionsController@putAction');
            $api->delete('/{direction}', 'Admin\DirectionsController@deleteAction');

            $api->get('/{direction}/groups', 'Admin\DirectionsController@getGroupsByDirectionSlugAction');
        });

        $api->group(['prefix'  =>  'teachers'], function (Router $api) {
            $api->get('/', 'Admin\TeachersController@indexAction');
            $api->get('/{user}', 'Admin\TeachersController@itemAction');
            $api->post('/', 'Admin\TeachersController@createAction');
            $api->put('/{user}', 'Admin\TeachersController@putAction');
            $api->delete('/{user}', 'Admin\TeachersController@deleteAction');
        });

        $api->group(['prefix'  =>  'users'], function (Router $api) {
            $api->get('/', 'Admin\UsersController@getUsersAction');
            $api->get('/search', 'Admin\UsersController@searchUsersAction');
            $api->get('/{user}', 'Admin\UsersController@getUserAction');
            $api->post('/', 'Admin\UsersController@storeUserAction');
            $api->put('/{user}', 'Admin\UsersController@updateUserAction');
            $api->delete('/{user}', 'Admin\UsersController@deleteUserAction');
        });

        $api->group(['prefix' => 'students'], function (Router $api) {
            $api->get('/', 'Admin\StudentsController@getStudentsAction');
            $api->get('/search', 'Admin\StudentsController@findStudentsAction');
        });

        $api->group(['prefix' => 'courses'], function (Router $api) {
            $api->get('/', 'Admin\CoursesController@getCoursesAction');
            $api->get('/search', 'Admin\CoursesController@searchCoursesAction');
            $api->get('/{course}', 'Admin\CoursesController@getCourseAction');
            $api->post('/', 'Admin\CoursesController@postCourseAction');
            $api->put('/{course}', 'Admin\CoursesController@putCourseAction');
            $api->delete('/{course}', 'Admin\CoursesController@deleteCourseAction');
        });
    });
});

$api->get('/doc', 'HomeController@getDocAction');
$api->get('/', 'HomeController@indexAction');
