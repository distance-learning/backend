<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class TeachersController extends Controller
{
    /**
     * @api {get} /api/admin/teachers Get teachers by page
     * @apiSampleRequest /api/admin/teachers
     * @apiDescription Get teachers by page
     * @apiGroup Admin|Teachers
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} page  Page
     *
     * @apiSuccess (200) success Returned if teachers isset
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function indexAction(Request $request)
    {
        $teachers = User::where('role', 'teacher')->paginate($request->query->get('count'));

        return response()->json([
            'teachers' => $teachers,
        ]);
    }

    /**
     * @api {get} /api/admin/teachers/:slug Get teacher by slug
     * @apiSampleRequest /api/admin/teachers/:slug
     * @apiDescription Get teacher by slug
     * @apiGroup Admin|Teachers
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Unique teacher slug
     *
     * @apiSuccess (200) success Returned if teacher issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     * @apiError (404) error Returned if teacher not isset
     *
     * @param  Request $request
     * @param  User $teacher
     * @return \Illuminate\Http\Response
     */
    public function itemAction(Request $request, User $teacher)
    {
        return response()->json([
            'teacher' => $teacher,
        ]);
    }

    /**
     * @api {post} /api/admin/teachers Create new teacher
     * @apiSampleRequest /api/admin/teachers
     * @apiDescription Create teacher
     * @apiGroup Admin|Teachers
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name User name
     * @apiParam {String} surname User surname
     * @apiParam {String} birthday User birthday
     * @apiParam {String} phone User phone number
     * @apiParam {String} email User email
     * @apiParam {String} description User description
     * @apiParam {String} password User password
     *
     * @apiSuccess (200) success Returned if teacher successful created
     *
     * @apiError (403) error Returned if user has not access for create teacher
     * @apiError (500) error Returned if throw server error
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAction(Request $request)
    {
        $teacher = User::create([
            'name'  =>  $request->request->get('name'),
            'surname'  =>  $request->request->get('surname'),
            'birthday'  =>  $request->request->get('birthday'),
            'phone'  =>  $request->request->get('phone'),
            'role'  =>  'teacher',
            'email' =>  $request->request->get('email'),
            'description' =>  $request->request->get('description'),
            'password'  =>  $request->request->get('password'),
            'status'  =>  1
        ]);

        return response()->json([
            'teacher' => $teacher,
        ]);
    }

    /**
     * @api {put} /api/admin/teachers/:slug Update teacher
     * @apiSampleRequest /api/admin/teachers/:slug
     * @apiDescription Update teacher
     * @apiGroup Admin|Teachers
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name User name
     * @apiParam {String} surname User surname
     * @apiParam {String} birthday User birthday
     * @apiParam {String} phone User phone number
     * @apiParam {String} email User email
     * @apiParam {String} description User description
     * @apiParam {String} password User password
     *
     * @apiSuccess (200) success Returned if teacher successful updated
     *
     * @apiError (403) error Returned if user has not access for update teacher
     * @apiError (500) error Returned if throw server error
     *
     * @param  Request $request
     * @param  User $teacher
     * @return \Illuminate\Http\Response
     */
    public function putAction(Request $request, User $teacher)
    {
        $teacher->update([
            'name'  =>  $request->request->get('name'),
            'surname'  =>  $request->request->get('surname'),
            'birthday'  =>  $request->request->get('birthday'),
            'phone'  =>  $request->request->get('phone'),
            'role'  =>  'teacher',
            'email' =>  $request->request->get('email'),
            'description' =>  $request->request->get('description'),
            'password'  =>  $request->request->get('password'),
            'status'  =>  1
        ]);

        return response()->json([
            'teacher' => $teacher,
        ]);
    }

    /**
     * @api {delete} /api/admin/teachers/:slug Delete teacher
     * @apiSampleRequest /api/admin/teachers/:slug
     * @apiDescription Remove teacher
     * @apiGroup Admin|Teachers
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (204) success Returned if teacher successful removed
     *
     * @apiError (403) error Returned if user has not access for delete teacher
     *
     * @param  User $teacher
     * @return \Illuminate\Http\Response
     */
    public function deleteAction(User $teacher)
    {
        $teacher->delete();

        return response()->json(null, 204);
    }
}
