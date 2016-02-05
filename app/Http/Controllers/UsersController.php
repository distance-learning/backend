<?php

namespace App\Http\Controllers;

use App\Events\ResetPasswordEvent;
use App\User;
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
        $users = User::paginate($request->query->get('count'));

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
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserAction(Request $request, $slug)
    {
        $user = User::findBySlug($slug);

        if (!$user) {
            return response()->json(null, 404);
        }

        return response()->json($user);
    }

    /**
     * Get user by slug
     *
     * @api {post} /api/users/reset-password Send request for reset password
     * @apiSampleRequest /api/users/reset-password
     * @apiDescription Send request for reset password
     * @apiGroup Users
     *
     * @apiParam {String} email User email
     * @apiParam {String} password User password
     * @apiParam {String} password_confirmation User password confirmation
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postResetPassword(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            return response()->json(null, 400);
        }

        $password = $request->get('password');

        if ($password != $request->get('password_confirmation')) {
            return response()->json(null, 400);
        }

        $token = md5(uniqid('dl_'));
        $user->update([
            'token' => $token,
            'new_password' => bcrypt($password),
        ]);

        Event::fire(new ResetPasswordEvent($user));

        return response()->json(null, 200);
    }

    /**
     * Get user by slug
     *
     * @api {post} /api/users/reset-password/:token Change password
     * @apiSampleRequest /api/users/reset-password/:token
     * @apiDescription Change password
     * @apiGroup Users
     *
     * @apiParam {String} token User token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postResetPasswordCheck(Request $request, $token)
    {
        $user = User::where('token', $token)->first();

        if (!$user) {
            return response()->json(null, 400);
        }

        $user->update([
            'password' => $user->new_password,
            'new_password' => '',
            'token' => '',
        ]);

        return response()->json();
    }
}
