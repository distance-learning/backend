<?php

namespace App\Http\Controllers\Admin;

use App\Traits\CoursesTrait;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class CoursesController
 * @package App\Http\Controllers\Admin
 */
class CoursesController extends Controller
{
    use CoursesTrait;

    /**
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
     * @apiSuccess (200) success Returned if courses issets
     *
     * @apiError (403) error Returned if user has not access for get courses
     *
     * @return \Illuminate\Http\Response
     */

    /**
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
     * @apiSuccess (200) success Returned if course isset
     *
     * @apiError (403) error Returned if user has not access for get course
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

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
     * @apiParam {String} slug
     *
     * @apiSuccess (200) success Returned if course successful created
     *
     * @apiError (403) error Returned if user has not access for create course
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

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
     * @apiParam {String} slug
     *
     * @apiSuccess (200) success Returned if course successful updated
     *
     * @apiError (403) error Returned if user has not access for update course
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

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
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
}
