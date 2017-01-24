<?php

namespace App\Http\Controllers;

use App\Traits\CoursesTrait;
use Illuminate\Http\Request;

/**
 * Class CoursesController
 * @package App\Http\Controllers
 */
class CoursesController extends Controller
{
    use CoursesTrait;

    /**
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
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

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

    /**
     * @api {put} /api/courses/:id Update course by id
     * @apiSampleRequest /api/admin/courses/:id
     * @apiDescription Update course by id
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
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
}
