<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['loginAction', 'registrationAction']]);
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

        $user = User::create([
            'name'  => $request->request->get('name'),
            'surname' => $request->request->get('surname'),
            'phone' => $request->request->get('phone'),
            'email' => $request->request->get('email'),
            'password'  => Hash::make($request->request->get('password')),
            'birthday'  => $request->request->get('birthday'),
            'active'  =>  0,
            'role'   =>   'student'
        ]);

        if ($user) {
              return response()->json($user, 201);
        }

        return response()->json(null, 500);
    }
}
