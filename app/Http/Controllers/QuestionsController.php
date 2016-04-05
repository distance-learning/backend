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
     * @api {get} /api/tests/{id}/questions/{question_id} Get question
     * @apiSampleRequest /api/tests/{id}/questions/{question_id} Update question
     * @apiDescription get question
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
     *
     **/
    public function getQuestionByCodeAction(Test $test, Question $question)
    {
        return response()->json($question->with('answers')->where('id', $question->id)->first());
    }

    /**
     * Method that authenticate user
     *
     * @api {post} /api/tests/{id}/questions Create question
     * @apiSampleRequest /api/tests/{id}/questions
     * @apiDescription Create question
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
    public function createQuestionAction(Request $request, Test $test)
    {
        $question = Question::create([
            'name' => '',
            'type' => 'single',
            'test_id' => $test->id,
            'image' => '',
            'code' => md5(uniqid('questions_')) . rand(1, 1000),
        ]);

        return response()->json($question);
    }

    /**
     * Method that authenticate user
     *
     * @api {put} /api/tests/{id}/questions/{question_id} Update question
     * @apiSampleRequest /api/tests/{id}/questions/{question_id} Update question
     * @apiDescription update question
     * @apiGroup Tests
     *
     * @apiHeader {String} authorization User token
     *
     * @apiParam {String} name Question name
     * @apiParam {String} type Question type
     * @apiParam {String} image Question image
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
        $image = null;

        if ($request->hasFile('question')['image']) {
            if ($question->image && file_exists(public_path("/uploads/questions/{$question->image}"))) {
                unlink(public_path("/uploads/questions/{$question->image}"));
            }

            $image = md5(uniqid()) . '.' . $request->file('question')['image']->getClientOriginalExtension();

            $request->file('question')['image']->move(
                public_path('/uploads/questions'),
                $image
            );

            $image = "{$request->root()}/uploads/questions/{$image}";
        }

        $question->update([
            'name' => $request->get('question')['name'],
            'type' => $request->get('question')['type'],
            'image' => $image,
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
}
