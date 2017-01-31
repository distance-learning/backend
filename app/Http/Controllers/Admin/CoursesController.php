<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Traits\CoursesTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class CoursesController
 * @package App\Http\Controllers\Admin
 */
class CoursesController extends Controller
{
    /**
     * Get
     *
     * @return \Illuminate\Http\Response
     */
    public function getCoursesAction()
    {
        $courses = Course::with('group', 'subject', 'teacher')->paginate(15);

        return response()->json([
            "courses" => $courses,
        ]);
    }

    /**
     * @api {get} /api/admin/courses/:id Get course by id
     * @apiSampleRequest /api/admin/course/:id
     * @apiDescription Get course by id
     * @apiGroup Admin|Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} id  Course id
     *
     * @apiSuccess (200) success Returned if course isset
     *
     * @apiError (403) error Returned if user has not access for get course
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function getCourseAction(Course $course)
    {
        return response()->json([
            "course" => $course->load('group', 'subject', 'teacher'),
        ]);
    }

    /**
     * @api {post} /api/admin/courses Create new course
     * @apiSampleRequest /api/admin/courses
     * @apiDescription Create new course
     * @apiGroup Admin|Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} subject_id
     * @apiParam {String} teacher_id
     * @apiParam {String} group_id
     * @apiParam {Number} is_active
     *
     * @apiSuccess (200) success Returned if course successful created
     *
     * @apiError (403) error Returned if user has not access for create course
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postCourseAction(Request $request)
    {
        $course = Course::create([
            'subject_id' => $request->get('subject_id'),
            'teacher_id' => $request->get('teacher_id'),
            'group_id' => $request->get('group_id'),
            'is_active' => $request->get('is_active', 1),
        ]);

        return response()->json([
            "course" => $course,
        ]);
    }

    /**
     * @api {put} /api/admin/courses/:id Update course by id
     * @apiSampleRequest /api/admin/courses/:id
     * @apiDescription Update course by id
     * @apiGroup Admin|Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} subject_id
     * @apiParam {String} teacher_id
     * @apiParam {String} group_id
     * @apiParam {Number} is_active
     *
     * @apiSuccess (200) success Returned if course successful updated
     *
     * @apiError (403) error Returned if user has not access for update course
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function putCourseAction(Request $request, Course $course)
    {
        $course->update([
            'subject_id' => $request->get('subject_id'),
            'teacher_id' => $request->get('teacher_id'),
            'group_id' => $request->get('group_id'),
            'is_active' => $request->get('is_active', 1),
        ]);

        return response()->json([
            "course" => $course,
        ]);
    }

    /**
     * @api {delete} /api/admin/courses/:id Delete course by id
     * @apiSampleRequest /api/admin/courses/:id
     * @apiDescription Delete course by id
     * @apiGroup Admin|Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if directions successful deleted
     *
     * @apiError (403) error Returned if user has not access for delete course
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function deleteCourseAction(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }

    /**
     * @api {get} /api/admin/courses/search Search courses
     * @apiSampleRequest /api/admin/courses/search
     * @apiDescription Search courses
     * @apiGroup Admin|Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} search Search param
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchCoursesAction(Request $request)
    {
        $search = $request->get('search');

        //TODO Need move into repository
        $courses = Course::whereHas('subject', function ($query) use ($search) {
                return $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('group', function ($query) use ($search) {
                return $query->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('teacher', function ($query) use ($search) {
                return $query->where('surname', 'LIKE', '%' . $search . '%')->orWhere('name', 'LIKE', '%' . $search . '%');
            })
            ->with('subject', 'group', 'teacher')
            ->get();
        ;

        return response()->json([
            "courses" => $courses,
        ]);
    }
}
