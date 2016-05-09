<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class GroupsController
 * @package App\Http\Controllers\Admin
 */
class GroupsController extends Controller
{
    /**
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
     * @apiSuccess (200) success Returned if group isset
     *
     * @apiError (403) error Returned if user has not access for get groups
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function getGroupAction(Group $group)
    {
        return response()->json($group);
    }

    /**
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
     * @apiSuccess (200) success Returned if groups isset
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroupsAction()
    {
        $groups = Group::paginate(15);

        return response()->json($groups);
    }

    /**
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
     *
     * @apiSuccess (200) success Returned if group issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postGroupAction(Request $request)
    {
        $group = Group::create([
            'name' => $request->get('name'),
            'direction_id' => $request->get('direction_id'),
            'year_of_entry' => Carbon::now()->format('Y'),
        ]);

        $students = User::find($request->get('students'));

        $group->students()->saveMany($students);

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
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Request $request
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function putGroupAction(Request $request, Group $group)
    {
        $group->update([
            'name' => $request->get('name'),
            'direction_id' => $request->get('direction_id'),
        ]);

        $students = User::find($request->get('students'));

        $group->students()->saveMany($students);

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

    /**
     * Remove the specified resource from storage.
     *
     * @api {post} /api/admin/groups/:slug/students Add students to group
     * @apiSampleRequest /api/admin/groups/:slug/students
     * @apiDescription Add students to group
     * @apiGroup Admin|Groups
     * @apiPermission administrator, university_administrator
     *
     * @apiHeader {String} authorization
     *
     * @apiSuccess (200) success Returned if teachers issets
     *
     * @apiError (403) error Returned if user has not access for get teachers
     *
     * @param  Group $group
     * @return \Illuminate\Http\Response
     */
    public function addStudentsToGroupAction(Request $request, Group $group)
    {
        foreach ($request->get('students') as $student) {
            if ($student->isStudent()) {
                $student->group_id = $group->id;
                $student->save();
            }
        }

        return response()->json(null, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @api {delete} /api/admin/groups/:slug/students Remove students from group
     * @apiSampleRequest /api/admin/groups/:slug/students
     * @apiDescription Remove students from group
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
    public function removeStudentsFromGroupAction(Request $request, Group $group)
    {
        foreach ($request->get('students') as $student) {
            if ($student->isStudent()) {
                $student->group_id = null;
                $student->save();
            }
        }

        return response()->json(null, 200);
    }
}
