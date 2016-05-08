<?php

namespace App\Traits;

use App\Course;
use Illuminate\Http\Request;

/**
 * Class CoursesTrait
 * @package App\Traits
 */
trait CoursesTrait
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCoursesAction()
    {
        $courses = Course::paginate(15);

        return response()->json($courses);
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCourseAction(Course $course)
    {
        return response()->json($course);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCourseAction(Request $request)
    {
        $course = Course::create([
            'subject_id' => $request->get('subject_id'),
            'teacher_id' => $request->get('teacher_id'),
            'group_id' => $request->get('group_id'),
        ]);

        return response()->json($course);
    }

    /**
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function putCourseAction(Request $request, Course $course)
    {
        $course->update([
            'subject_id' => $request->get('subject_id'),
            'teacher_id' => $request->get('teacher_id'),
            'group_id' => $request->get('group_id'),
        ]);

        return response()->json($course);
    }

    /**
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteCourseAction(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }
}