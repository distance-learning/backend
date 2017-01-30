<?php

namespace App\Http\Controllers;

use App\Events\ResetPasswordEvent;
use App\Exceptions\UserInvalidCredentials;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

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
     * @return JsonResponse
     */
    public function loginAction(Request $request)
    {
        $credentials = $request->only(
            'user.email',
            'user.password'
        );
        $credentials = process_array_keys($credentials);

        try {
            $this->validate($request, User::$rulesAuthorization);

            $user = User::where('email', $credentials['email'])->firstOrFail();

            if (!$token = JWTAuth::attempt($credentials)) {
                throw new UserInvalidCredentials();
            }
        } catch (ValidationException $e) {
            return $e->getResponse();
        } catch (UserInvalidCredentials $e) {
            return response()->json(null, 400);
        } catch (ModelNotFoundException $e) {
            return response()->json(null, 401);
        } catch (JWTException $e) {
            return response()->json(null, 500);
        }

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
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
        try {
            $this->validate($request, User::$rulesRegistration);
            $attributesForRegistration = $request->only(
                'user.name',
                'user.surname',
                'user.phone',
                'user.email',
                'user.password',
                'user.birthday'
            );
            $attributesForRegistration = process_array_keys($attributesForRegistration);

            $attributesForAuthorization = $request->only(
                'user.email',
                'user.password'
            );
            $attributesForAuthorization = process_array_keys($attributesForAuthorization);

            /** @var User $user */
            $user = User::create($attributesForRegistration);
            $user->faculty()->associate($request->get('user.faculty_id'));
            $user->saveOrFail();

            if (!$token = JWTAuth::attempt($attributesForAuthorization)) {
                throw new UserInvalidCredentials();
            }
        } catch (UserInvalidCredentials $e) {
            return response()->json(null, 400);
        } catch (JWTException $e) {
            return response()->json(null, 500);
        } catch (ValidationException $e) {
            return $e->getResponse();
        }

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
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

        return response()->json([
            'faculties' => $faculties,
        ]);
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
        try {
            $this->validate($request, User::$rulesResetPassword);

            $user = User::where('email', $request->get('email'))->firstOrFail();
            $password = $request->get('password');
            $token = md5(uniqid('dl_'));

            $user->update([
                'token' => $token,
                'new_password' => bcrypt($password),
            ]);

            Event::fire(new ResetPasswordEvent($user));
        } catch (ValidationException $e) {
            return $e->getResponse();
        } catch (ModelNotFoundException $e) {
            return response()->json(null, 404);
        }

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
        try {
            $user = User::where('token', $token)->firstOrFail();

            $user->update([
                'password' => $user->new_password,
                'new_password' => null,
                'token' => null,
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(null, 404);
        }

        return response()->json(null, 200);
    }
}
