<?php

namespace App\Http\Controllers;

use App\File;
use App\Score;
use App\Test;
use App\UserAnswer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Requests;
use Maatwebsite\Excel\Facades\Excel;

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
        $tests = Test::where('faculty_id', $user->structure->id)->orderBy('id')->paginate(10);

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTestAction(Request $request, Test $test)
    {
        $test->update([
            'name' => $request->get('name'),
            'time' => $request->get('time'),
            'allow_skip' => $request->get('allow_skip'),
            'allow_export' => $request->get('allow_export'),
            'count_questions' => $request->get('count_questions'),
        ]);

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
        $questions = $test->questions->where('is_active', true)->load('answers')->shuffle()->splice(0, $test->count_questions);
        $test = Test::find($test->id);

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
        $questions = $test->questions;
        $questionsFromRequest = $request->get('questions');
        $score = 0;
        $user = $request->user();
        $userAnswers = new Collection();

        foreach ($questionsFromRequest as $questionFromRequest) {
            $question = $questions->where('id', $questionFromRequest['question_id']);
            $correctQ = false;

            if (!$question) {
                continue;
            }

            $answers = $questionFromRequest['answers'];

            if (count($answers) > 0) {
                $correctQ = true;

                switch ($question->type) {
                    case 'single': {
                        $result = $question->ansers->where('id', $answers[0])->where('is_correct', true);

                        if (!$result) {
                            $correctQ = false;
                        }
                    }
                        break;

                    case 'multiselect': {
                        foreach ($answers as $answer) {
                            $result = $question->answers->where('id', $answer)->where('is_correct', true);

                            if (!$result) {
                                $correctQ = false;
                                break;
                            }
                        }
                    }
                        break;
                }

                if ($correctQ) {
                    $score += $question->score;
                }
            }

            $userAnswers->add(UserAnswer::create([
                'question_id' => $question->id,
                'is_correct' => $correctQ,
            ]));
        }

        $score = Score::create([
            'score' => $score,
            'student_id' => $user->id,
            'test_id' => $test->id,
        ]);

        foreach ($userAnswers as $answer) {
            $score->userAnswers()->attach($answer->id);
        }

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
        $from_date = Carbon::createFromTimestamp($from_date);
        $to_date = Carbon::createFromTimestamp($to_date);

        $scores = Score::where('test_id', $request->get('test_id'))
            ->where('created_at', '>=', $from_date)
            ->where('created_at', '<=', $to_date)
            ->with('student.group', 'userAnswers')
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
        $timestamp = Carbon::now()->getTimestamp();

        $xls = \Excel::create('test_answers_' . $timestamp, function ($excel) use ($test) {
            $excel->sheet('Запитання до тесту ' . $test->name, function ($sheet) use ($test) {
                $sheet->row(1, [
                    'Запитання',
                    'Кількість часу на запитання (в секундах)',
                    'Кількість відповідей',
                    'Відповіді:'
                ]);

                foreach ($test->questions as $key => $question) {
                    $row = [
                        strip_tags(trim($question->name)),
                        $question->time,
                        ($question->type == 'single') ? 'Одна' : 'Багато',
                    ];

                    foreach ($question->answers as $answer) {
                        $row[] = $answer->body;
                    }

                    $sheet->row($key + 2, $row);
                }
            });
        })->store('xls', public_path('uploads/xls'));

        $file = File::create([
            'filename' => 'Запитання до тесту ' . $test->name,
            'path' => "/uploads/xls/{$xls->filename}.{$xls->ext}",
            'author_id' => $request->user()->id,
            'content_type' => 'xls',
        ]);

        return response()->json($file);
    }
}
