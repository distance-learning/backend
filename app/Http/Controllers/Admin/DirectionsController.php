<?php

namespace App\Http\Controllers\Admin;

use App\Models\Direction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DirectionsController
 * @package App\Http\Controllers\Admin
 */
class DirectionsController extends Controller
{
    /**
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
        $directions = Direction::paginate(
            $request->query->get('count', 10)
        );

        return response()->json([
            "directions" => $directions,
        ]);
    }

    /**
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
     * @param Direction $direction
     * @return \Illuminate\Http\Response
     */
    public function itemAction(Direction $direction)
    {
        return response()->json([
            "direction" => $direction,
        ]);
    }

    /**
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
     * @apiError (403) error Returned if user has not access for create directions
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

        return response()->json([
            "direction" => $direction,
        ], 201);
    }

    /**
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
     * @apiParam {Integer} faculty_id Faculty id
     *
     * @apiSuccess (200) success Returned if direction successful updated
     *
     * @apiError (403) error Returned if user has not access for update direction
     *
     * @param  Request $request
     * @param  Direction $direction
     * @return \Illuminate\Http\Response
     */
    public function putAction(Request $request, Direction $direction)
    {
        $direction->update([
            'name'  =>  $request->get('name'),
            'description' =>  $request->get('description'),
            'faculty_id' => $request->get('faculty_id'),
        ]);

        return response()->json([
            "direction" => $direction,
        ]);
    }

    /**
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
     * @apiError (403) error Returned if user has not access for delete direction
     *
     * @param  Direction $direction
     * @return \Illuminate\Http\Response
     */
    public function deleteAction(Direction $direction)
    {
        $direction->delete();

        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/directions/:slug/groups Get groups by direction
     * @apiSampleRequest /api/admin/directions/:slug/groups
     * @apiDescription Get groups by direction
     * @apiGroup Admin|Directions
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (204) success Returned if direction successful removed
     *
     * @apiError (403) error Returned if user has not access for get groups in directions
     *
     * @param  Request $request
     * @param  Direction $direction
     * @return \Illuminate\Http\Response
     */
    public function getGroupsByDirectionSlugAction(Request $request, Direction $direction)
    {
        $groups = $direction->groups()->paginate($request->get('count', 10));

        return response()->json([
            "directions" => $groups,
        ]);
    }
}
