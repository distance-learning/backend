<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleGroup;
use Illuminate\Http\Request;

/**
 * Class ModulesController
 * @package App\Http\Controllers
 */
class ModulesController extends Controller
{
    /**
     * @api {post} /api/modules Create module
     * @apiSampleRequest /api/modules
     * @apiDescription Create module
     * @apiGroup Modules
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name Module name
     * @apiParam {String} content Module content
     * @apiParam {Number} module_group_id Group id
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createModuleAction(Request $request)
    {
        $module = Module::create([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'module_group_id' => $request->get('module_group_id'),
        ]);

        return response()->json($module, 201);
    }

    /**
     * @api {put} /api/modules/:id Update module
     * @apiSampleRequest /api/modules/:id
     * @apiDescription Create module
     * @apiGroup Modules
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name Module name
     * @apiParam {String} content Module content
     * @apiParam {Number} module_group_id Group id
     *
     * @param Request $request
     * @param Module $module
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateModuleAction(Request $request, Module $module)
    {
        $module->update([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'module_group_id' => $request->get('module_group_id'),
        ]);

        return response()->json($module);
    }

    /**
     * @api {delete} /api/modules/:id Delete module
     * @apiSampleRequest /api/modules/:id
     * @apiDescription Delete module
     * @apiGroup Modules
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @param Module $module
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteModuleAction(Request $request, Module $module)
    {
        $module->delete();

        return response()->json(null, 204);
    }

    /**
     * @api {post} /api/modules/groups Create module group
     * @apiSampleRequest /api/modules/groups
     * @apiDescription Create module group
     * @apiGroup Modules
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name Group name
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createModuleGroupAction(Request $request)
    {
        $user = $request->user();
        
        $moduleModule = $user->moduleGroups()->create([
            'name' => $request->get('name'),
        ]);

        return response()->json($moduleModule, 201);
    }

    /**
     * @api {put} /api/modules/groups/:id Update module group
     * @apiSampleRequest /api/modules/groups/:id
     * @apiDescription Update module group
     * @apiGroup Modules
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name Group name
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateModuleGroupAction(Request $request, ModuleGroup $moduleGroup)
    {
        $moduleGroup->update([
            'name' => $request->get('name'),
        ]);

        return response()->json($moduleGroup);
    }
}
