<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;

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
    public function getRandomTeachersAction()
    {
        $teachers = User::with('subjects')
            ->where('role', 'teacher')
            ->get()
        ;

        //TODO Need refactoring
        $teachers = $teachers->random(6);

        return response()->json($teachers);
    }
}
