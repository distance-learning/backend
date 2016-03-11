<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/courses Get courses by page
     * @apiSampleRequest /api/admin/courses
     * @apiDescription Get courses by page
     * @apiGroup Admin|Courses
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
        $courses = Course::paginate(15);

        return response()->json($courses);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/course/:id Get course by id
     * @apiSampleRequest /api/admin/course/:id
     * @apiDescription Get course by id
     * @apiGroup Admin|Courses
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
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function getCourseAction(Course $course)
    {
        return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     *
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
            'slug'      => $request->get('slug'),
        ]);

        return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     *
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
     * @apiParam {String} slug
     *
     * @apiSuccess (200) success Returned if directions issets
     *
     * @apiError (403) error Returned if user has not access for get directions
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
            'slug'      => $request->get('slug'),
        ]);

        return response()->json($course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /api/admin/courses/:id Delete course by id
     * @apiSampleRequest /api/admin/courses/:id
     * @apiDescription Delete course by id
     * @apiGroup Admin|Courses
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if directions issets
     *
     * @apiError (403) error Returned if user has not access for get directions
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function deleteCourseAction(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }
}
