<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class FacultiesController extends Controller
{
    /**
     * @api {get} /api/faculties/random Get random faculties
     * @apiSampleRequest /api/faculties/random
     * @apiDescription Get random faculties
     * @apiGroup Faculties
     *
     * @apiSuccess (200) success Returned if faculties array
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function randomFacultiesAction(Request $request)
    {
        $faculties = Faculty::all();

        $faculties = $faculties->random(4);

        return response()->json($faculties);
    }
}
