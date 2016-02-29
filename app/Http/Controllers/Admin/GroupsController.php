<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/groups/:slug Get group by slug
     * @apiSampleRequest /api/admin/groups/:slug
     * @apiDescription Get group by slug
     * @apiGroup Admin|Groups
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Slug
     *
     * @apiSuccess (200) success Returned if group issets
     *
     * @apiError (403) error Returned if user has not access for get groups
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public  function getGroupAction(Group $group)
    {
        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {get} /api/admin/groups Get groups by page
     * @apiSampleRequest /api/admin/groups
     * @apiDescription Get groups by page
     * @apiGroup Admin|Groups
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} page Page
     *
     * @apiSuccess (200) success Returned if groups issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function getGroupsAction()
    {
        $groups = Group::paginate(15);

        return response()->json($groups);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {post} /api/admin/groups Create new group
     * @apiSampleRequest /api/admin/groups
     * @apiDescription Create new group
     * @apiGroup Admin|Groups
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} name Name
     * @apiParam {String} direction_id Direction id
     * @apiParam {String} year_of_entry Year of entry
     *
     * @apiSuccess (200) success Returned if group issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function postGroupAction(Request $request)
    {
        $group = Group::create([
            'name' => $request->get('name'),
            'direction_id' => $request->get('direction_id'),
            'year_of_entry' => $request->get('year_of_entry'),
        ]);

        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {put} /api/admin/groups/:slug Update group by slug
     * @apiSampleRequest /api/admin/groups/:slug
     * @apiDescription Update group by slug
     * @apiGroup Admin|Groups
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Slug
     * @apiParam {String} name Name
     * @apiParam {String} direction_id Direction id
     * @apiParam {String} year_of_entry Year of entry
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function putGroupAction(Request $request, Group $group)
    {
        $group->update([
            'name' => $request->get('name'),
            'direction_id' => $request->get('direction_id'),
            'year_of_entry' => $request->get('year_of_entry'),
        ]);

        return response()->json($group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /api/admin/groups/:slug Delete group by slug
     * @apiSampleRequest /api/admin/groups/:slug
     * @apiDescription Delete group by slug
     * @apiGroup Admin|Groups
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiParam {String} slug Slug
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function deleteGroupAction(Group $group)
    {
        $group->delete();

        return response()->json(null, 204);
    }
}
