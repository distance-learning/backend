<?php

namespace App\Services;

use App\Models\Question;
use App\Models\Score;
use App\Models\Test;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TestsService
 * @package App\Service
 */
class TestsResultService
{
    /**
     * @var User
     */
    protected $user;

    /**
     * TestsResultService constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param Collection $questions
     * @param Test $test
     * @param array $questionsFromRequest
     * @return Score
     */
    public function processResult(
        Collection $questions,
        Test $test,
        array $questionsFromRequest
    ) {
        $userAnswers = $this->processQuestions($questions, $questionsFromRequest);

        return $this->saveScoreData($test, $userAnswers);
    }

    /**
     * @param Collection $questions
     * @param array $questionsFromRequest
     * @return Collection
     */
    private function processQuestions(Collection $questions, array $questionsFromRequest)
    {
        $userAnswers = new Collection();

        foreach ($questionsFromRequest as $questionFromRequest) {
            $question = $questions->where('id', $questionFromRequest['question_id'])->first();

            if (!$question) {
                continue;
            }

            $userAnswers->add([
                'question_id' => $question->id,
                'is_correct' => $this->processQuestion(
                    $question,
                    $questionFromRequest
                ),
                'score' => $question->score,
            ]);
        }

        return $userAnswers;
    }

    /**
     * Process single quest
     *
     * @param Question $question
     * @param array $questionFromRequest
     * @return bool
     */
    private function processQuestion(
        Question $question,
        array $questionFromRequest
    ) {
        $isCorrectQuestion = false;

        $answers = $questionFromRequest['answers'];

        if (count($answers) > 0) {
            $isCorrectQuestion = true;

            switch ($question->type) {
                case Question::SINGLE_TYPE:
                    $isCorrectQuestion = $this->processSingleTypeQuestion($question, $answers);
                    break;

                case Question::MULTISELECT_TYPE:
                    $isCorrectQuestion = $this->processMultipleTypeQuestion($question, $answers);
                    break;
            }
        }

        return $isCorrectQuestion;
    }

    /**
     * Process question with single result
     *
     * @param Question $question
     * @param $answers
     */
    private function processSingleTypeQuestion(Question $question, $answers)
    {
        return $question->answers
            ->where('id', $answers[0])
            ->where('is_correct', true)
            ->first();
    }

    /**
     * Process question with multiple results
     *
     * @param Question $question
     * @param $answers
     * @return bool
     */
    private function processMultipleTypeQuestion(Question $question, $answers)
    {
        $isCorrectQuestion = true;

        foreach ($answers as $answer) {
            $result = $question->answers
                ->where('id', $answer)
                ->where('is_correct', true)
                ->first();

            if (!$result) {
                $isCorrectQuestion = false;
                break;
            }
        }

        return $isCorrectQuestion;
    }

    /**
     * Create score object, and save it in database
     *
     * @param Test $test
     * @param Collection $userAnswers
     * @return Score
     */
    private function saveScoreData(
        Test $test,
        Collection $userAnswers
    ) {
        $currentScore = 0;
        $scoreTotal = 0;
        $answers = [];

        foreach ($userAnswers as $item) {
            $answers[] = [
                'student_id' => $item['student_id'],
                'is_correct' => $item['is_correct'],
            ];

            if ($item['is_correct']) {
                $currentScore += $item['score'];
            }

            $scoreTotal += $item['score'];
        }

        $score = new Score();
        $score->student_id = $this->user->id;
        $score->test_id = $test->id;
        $score->score = $currentScore;
        $score->score_total = $scoreTotal;
        $score->save();

        $score->userAnswers()->createMany($answers);

        return $score;
    }
}
