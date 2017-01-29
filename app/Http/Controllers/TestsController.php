<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Score;
use App\Services\TestAnswersExport;
use App\Services\TestAnswersExportService;
use App\Services\TestsResultService;
use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

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

        if ($user->isAdmin()) {
            $tests = Test::orderBy('id')->paginate($request->get('count', 10));
        } else {
            $tests = Test::where('faculty_id', $user->structure->id)
                ->orderBy('id')
                ->paginate(
                    $request->get('count', 10)
                );
        }

        return response()->json($tests);
    }

    /**
     * Method that authenticate user
     *
     * @api {get} /api/tests/:code Get test by code
     * @apiSampleRequest /api/tests/:code
     * @apiDescription Get teacher tests by code
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
        return response()->json(
            $test->load('questions.answers')
        );
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

        $test = new Test();
        $test->name = '';
        $test->time = 0;
        $test->faculty_id = $user->structure->id;
        $test->code = md5(uniqid()) . rand(1, 100);
        $test->created_by = $user->id;
        $test->save();

        return response()->json($test);
    }

    /**
     * Method that authenticate user
     *
     * @api {put} /api/tests/:code Update test by id
     * @apiSampleRequest /api/tests/:code
     * @apiDescription Update test
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {Integer} id Test id
     * @apiParam {String} name Test name
     * @apiParam {String} time Test time
     * @apiParam {Number} allow_skip Allow skip test
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @param Test $test
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTestAction(Request $request, Test $test)
    {
        $test->name = $request->get('name');
        $test->time = $request->get('time');
        $test->allow_skip = $request->get('allow_skip');
        $test->allow_export = $request->get('allow_export');
        $test->count_questions = $request->get('count_questions');
        $test->save();

        return response()->json($test);
    }

    /**
     * Method that authenticate user
     *
     * @api {delete} /api/tests/:code Delete test by id
     * @apiSampleRequest /api/tests/:code
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
     * @param Test $test
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTestAction(Request $request, Test $test)
    {
        if ($request->user()->isAdmin()) {
            $test->delete();

            return response()->json(null, 204);
        }

        return response()->json(null, 403);
    }

    /**
     * @api {get} /api/tests/:code/passing Get test for passing
     * @apiSampleRequest /api/tests/:code/passing
     * @apiDescription Get test for passing
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} code Test code
     *
     * @param Request $request
     * @param Test $test
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTestsForPassingAction(Request $request, Test $test)
    {
        $questions = $test->questions->where('is_active', true)
            ->load('answers')
            ->shuffle()
            ->splice(0, $test->count_questions);

        return response()->json([
            "questions" => $questions,
            "test" => $test
        ]);
    }

    /**
     * @api {post} /api/tests/:code/check Check user questions in test
     * @apiSampleRequest /api/tests/:code/check
     * @apiDescription Check user questions in test
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @param Test $test
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkCompletedTestsAction(Request $request, Test $test)
    {
        /** @var Collection $questions */
        $questions = $test->questions;

        /** @var array $questionsFromRequest */
        $questionsFromRequest = $request->get('questions');

        /** @var TestsResultService $testsResultService */
        $testsResultService = app()->make(TestsResultService::class);

        /** @var Score $score */
        $score = $testsResultService->processResult(
            $questions,
            $test,
            $questionsFromRequest
        );

        return response()->json($score->load('userAnswers'));
    }

    /**
     * @api {get} /api/tests/search Search tests
     * @apiSampleRequest /api/tests/search
     * @apiDescription Search
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} search Search param
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchTestAction(Request $request)
    {
        $tests = Test::where('name', 'LIKE', '%' . $request->get('search') . '%')->get();

        return response()->json($tests);
    }

    /**
     * @api {get} /api/tests/scores Get users scores by test_id and interval
     * @apiSampleRequest /api/tests/scores
     * @apiDescription Get scores
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {Integer} test_id Test id
     * @apiParam {Date} from_date From date
     * @apiParam {Date} to_date To date
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScoresAction(Request $request)
    {
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');

        $scores = Score::where('test_id', $request->get('test_id'))
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->with('student.group', 'userAnswers.question')
            ->get();
        ;

        return response()->json($scores);
    }

    /**
     * @api {get} /api/tests/:code/export Export test data
     * @apiSampleRequest /api/tests/:code/export
     * @apiDescription Export test data
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @param Test $test
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTestAnswersAction(Request $request, Test $test)
    {
        /** @var TestAnswersExport $testAnswersExport */
        $testAnswersExport = app()->make(TestAnswersExportService::class);

        /** @var File $file */
        $file = $testAnswersExport->generate($test);

        return response()->json($file);
    }
}
