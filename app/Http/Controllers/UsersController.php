<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UsersController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['authenticateUserAction', 'getUsersAction', 'getUserAction']]);
    }

    /**
     * Method that authenticate user
     *
     * @api {post} /api/users/authenticate Authenticate user
     * @apiSampleRequest /api/users/authenticate
     * @apiDescription Authenticate user
     * @apiGroup Users
     *
     * @apiParam {String} email User email
     * @apiParam {String} password User password
     *
     * @apiSuccess {Object} user User object
     * @apiSuccess {String} user.name User name
     * @apiSuccess {String} user.surname
     * @apiSuccess {String} user.avatar
     * @apiSuccess {String} user.birthday
     * @apiSuccess {String} user.phone
     * @apiSuccess {String} user.slug
     * @apiSuccess {String} user.role
     * @apiSuccess {String} user.email
     * @apiSuccess {String} token User authenticate token
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticateUserAction(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            $user = User::where('email', $credentials['email'])->first();

            if (!$user || !$user->status) {
                return response()->json(null, 401);
            }

            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(null, 400);
            }
        } catch (JWTException $e) {
            return response()->json(null, 500);
        }

        $data = [
            'user' => $user,
            'token' => $token
        ];

        return response()->json($data);
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
}
