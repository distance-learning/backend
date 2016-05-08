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
        $subjects = Subject::with('faculty')->paginate(10);

        return response()->json($subjects);
    }

    /**
     * @api {get} /api/admin/faculties/:slug/subjects Get paginated subjects list
     * @apiSampleRequest /api/admin/faculties/:slug/subjects
     * @apiDescription Get subjects list
     * @apiGroup Admin|Subjects
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if subjects isset
     *
     * @apiError (403) error Returned if user has not access for get subjects
     *
     * @param Faculty $faculty
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubjectsAction(Faculty $faculty)
    {
        $subjects = Subject::where('faculty_id', $faculty->id)->paginate(10);

        return response()->json($subjects);
    }

    /**
     * @api {post} /api/admin/faculties/:slug/subjects Create subject
     * @apiSampleRequest /api/admin/faculties/:slug/subjects
     * @apiDescription Create subject
     * @apiGroup Admin|Subject
     * @apiPermission administrator, university_administrator
     *
     * @apiParam {String} name Subject name
     * @apiParam {String} description Subject description
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if subject successful created
     *
     * @apiError (403) error Returned if user has not access for create subject
     *
     * @param Request $request
     * @param Faculty $faculty
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubjectAction(Request $request, Faculty $faculty)
    {
        $subject = Subject::create([
            'faculty_id' => $faculty->id,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);

        return response()->json($subject);
    }

    /**
     * @api {put} /api/admin/faculties/:slug/subjects/:id Update subject action
     * @apiSampleRequest /api/admin/faculties/:slug/subjects/:id
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
     * @api {delete} /api/admin/faculties/:slug/subjects/:id Delete subject by id
     * @apiSampleRequest /api/admin/faculties/:slug/subjects/:id
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

        return response()->json();
    }
}
