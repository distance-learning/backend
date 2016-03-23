<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Requests;

class TestsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTestsAction()
    {
        $tests = Test::where('teacher');

        return response()->json($tests);
    }

    public function getTestAction(Test $test)
    {
        return response()->json($test);
    }

    public function postTestAction(Request $request)
    {
        $user = $request->user();

        $test = Test::create([
            'name' => $request->get('name'),
            'time' => $request->get('time'),
            'teacher_id' => $user->id,
        ]);

        return response()->json($test);
    }
}
