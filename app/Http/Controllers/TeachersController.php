<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    /**
     * @api {get} /api/teachers/random Get random teachers
     * @apiSampleRequest /api/teachers/random
     * @apiDescription Get random teachers
     * @apiGroup Teachers
     *
     * @apiSuccess (200) success Returned if teachers array
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRandomTeachersAction(Request $request)
    {
        $teachers = User::where('role', 'teacher')
            ->with('subjects')
            ->active()
            ->get()
        ;

        //TODO Need refactoring
//        $teachers = $teachers->random(6);

        $teachers = $teachers->shuffle()->splice(0, 6);

        return response()
            ->json($teachers)
        ;
    }

    /**
     * @api {get} /api/teachers Get teachers
     * @apiSampleRequest /api/teachers
     * @apiDescription Get teachers
     * @apiGroup Teachers
     *
     * @apiSuccess (200) success Returned if teachers array
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTeachersAction(Request $request)
    {
        $teachers = User::where('role', 'teacher')
            ->with('subjects')
            ->active()
            ->get()
        ;

        return response()->json($teachers);
    }

    /**
     * @api {get} /api/teachers/:slug Get teacher by unique identificator
     * @apiSampleRequest /api/teachers/:slug
     * @apiDescription Get teacher by unique identificator
     * @apiGroup Teachers
     *
     * @apiParam {String} slug Teacher unique identificator
     *
     * @apiSuccess (200) success Returned if teachers array
     *
     * @param Request $request
     * @param User $teacher
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTeacherBySlugAction(Request $request, User $user)
    {
        if (!$user->isActive()) {
            return response()->json(null, 404);
        }

        return response()->json($user);
    }
}
