<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

/**
 * Class UsersController
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * @api {get} /api/admin/users Get users by page
     * @apiSampleRequest /api/admin/users
     * @apiDescription Get users by page
     * @apiGroup Admin|Users
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} page  Page
     *
     * @apiSuccess (200) success Returned if users issets
     *
     * @apiError (403) error Returned if user has not access for get users
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function getUsersAction(Request $request)
    {
        $students = User::with('avatar')->orderBy('id')->paginate($request->get('count', 10));

        return response()->json([
            'students' => $students,
        ]);
    }

    /**
     * @api {get} /api/admin/users/:slug Get user by slug
     * @apiSampleRequest /api/admin/users/:slug
     * @apiDescription Get user by slug
     * @apiGroup Admin|Users
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Unique user slug
     *
     * @apiSuccess (200) success Returned if user issets
     *
     * @apiError (403) error Returned if user has not access for get users
     * @apiError (404) error Returned if user not isset
     *
     * @param  Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function getUserAction(Request $request, User $user)
    {
        if ($user->isStudent()) {
            $user->load('group');
        }

        return response()->json([
            'user' => $user->load('avatar'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {post} /api/admin/users Create new user
     * @apiSampleRequest /api/admin/users
     * @apiDescription Create teacher
     * @apiGroup Admin|Users
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} user.name User name
     * @apiParam {String} user.surname User surname
     * @apiParam {String} user.birthday User birthday
     * @apiParam {String} user.phone User phone number
     * @apiParam {String} user.email User email
     * @apiParam {String} user.role User role
     * @apiParam {String} user.description User description
     *
     * @apiSuccess (200) success Returned if user successful created
     *
     * @apiError (403) error Returned if user has not access for create another user
     * @apiError (500) error Returned if throw server error
     *
     * @param  CreateUserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function storeUserAction(CreateUserRequest $request)
    {
        $parameters = $request->only(
            'user.name',
            'user.surname',
            'user.phone',
            'user.email',
            'user.password',
            'user.group_id'
        );

        try {
            $student = User::create($parameters['user']);
        } catch (QueryException $qe) {
            return response()->json($qe->getMessage(), 422);
        }

        return response()->json($student, 201);
    }

    /**
     * @api {put} /api/admin/users/:slug Update user
     * @apiSampleRequest /api/admin/users/:slug
     * @apiDescription Update teacher
     * @apiGroup Admin|Users
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name User name
     * @apiParam {String} surname User surname
     * @apiParam {String} birthday User birthday
     * @apiParam {String} phone User phone number
     * @apiParam {String} email User email
     * @apiParam {String} role User role
     * @apiParam {String} description User description
     * @apiParam {String} password User password
     *
     * @apiSuccess (200) success Returned if user successful updated
     *
     * @apiError (403) error Returned if user has not access for update another user
     * @apiError (500) error Returned if throw server error
     *
     * @param  UpdateUserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function updateUserAction(UpdateUserRequest $request, User $user)
    {
        //TODO need refactoring

        $parameters = [];

        try {
            if ($request->has('password') && !empty($request->get('password'))) {
                $user->update([
                    'name'  =>  $request->get('name'),
                    'surname'  =>  $request->get('surname'),
                    'birthday'  =>  $request->get('birthday'),
                    'phone'  =>  $request->get('phone'),
                    'role'  =>  $request->get('role'),
                    'email' =>  $request->get('email'),
                    'description' =>  $request->get('description'),
                    'password'  =>  trim($request->get('password')),
                    'group_id' => $request->get('group_id'),
                    'status'  =>  1
                ]);
            } else {
                $user->update([
                    'name'  =>  $request->get('name'),
                    'surname'  =>  $request->get('surname'),
                    'birthday'  =>  $request->get('birthday'),
                    'phone'  =>  $request->get('phone'),
                    'role'  =>  $request->get('role'),
                    'email' =>  $request->get('email'),
                    'description' =>  $request->get('description'),
                    'group_id' => $request->get('group_id'),
                    'status'  =>  1
                ]);
            }
        } catch (QueryException $qe) {
            if ($qe->errorInfo[1] == 1062) {
                return response()->json('Email mush be unique', 422);
            }
        }

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /api/admin/users/:slug Delete user
     * @apiSampleRequest /api/admin/users/:slug
     * @apiDescription Remove user
     * @apiGroup Admin|Users
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (204) success Returned if user successful removed
     *
     * @apiError (403) error Returned if user has not access for delete user
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function deleteUserAction(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }

    /**
     * @api {get} /api/admin/users/search Search users by params
     * @apiSampleRequest /api/admin/users/search
     * @apiDescription Search users
     * @apiGroup Admin|Users
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} search Search params
     *
     * @apiSuccess (204) success Returned if user successful searched
     *
     * @apiError (403) error Returned if user has not access for delete user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchUsersAction(Request $request)
    {
        $users = User::where('surname', 'LIKE', '%' . $request->get('search') . '%')->orWhere('email', 'LIKE', '%' . $request->get('search') . '%')->get();

        return response()->json($users);
    }
}
