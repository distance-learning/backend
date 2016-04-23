<?php

namespace App\Http\Controllers;

use App\Course;
use App\Subject;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class SubjectsController
 * @package App\Http\Controllers
 */
class SubjectsController extends Controller
{
    /**
     * @api {get} /api/subjects/{subject_id}/courses Get courses by subject_id and teacher_id
     * @apiSampleRequest /api/subjects/{subject_id}/courses
     * @apiDescription Get courses by subject_id and teacher_id
     * @apiGroup Subjects
     *
     * @apiSuccess (200) success Returned courses
     *
     * @param Request $request
     * @param $subject_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoursesBySubjectAndTeacherAction(Request $request, $subject_id)
    {
        $teacher_id = $request->user()->id;

        $courses = Course::findBySubjectAndTeacher($teacher_id, $subject_id)->get();

        return response()->json($courses);
    }
}
