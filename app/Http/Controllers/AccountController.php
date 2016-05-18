<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

/**
 * Class AccountController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Method that authenticate user
     *
     * @api {get} /api/account Get user info
     * @apiSampleRequest /api/account
     * @apiDescription Get user info
     * @apiGroup Users
     *
     * @apiHeader {String} authorization
     *
     * @apiError (401) error Returned if data not correct
     * @apiError (201) success Returned if user successful create
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserInfoAction(Request $request)
    {
        $user = $request->user();

        if ($user->isStudent()) {
            $user = $request
                ->user()
                ->with('group.courses')
                ->where('slug', $user->slug)
                ->first()
            ;
        } elseif ($user->isTeacher()) {
            $user = $request
                ->user()
                ->with('courses.group')
                ->with('courses.subject')
                ->where('slug', $user->slug)
                ->first()
            ;
        }

        return response()->json($user);
    }

    /**
     * Method that authenticate user
     *
     * @api {get} /api/account/logout Logout user
     * @apiSampleRequest /api/account/logout
     * @apiDescription Logout user
     * @apiGroup Users
     *
     * @apiHeader {String} authorization
     *
     * @apiError (401) error Returned if data not correct
     * @apiError (201) success Returned if user successful create
     * @apiError (500) error Returned if error on serve
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoutAction()
    {
        Auth::logout();

        return response()->json('successful', 204);
    }

    /**
     * Get user by slug
     *
     * @api {put} /api/account/update Update user information
     * @apiSampleRequest /api/account/update
     * @apiDescription Update user information
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name
     * @apiParam {String} surname
     * @apiParam {String} birthday
     * @apiParam {String} email
     * @apiParam {String} phone
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInformationAction(Request $request)
    {
        $user = $request->user();
        $data = $request->only('name', 'surname', 'birthday', 'email', 'phone');

        $user->update($data);

        return response()->json($data, 200);
    }

    /**
     * Get user by slug
     *
     * @api {put} /api/account/reset-password Update user password
     * @apiSampleRequest /api/account/update-password
     * @apiDescription Update user password
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} old_password
     * @apiParam {String} password
     * @apiParam {String} password_confirmation
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserPasswordAction(Request $request)
    {
        $user = $request->user();

        if (!Auth::check($request->get('old_password'), $user->password)) {
            return response()->json('Old password not correct', 400);
        }

        if ($request->get('password') != $request->get('password_confirmation')) {
            return response()->json('New passwords not equals');
        }

        $user->update([
            'password' => bcrypt($request->get('password')),
        ]);

        return response()->json($user, 200);
    }

    /**
     * @api {get} /api/account/tasks Get user tasks
     * @apiSampleRequest /api/account/tasks
     * @apiDescription Get user tasks
     * @apiGroup Users
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTasksAction(Request $request)
    {
        $tasks = Task::where('receiver_id', $request->user()->id)->get();

        return response()->json($tasks);
    }

    /**
     * @api {get} /api/account/courses Get student courses
     * @apiSampleRequest /api/account/courses
     * @apiDescription Get student courses
     * @apiGroup Users|Student
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoursesAction(Request $request)
    {
        $user = $request->user();

        if ($user->isStudent()) {
            $courses = $user->group->courses()->active()->load('subject, teacher');

            return response()->json($courses);
        }

        return response()->json(null, 400);
    }

    /**
     * @api {get} /api/account/subjects Get teacher subjects
     * @apiSampleRequest /api/account/subjects
     * @apiDescription Get teacher subjects
     * @apiGroup Users|Teacher
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubjectsAction(Request $request)
    {
        $user = $request->user();

        if ($user->isStudent()) {
            $subjects = $user->subjects()->load('courses.group');

            return response()->json($subjects);
        }

        return response()->json(null, 400);
    }
}
