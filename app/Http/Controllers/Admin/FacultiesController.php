<?php

namespace App\Http\Controllers\Admin;

use App\Faculty;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class FacultiesController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => ['postFacultyAction', 'putFacultyAction', 'deleteFacultyAction']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @api {get} /api/admin/faculties Get faculties
     * @apiSampleRequest /api/admin/faculties?count=:count&page=:page
     * @apiDescription Get some faculties
     * @apiGroup Faculties
     *
     * @apiParam {Number} count Count faculties by page
     * @apiParam {Number} page Faculty page
     *
     * @apiSuccess {Number} total Total faculties
     * @apiSuccess {Number} per_page Count faculties per page
     * @apiSuccess {Number} current_page Number of current page
     * @apiSuccess {Number} last_page Number of last page
     * @apiSuccess {String} next_page_url Next page url
     * @apiSuccess {String} prev_page_url Prev page url
     * @apiSuccess {Number} from Start faculty id
     * @apiSuccess {Number} to End faculty id
     * @apiSuccess {Object[]} data Array of faculties
     * @apiSuccess {String} data.name Faculty name
     * @apiSuccess {String} data.description
     * @apiSuccess {String} data.avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function getFacultiesAction(Request $request)
    {
        $faculties = Faculty::paginate($request->query->get('count'));

        return response()->json($faculties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /api/admin/faculties Create faculties
     * @apiSampleRequest /api/admin/faculties
     * @apiDescriptions Create new faculties
     * @apiGroup Faculties
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} Authorization
     *
     * @apiParam {String} name Faculty name
     * @apiParam {String} description Faculty description
     *
     * @apiSuccess {Object[]} faculties Array of faculties
     * @apiSuccess {String} faculties.name Faculty name
     * @apiSuccess {String} faculties.description
     * @apiSuccess {String} faculties.avatar
     *
     * @apiError (400) error Returned if validation error
     * @apiError (403) error Returned if user not access for create faculty
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postFacultyAction(Request $request)
    {
        $user = $request->user();

        if (Gate::denies('createOrUpdateOrDeleteFaculty')) {
            return response()->json(null, 403);
        }

        $validator = Validator::make($request->all(), Faculty::$rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //TODO Make upload faculty avatar
        $faculty = new Faculty([
            'name' => $request->request->get('name'),
            'description' => $request->request->get('description')
        ]);

        return response()->json($faculty, 200);
    }

    /**
     * @api {get} /api/admin/faculties/:slug Get faculty by slug
     * @apiSampleRequest /api/admin/faculties/:slug
     * @apiDescription Get faculty by slug
     * @apiGroup Faculties
     *
     * @apiParam {String} slug Faculty unique name
     *
     * @apiSuccess {Object} faculty Faculty object
     * @apiSuccess {String} faculty.name Faculty name
     * @apiSuccess {String} faculty.description
     * @apiSuccess {String} faculty.avatar
     *
     * @apiError error Returned if faculty by slug not found
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacultyAction($slug)
    {
        $faculty = Faculty::findBySlug($slug);

        if (!$faculty) {
            return response()->json(null, 400);
        }

        return response()->json($faculty, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @api {put} /api/admin/faculties/:slug Update faculty by slug
     * @apiSampleRequest /api/admin/faculties/:slug
     * @apiDescription Update faculty by slug
     * @apiGroup Faculties
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Unique faculty identificator
     * @apiParam {String} name Faculty name
     * @apiParam {String} description Faculty description
     *
     * @apiSuccess {Object} faculty Faculty object
     * @apiSuccess {String} faculty.name Faculty name
     * @apiSuccess {String} faculty.description
     * @apiSuccess {String} faculty.avatar
     *
     * @apiError (400) error Returned if validation error
     * @apiError (403) error Returned if user not has access for update
     * @apiError (404) error Returned if faculty by slug not found
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function putFacultyAction(Request $request, $slug)
    {
        if (Gate::denies('createOrUpdateOrDeleteFaculty')) {
            return response()->json(null, 403);
        }

        $validator = Validator::make($request->all(), Faculty::$rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $faculty = Faculty::findBySlug($slug);

        if (!$faculty) {
            return response()->json(null, 404);
        }

        $faculty->update([
            'name' => $request->request->get('name'),
            'description' => $request->request->get('description'),
        ]);

        return response()->json($faculty, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /api/admin/faculties/:slug Delete faculty by slug
     * @apiSampleRequest /api/admin/faculties/:slug
     * @apiDescription Delete faculty by slug
     * @apiGroup Faculties
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Unique faculty identificator
     *
     * @apiSuccess (204) success Returned if faculty successful delete
     *
     * @apiError (403) error Returned if user has not access for delete faculty
     * @apiError (404) error Returned if faculty by slug not found
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function deleteFacultyAction($slug)
    {
        if (Gate::denies('createOrUpdateOrDeleteFaculty')) {
            return response()->json(null, 403);
        }

        $faculty = Faculty::findBySlug($slug);

        if (!$faculty) {
            return response()->json(null, 404);
        }

        $faculty->delete();

        return response()->json(null, 204);
    }
}
