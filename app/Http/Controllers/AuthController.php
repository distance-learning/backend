<?php
namespace App\Http\Controllers;

use App\Events\ResetPasswordEvent;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Psy\Exception\Exception;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', [
            'except' => [
                'getUserInfoAction',
                'logoutAction'
            ]
        ]);

        $this->middleware('jwt.auth', [
            'only' => [
                'getUserInfoAction',
                'logoutAction',
                'updateUserInformationAction',
                'updateUserPasswordAction'
            ]
        ]);

        $this->middleware('jwt.refresh', [
            'only' => [
                'getUserInfoAction',
                'logoutAction',
                'updateUserInformationAction',
                'updateUserPasswordAction'
            ]
        ]);
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
                'name'  => $request->request->get('name'),
                'surname' => $request->request->get('surname'),
                'phone' => $request->request->get('phone'),
                'email' => $request->request->get('email'),
                'password'  => Hash::make($request->request->get('password')),
                'birthday'  => $request->request->get('birthday'),
                'active'  =>  1,
                'role'   =>   'student'
            ]);

            try {
                $user = User::where('email', $user->email)->first();

                if (!$user) {
                    return response()->json(null, 401);
                }

                if (! $token = JWTAuth::attempt(['email' => $request->request->get('email'), 'password' => $request->request->get('password')])) {
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
        } catch (Exception $e) {
            return response()->json(null, 500);
        }

        return response()->json(null, 500);
    }

    /**
     * Method that authenticate user
     *
     * @api {get} /api/auth/user Get user info
     * @apiSampleRequest /api/auth/user
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

        return response()->json($user);
    }

    /**
     * Method that authenticate user
     *
     * @api {get} /api/auth/logout Logout user
     * @apiSampleRequest /api/auth/logout
     * @apiDescription Logout user
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
    public function logoutAction()
    {
        Auth::logout();

        return response()->json(null, 204);
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

    /**
     * Get user by slug
     *
     * @api {put} /api/user/update Update user information
     * @apiSampleRequest /api/user/update
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
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUserInformationAction(UpdateUserRequest $request)
    {
        $user = $request->user();
        $data = $request->only('name', 'surname', 'birthday', 'email', 'phone');

        $user->update($data);

        return response()->json($data, 200);
    }

    /**
     * Get user by slug
     *
     * @api {put} /api/user/reset-password Update user password
     * @apiSampleRequest /api/auth/update-password
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
}
