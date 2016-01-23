<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function indexAction(Request $Request)
    {
        $students = User::where('role', 'student')->paginate($request->query->get('count'));

        return response()->json($students);
    }

    /**
     * Remove the specified resource from storage.
     *
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function itemAction(Request $request, $slug)
    {
        $student = User::findBySlug($slug)->first();

        if (!$student) {
            return response()->json(null, 404);
        }

        return response()->json($student);
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
     * @apiParam {String} name User name
     * @apiParam {String} surname User surname
     * @apiParam {String} birthday User birthday
     * @apiParam {String} phone User phone number
     * @apiParam {String} email User email
     * @apiParam {String} role User role
     * @apiParam {String} description User description
     * @apiParam {String} password User password
     *
     * @apiSuccess (200) success Returned if teacher successful created
     *
     * @apiError (403) error Returned if user has not access for create teacher
     * @apiError (500) error Returned if throw server error
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function storeAction(Request $request)
    {
        try {
            $student = User::create([
                'name'  =>  $request->request->get('name'),
                'surname'  =>  $request->request->get('surname'),
                'birthday'  =>  $request->request->get('birthday'),
                'phone'  =>  $request->request->get('phone'),
                'role'  =>  $request->request->get('role'),
                'email' =>  $request->request->get('email'),
                'description' =>  $request->request->get('description'),
                'password'  =>  $request->request->get('password'),
                'status'  =>  1
            ]);

            return response()->json($student);
        } catch (Exception $e) {
            return response()->json(null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
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
     * @apiSuccess (200) success Returned if teacher successful updated
     *
     * @apiError (403) error Returned if user has not access for update teacher
     * @apiError (500) error Returned if throw server error
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function putAction(Request $request, $slug)
    {
        $student = User::findBySlug($slug);

        if (!$student) {
            return response()->json(null, 404);
        }

        try {
            $student->update([
                'name'  =>  $request->request->get('name'),
                'surname'  =>  $request->request->get('surname'),
                'birthday'  =>  $request->request->get('birthday'),
                'phone'  =>  $request->request->get('phone'),
                'role'  =>  $request->request->get('role'),
                'email' =>  $request->request->get('email'),
                'description' =>  $request->request->get('description'),
                'password'  =>  $request->request->get('password'),
                'status'  =>  1
            ]);

            return response()->json($student);
        } catch (Exception $e) {
            return response()->json(null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /api/admin/users/:slug Delete direction
     * @apiSampleRequest /api/admin/users/:slug
     * @apiDescription Remove user
     * @apiGroup Admin|Users
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (204) success Returned if user successful removed
     *
     * @apiError (403) error Returned if user has not access for get user
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function deleteAction()
    {
        $student = User::findBySlug($slug);

        if (!$student) {
            return response()->json(null, 404);
        }

        try {
            $student->delete();

            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(null, 404);
        }
    }
}
