<?php

namespace App\Http\Controllers;

use App\Score;
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
     * @api {get} /api/tests/:id Get test by id
     * @apiSampleRequest /api/tests/:id
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

        return response()->json($test->load('questions.answers'));
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
     * @api {put} /api/tests/:id Update test by id
     * @apiSampleRequest /api/tests/:id
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
     * @api {delete} /api/tests/:id Delete test by id
     * @apiSampleRequest /api/tests/:id
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
        $questions = $test->questions->shuffle()->splice(0, 20);

        return response()->json($questions);
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
     */
    public function checkCompletedTestsAction(Request $request, Test $test)
    {
        $questions = $test->questions;
        $answers = $request->get('answers');
        $score = 0;
        $user = $request->user();

        foreach ($answers as $key => $answer) {
            $question = $questions->where('id', $key);

            if (!$question) {
                continue;
            }

            if (is_array($answer)) {
                $answers_in_question = $answer;
                $correctQ = true;

                foreach ($answers_in_question as $answer) {
                    $result = $question->answers->where('id', $answer)->where('isCorrectly', 1);

                    if (!$result) {
                        $correctQ = false;
                        break;
                    }
                }

                if ($correctQ) {
                    $score += $question->score;
                }

                continue;
            }

            $result = $result = $question->answers->where('id', $answer)->where('isCorrectly', 1);

            if ($result) {
                $score += $question->score;
            }
        }

        Score::create([
            'score' => $score,
            'student_id' => $user->id,
            'test_id' => $test->id,
        ]);
    }
}
