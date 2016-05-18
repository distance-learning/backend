<?php

namespace App\Http\Controllers\Admin;

use App\Faculty;
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
     * @api {get} /api/admin/subjects Get paginated subjects
     * @apiSampleRequest /api/admin/subjects
     * @apiDescription Get paginated subjects
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if subjects isset
     *
     * @apiError (403) error Returned if user has not access for get subjects
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPaginatedSubjectsAction(Request $request)
    {
        $subjects = Subject::with('faculty')->paginate($request->get('count', 10));

        return response()->json($subjects);
    }

    /**
     * @api {post} /api/admin/subjects Create subject
     * @apiSampleRequest /api/admin/subjects
     * @apiDescription Create subject
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiParam {String} name Subject name
     * @apiParam {String} description Subject description
     * @apiParam {Number} faculty_id Faculty identificator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if subject successful created
     *
     * @apiError (403) error Returned if user has not access for create subject
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubjectAction(Request $request)
    {
        $subject = Subject::create([
            'faculty_id' => $request->get('faculty_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return response()->json($subject, 201);
    }

    /**
     * @api {put} /api/admin/subjects/:id Update subject action
     * @apiSampleRequest /api/admin/subjects/:id
     * @apiDescription Update subject action
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name Subject name
     * @apiParam {String} description Subject description
     *
     * @apiSuccess (200) success Returned if subject successful update
     *
     * @apiError (403) error Returned if user has not access for update subjects
     *
     * @param Request $request
     * @param Faculty $faculty
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSubjectAction(Request $request, Faculty $faculty, Subject $subject)
    {
        $subject->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'faculty_id' => $request->get('faculty_id'),
        ]);

        return response()->json($subject);
    }

    /**
     * @api {get} /api/admin/subjects/:id Get subject by id
     * @apiSampleRequest /api/admin/subjects/:id
     * @apiDescription Get subject by id
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if subject isset
     *
     * @apiError (403) error Returned if user has not access for get subject
     *
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubjectAction(Subject $subject)
    {
        return response()->json($subject);
    }

    /**
     * @api {delete} /api/admin/subjects/:id Delete subject by id
     * @apiSampleRequest /api/admin/subjects/:id
     * @apiDescription Delete subject by id
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if subject successful delete
     *
     * @apiError (403) error Returned if user has not access for delete subject
     *
     * @param Subject $subject
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteSubjectAction(Faculty $faculty, Subject $subject)
    {
        $subject->delete();

        return response()->json(null, 204);
    }
}
