<?php

namespace App\Http\Controllers;

use App\Group;
use App\Module;
use App\ModuleGroup;
use Illuminate\Http\Request;
use App\Http\Requests;

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
     * @apiParam {String} type Module type
     * @apiParam {Number} module_group_id Group id
     * @apiParam {Number} test_id Test id
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createModuleAction(Request $request)
    {
        $module = Module::create([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'type' => $request->get('type'),
            'module_group_id' => $request->get('module_group_id'),
            'test_id' => $request->get('test_id'),
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
     * @apiParam {String} type Module type
     * @apiParam {Number} module_group_id Group id
     * @apiParam {Number} test_id Test id
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
            'type' => $request->get('type'),
            'module_group_id' => $request->get('module_group_id'),
            'test_id' => $request->get('test_id'),
        ]);

        return response()->json($module);
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
        $moduleModule = $request->user()->moduleGroup()->create([
            'name' => $request->get('name'),
        ]);

        return response()->json($moduleModule, 201);
    }
}
