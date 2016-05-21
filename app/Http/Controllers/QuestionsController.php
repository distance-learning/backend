<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Requests;

class QuestionsController extends Controller
{
    /**
     * Method that authenticate user
     *
     * @api {get} /api/tests/:code/questions/:code Get question
     * @apiSampleRequest /api/tests/:code/questions/:code Update question
     * @apiDescription get question
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Test $test
     * @param Question $question
     * @return \Illuminate\Http\JsonResponse
     *
     **/
    public function getQuestionByCodeAction(Test $test, Question $question)
    {
        $questions = $question->load('answers');

        return response()->json($questions);
    }

    /**
     * Method that authenticate user
     *
     * @api {post} /api/tests/:code/questions Create question
     * @apiSampleRequest /api/tests/:code/questions
     * @apiDescription Create question
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name Question name
     * @apiParam {String} type Question type
     * @apiParam {String} image Question image
     * @apiParam {Number} score Question score
     * @apiParam {Number} time  Question time in seconds
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createQuestionAction(Request $request, Test $test)
    {
        $question = Question::create([
            'name' => '',
            'type' => 'single',
            'test_id' => $test->id,
            'image' => '',
            'code' => md5(uniqid('questions_')) . rand(1, 1000),
            'score' => $request->get('score'),
            'time'  => $request->get('time'),
        ]);

        return response()->json($question);
    }

    /**
     * Method that authenticate user
     *
     * @api {put} /api/tests/:code/questions/:code Update question
     * @apiSampleRequest /api/tests/:code/questions/:code Update question
     * @apiDescription update question
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name Question name
     * @apiParam {String} type Question type
     * @apiParam {String} image Question image
     * @apiParam {Number} score Question score
     * @apiParam {Number} time  Question time in seconds
     * @apiParam {Array} answers  Question Answers
     * @apiParam {String} answers.name Answer name
     * @apiParam {Boolean} answers.isCorrectly Answer correct
     *
     * @apiError (401) error Returned if user not active
     * @apiError (400) error Returned if credentials not correct
     * @apiError (500) error Returned if error on serve
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQuestionAction(Request $request, Test $test, Question $question)
    {
        $question->update([
            'name' => $request->get('question')['name'],
            'type' => $request->get('question')['type'],
            'score' => $request->get('question')['score'],
            'time' => $request->get('question')['time'],
        ]);

//        $question->answers()->delete();

        Answer::where('question_id', $question->id)->delete();

        if (count($request->get('question')['answers']) > 0) {
            foreach ($request->get('question')['answers'] as $answer) {
                Answer::create([
                    'body' => $answer['body'],
                    'iscorrectly' => $answer['iscorrectly'],
                    'question_id' => $question->id,
                ]);
            }
        }

        $question = Question::with('answers')
            ->find($question->id)
        ;

        return response()->json($question);
    }

    /**
     * @param Request $request
     * @param Test $test
     * @param Question $question
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateImageToQuestionByCodeAction(Request $request, Test $test, Question $question)
    {
        if ($request->hasFile('file')) {

            //TODO fix remove image
            if ($question->image && file_exists(public_path("/uploads/questions/{$question->image}"))) {
                unlink(public_path("/uploads/questions/{$question->image}"));
            }

            $image = md5(uniqid()) . '.' . $request->file('file')->getClientOriginalExtension();

            $request->file('file')->move(
                public_path('/uploads/questions'),
                $image
            );

            $image = "{$request->root()}/uploads/questions/{$image}";

            $question->update([
                'image' => $image,
            ]);

            return response()->json($question);
        }

        return response()->json(null, 400);
    }
}
