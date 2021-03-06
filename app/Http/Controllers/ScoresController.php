<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

/**
 * Class ScoresController
 * @package App\Http\Controllers
 */
class ScoresController extends Controller
{
    /**
     * @api {get} /api/tests/:test_id/scores Get scores by test
     * @apiSampleRequest /api/tests/:test_id/scores
     * @apiDescription Get scores by test
     * @apiGroup Score
     *
     * @apiHeader {String} authorization User token
     *
     * @param Request $request
     * @param Test $test
     * @return \Illuminate\Http\JsonResponse
     */
    public function getScoresAction(Request $request, Test $test)
    {
        $scores = $test->scores->sortBy('id', 'DESC');

        return response()->json($scores);
    }
}
