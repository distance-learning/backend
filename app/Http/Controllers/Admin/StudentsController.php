<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class StudentsController
 * @package App\Http\Controllers\Admin
 */
class StudentsController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/students Get students by page
     * @apiSampleRequest /api/admin/students
     * @apiDescription Get students by page
     * @apiGroup Admin|Students
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} page Page
     *
     * @apiSuccess (200) success Returned if students issets
     *
     * @apiError (403) error Returned if user has not access for get students
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudentsAction(Request $request)
    {
        $students = User::where('role', 'student')
            ->whereNull('group_id')
            ->paginate($request->get('count', 10))
        ;

        return response()->json($students);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/students/search Search students
     * @apiSampleRequest /api/admin/students/search
     * @apiDescription Search students
     * @apiGroup Admin|Students
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} param Search params
     *
     * @apiSuccess (200) success Returned if students issets
     *
     * @apiError (403) error Returned if user has not access for get students
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function findStudentsAction(Request $request)
    {
        $param = $request->get('param');

        $students = User::where('role', 'student')
            ->where(function ($query) use ($param) {
                $query
                    ->where('name', 'LIKE', '%' . $param . '%')
                    ->orWhere('name', 'LIKE', '%' . $param . '%' )
                ;
            })
            ->get()
        ;

        return response()->json($students);
    }
}
