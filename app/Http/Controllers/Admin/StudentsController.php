<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function getStudentsAction()
    {
        $students = User::where('role', 'student')->paginate(20);

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
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Group $group
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
