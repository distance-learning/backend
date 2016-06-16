<?php

namespace App\Http\Controllers;

use App\Events\ResetPasswordEvent;
use App\Faculty;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Psy\Exception\Exception;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Method that authenticate user
     *
     * @api {post} /api/auth/login Authenticate user
     * @apiSampleRequest /api/auth/login
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
    public function loginAction(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            $user = User::where('email', $credentials['email'])->first();

            if (!$user) {
                return response()->json(null, 401);
            }

            if (!$token = JWTAuth::attempt($credentials)) {
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
     * Method that authenticate user
     *
     * @api {post} /api/auth/registration Registration for new user
     * @apiSampleRequest /api/auth/registration
     * @apiDescription Registration for new user
     * @apiGroup Users
     *
     * @apiParam {String} name User name
     * @apiParam {String} surname User surname
     * @apiParam {String} phone User phone number
     * @apiParam {String} birthday User Date of birth
     * @apiParam {String} email User email
     * @apiParam {String} password User password
     * @apiParam {String} password_confirmation User password
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
     * @apiSuccess {String} user.faculty_id
     * @apiSuccess {String} token User authenticate token
     *
     * @apiError (401) error Returned if data not correct
     * @apiError (201) success Returned if user successful create
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registrationAction(Request $request)
    {
        $validation = Validator::make($request->all(), User::$rules);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        try {
            $user = User::create([
                'name'  => $request->get('name'),
                'surname' => $request->get('surname'),
                'phone' => $request->get('phone'),
                'email' => $request->get('email'),
                'password'  => $request->get('password'),
                'birthday'  => $request->get('birthday'),
                'active'  =>  1,
                'role'   =>   'student',
                'structure_id'  =>  $request->get('faculty_id', null),
                'structure_type' => 'App\\Faculty'
            ]);

            try {
                if (! $token = JWTAuth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
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
        }  catch (QueryException $qe) {
            if ($qe->errorInfo[1] == 1062) {
                return response()->json('Email mush be unique', 422);
            }
        }
    }

    /**
     * @api {get} /api/auth/faculties Get faculties
     * @apiSampleRequest /api/auth/faculties
     * @apiDescription Send request for reset password
     * @apiGroup Users
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacultiesAction()
    {
        $faculties = Faculty::with('directions')->get(['name', 'id', 'slug']);

        return response()->json($faculties);
    }

    /**
     * Get user by slug
     *
     * @api {post} /api/auth/reset-password Send request for reset password
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
            return response()->json('user not found', 404);
        }

        $password = $request->get('password');

        if ($password != $request->get('password_confirmation')) {
            return response()->json('Passwords not equals', 400);
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
     * @api {post} /api/auth/reset-password/:token Change password
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
            return response()->json('User not found', 404);
        }

        $user->update([
            'password' => $user->new_password,
            'new_password' => '',
            'token' => '',
        ]);

        return response()->json(null, 200);
    }
}
