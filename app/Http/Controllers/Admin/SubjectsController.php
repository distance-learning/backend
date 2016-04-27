<?php

namespace App\Http\Controllers\Admin;

use App\Direction;
use App\Http\Controllers\Controller;
use App\Subject;
use Illuminate\Http\Request;

/**
 * Class SubjectsController
 * @package App\Http\Controllers\Admin
 */
class SubjectsController extends Controller
{
    /**
     * @api {get} /api/admin/directions/:slug/subjects Get subjects list
     * @apiSampleRequest /api/admin/directions/:slug/subjects
     * @apiDescription Get subjects list
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param Direction $direction
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubjectsAction(Direction $direction)
    {
        $subjects = Subject::where('direction_id', $direction->id)->paginate(10);

        return response()->json($subjects);
    }

    /**
     * @api {post} /api/admin/directions/:slug/subjects Create subject
     * @apiSampleRequest /api/admin/directions/:slug/subjects
     * @apiDescription Create subject
     * @apiGroup Admin|Subject
     * @apiPermission administrator, university_administrator
     *
     * @apiParam {String} name Subject name
     * @apiParam {String} description Subject description
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param Request $request
     * @param Direction $direction
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubjectAction(Request $request, Direction $direction)
    {
        $subject = Subject::create([
            'direction_id' => $direction->id,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return response()->json($subject);
    }

    /**
     * @api {put} /api/admin/directions/:slug/subjects/{id} Update subject action
     * @apiSampleRequest /api/admin/directions/:slug/subjects/{id}
     * @apiDescription Update subject action
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name Subject name
     * @apiParam {String} description Subject description
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param Request $request
     * @param Direction $direction
     * @param Subject $subject
     */
    public function updateSubjectAction(Request $request, Direction $direction, Subject $subject)
    {
        $subject->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
    }

    /**
     * @api {get} /api/admin/directions/:slug/subjects/{id} Get subject by id
     * @apiSampleRequest /api/admin/directions/:slug/subjects/{id}
     * @apiDescription Get subject by id
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubjectAction(Subject $subject)
    {
        return response()->json($subject);
    }

    /**
     * @api {delete} /api/admin/directions/:slug/subjects/{id} Delete subject by id
     * @apiSampleRequest /api/admin/directions/:slug/subjects/{id}
     * @apiDescription Delete subject by id
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteSubjectAction(Subject $subject)
    {
        $subject->delete();

        return response()->json();
    }
}
