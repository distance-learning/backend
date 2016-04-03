<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Requests;

class TestsController extends Controller
{
    /**
     * Method that authenticate user
     *
     * @api {get} /api/tests Get tests
     * @apiSampleRequest /api/tests
     * @apiDescription Get teacher tests
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTestsAction(Request $request)
    {
        $user = $request->user();
        $tests = Test::where('faculty_id', $user->structure->id)->paginate(10);

        return response()->json($tests);
    }

    /**
     * Method that authenticate user
     *
     * @api {get} /api/tests/{id} Get test by id
     * @apiSampleRequest /api/tests/{id}
     * @apiDescription Get teacher tests by id
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     * @apiParam {Integer} id Test id
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTestAction(Request $request, Test $test)
    {
        $user = $request->user();

        return response()->json($test);
    }

    /**
     * Method that authenticate user
     *
     * @api {post} /api/tests Create test
     * @apiSampleRequest /api/tests/
     * @apiDescription Create test
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTestAction(Request $request)
    {
        $user = $request->user();

        $test = Test::create([
            'name' => '',
            'time' => 0,
            'faculty_id' => $user->structure->id,
            'code' => md5(uniqid()) . rand(1, 100),
        ]);

        return response()->json($test);
    }

    /**
     * Method that authenticate user
     *
     * @api {put} /api/tests/{id} Update test by id
     * @apiSampleRequest /api/tests/{id}
     * @apiDescription Update test
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {Integer} id Test id
     * @apiParam {String} name Test name
     * @apiParam {String} time Test time
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTestAction(Request $request, Test $test)
    {
        $test->update([
            'name' => $request->get('name'),
            'time' => $request->get('time')
        ]);

        return response()->json($test);
    }

    /**
     * Method that authenticate user
     *
     * @api {delete} /api/tests/{id} Delete test by id
     * @apiSampleRequest /api/tests/{id}
     * @apiDescription Delete test
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {id} id Test id
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTestAction(Request $request, Test $test)
    {
        $test->delete();

        return response()->json(null, 204);
    }
}
