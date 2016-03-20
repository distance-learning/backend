<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Faculty;
use App\Direction;

class DirectionsController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/directions Get directions by page
     * @apiSampleRequest /api/admin/directions
     * @apiDescription Get directions by page
     * @apiGroup Admin|Directions
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
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function indexAction(Request $request)
    {
        $faculties = Faculty::paginate($request->query->get('count'));

        return response()->json($faculties);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/directions/:slug Get direction by slug
     * @apiSampleRequest /api/admin/directions/:slug
     * @apiDescription Get direction by slug
     * @apiGroup Admin|Directions
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Unique direction slug
     *
     * @apiSuccess (200) success Returned if direction issets
     *
     * @apiError (403) error Returned if user has not access for get directions
     * @apiError (404) error Returned if direction not isset
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function itemAction(Request $request, $slug)
    {
        $faculty = Faculty::findBySlug($slug);

        if (!$faculty) {
            return response()->json(null, 404);
        }

        return response()->json($faculty);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {post} /api/admin/directions Create new direction
     * @apiSampleRequest /api/admin/directions
     * @apiDescription Create direction
     * @apiGroup Admin|Directions
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name Direction name
     * @apiParam {String} description Direction description
     * @apiParam {Integer} faculty Faculty id
     *
     * @apiSuccess (200) success Returned if direction successful created
     *
     * @apiError (403) error Returned if user has not access for get facilties
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAction(Request $request)
    {
        $direction = Direction::create([
            'name'  =>  $request->get('name'),
            'description' =>  $request->get('description'),
            'faculty_id' => $request->get('faculty')
        ]);

        $direction->save();

        return response()->json($direction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {put} /api/admin/directions/:slug Update direction
     * @apiSampleRequest /api/admin/directions/:slug
     * @apiDescription Update direction
     * @apiGroup Admin|Directions
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name Direction name
     * @apiParam {String} description Direction description
     * @apiParam {Integer} faculty Faculty id
     *
     * @apiSuccess (200) success Returned if direction successful updated
     *
     * @apiError (403) error Returned if user has not access for get facilties
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function putAction(Request $request, $facultySlug, $directionSlug)
    {
        $direction = Direction::findBySlug($directionSlug);

        if (!$direction) {
            return response()->json('Direction not found', 404);
        }

        $faculty = Faculty::findBySlug($facultySlug)->first();

        if (!$faculty) {
            return response()->json('Faculty not found');
        }

        $direction = Direction::create([
            'name'  =>  $request->request->get('name'),
            'description' =>  $request->request->get('description'),
        ]);

        $direction->faculty()->associate($faculty);
        $direction->save();

        return response()->json($direction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /api/admin/directions/:slug Delete direction
     * @apiSampleRequest /api/admin/directions/:slug
     * @apiDescription Remove direction
     * @apiGroup Admin|Directions
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (204) success Returned if direction successful removed
     *
     * @apiError (403) error Returned if user has not access for get directions
     *
     * @param  Request $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function deleteAction(Request $request, $slug)
    {
        $direction = Direction::findBySlug($slug);

        if (!$direction) {
            return response()->json(null, 404);
        }

        $direction->delete();

        return response()->json(null, 204);
    }
}
