<?php

namespace App\Http\Controllers;

use App\Events\ResetPasswordEvent;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsersController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['getUsersAction', 'getUserAction']]);
    }

    /**
     * @api {get} /api/users/ Get n users
     * @apiSampleRequest /api/users?count=:count&page=:page
     * @apiDescription Get n users
     * @apiGroup Users
     *
     * @apiParam {Number} count Count users on page
     * @apiParam {Number} page Users page
     *
     * @apiSuccess {Number} total Total users
     * @apiSuccess {Number} per_page Count users per page
     * @apiSuccess {Number} current_page Number of current page
     * @apiSuccess {Number} last_page Number of last page
     * @apiSuccess {String} next_page_url Next page url
     * @apiSuccess {String} prev_page_url Prev page url
     * @apiSuccess {Number} from Start user id
     * @apiSuccess {Number} to End user id
     * @apiSuccess {Object} data User object
     * @apiSuccess {Number} data.id User id
     * @apiSuccess {String} data.name User name
     * @apiSuccess {String} data.surname User surname
     * @apiSuccess {String} data.avatar User avatar
     * @apiSuccess {String} data.birthday User birthday
     * @apiSuccess {String} data.phone User phone number
     * @apiSuccess {String} data.slug
     * @apiSuccess {String} data.role
     * @apiSuccess {String} data.email,
     * @apiSuccess {Number} data.status
     * @apiSuccess {String} data.deleted_at
     * @apiSuccess {String} data.created_at
     * @apiSuccess {String} data.updated_at
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersAction(Request $request)
    {
        $users = User::orderBy('id')->paginate($request->query->get('count'));

        return response()->json($users);
    }

    /**
     * Get user by slug
     *
     * @api {get} /api/users/:slug Get user by slug
     * @apiSampleRequest /api/users/:slug
     * @apiDescription Get user by slug
     * @apiGroup Users
     *
     * @apiParam {String} slug Unique user slug
     *
     * @apiSuccess {Object} data User object
     * @apiSuccess {Number} data.id User id
     * @apiSuccess {String} data.name User name
     * @apiSuccess {String} data.surname User surname
     * @apiSuccess {String} data.avatar User avatar
     * @apiSuccess {String} data.birthday User birthday
     * @apiSuccess {String} data.phone User phone number
     * @apiSuccess {String} data.slug
     * @apiSuccess {String} data.role
     * @apiSuccess {String} data.email,
     * @apiSuccess {Number} data.status
     * @apiSuccess {String} data.deleted_at
     * @apiSuccess {String} data.created_at
     * @apiSuccess {String} data.updated_at
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserAction(Request $request, User $user)
    {
        return response()->json($user);
    }

    /**
     * @api {get} /api/users/:slug/tasks Get user tasks by user slug
     * @apiSampleRequest /api/users/:slug/tasks
     * @apiDescription Get user tasks by user slug
     * @apiGroup Users
     *
     * @apiHeader {String} Authorization User token
     *
     * @apiParam {String} slug Unique user slug
     * @apiParam {Date} from_date Data start
     * @apiParam {Date} to_date Data start
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserTasksAction(Request $request, User $user)
    {
        $tasks = $user->tasks()->where('deadline', '>=', $request->get('from_date'))->where('deadline', '<=', $request->get('to_date'))->get()->load('attachment');

        return response()->json($tasks);
    }
}
