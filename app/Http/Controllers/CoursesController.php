<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

/**
 * Class CoursesController
 * @package App\Http\Controllers
 */
class CoursesController extends Controller
{
    /**
     * Get list of available courses
     *
     * @api {get} /api/courses Get courses by page
     * @apiSampleRequest /api/admin/courses
     * @apiDescription Get courses by page
     * @apiGroup Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} page  Page
     *
     * @apiSuccess (200) success Returned if directions issets
     *
     * @apiError (403) error Returned if user has not access for get directions
     *
     * @return \Illuminate\Http\Response
     */
    public function getCoursesAction()
    {
        $courses = Course::with('group', 'subject', 'teacher')->paginate(15);

        return response()->json([
            'courses' => $courses,
        ]);
    }

    /**
     * @api {get} /api/course/:id Get course by id
     * @apiSampleRequest /api/admin/course/:id
     * @apiDescription Get course by id
     * @apiGroup Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} id  Course id
     *
     * @apiSuccess (200) success Returned if directions issets
     *
     * @apiError (403) error Returned if user has not access for get directions
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function getCourseAction(Course $course)
    {
        return response()->json([
            'course' => $course->load('group', 'subject', 'teacher'),
        ]);
    }

    /**
     * @api {post} /api/courses Create new course
     * @apiSampleRequest /api/admin/courses
     * @apiDescription Create new course
     * @apiGroup Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} subject_id
     * @apiParam {String} teacher_id
     * @apiParam {String} group_id
     * @apiParam {String} slug
     *
     * @apiSuccess (200) success Returned if directions issets
     *
     * @apiError (403) error Returned if user has not access for get directions
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
            'course' => $course,
        ]);
    }

    /**
     * @api {put} /api/courses/:id Update course by id
     * @apiSampleRequest /api/admin/courses/:id
     * @apiDescription Update course by id
     * @apiGroup Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     * @apiParam {Object} user
     * @apiParam {Integer} user.subject_id
     * @apiParam {Integer} user.teacher_id
     * @apiParam {Integer} user.group_id
     * @apiParam {Integer} user.is_active
     * @apiParam {String} slug
     *
     * @apiSuccess (200) success Returned if directions issets
     *
     * @apiError (403) error Returned if user has not access for get directions
     *
     * @param  Request $request
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function putCourseAction(Request $request, Course $course)
    {
        $attributes = $request->only(
            'user.subject_id',
            'user.teacher_id',
            'user.group_id',
            'user.is_active'
        );

        $course->update($attributes);

        return response()->json([
            'course' => $course,
        ]);
    }

    /**
     * @api {delete} /api/courses/:id Delete course by id
     * @apiSampleRequest /api/admin/courses/:id
     * @apiDescription Delete course by id
     * @apiGroup Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if directions issets
     *
     * @apiError (403) error Returned if user has not access for get directions
     *
     * @param  Course $course
     * @return \Illuminate\Http\Response
     */
    public function deleteCourseAction(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }
}
