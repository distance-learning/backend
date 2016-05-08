<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use App\Http\Requests;

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
    public function getRandomFacultiesAction(Request $request)
    {
        $faculties = Faculty::with('subjects')->get();

        //TODO Need refactoring
//        $faculties = $faculties->random(4);

        $faculties = $faculties->shuffle()->splice(0, 4);

        return response()->json($faculties);
    }

    /**
     * @api {get} /api/faculties/:slug Get faculty by unique slug
     * @apiSampleRequest /api/faculties/:slug
     * @apiDescription Get faculty by unique slug
     * @apiGroup Faculties
     *
     * @apiParam {String} slug Unique identificator
     *
     * @apiSuccess (200) success Returned if faculty isset
     *
     * @param Request $request
     * @param Faculty $faculty
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFacultyBySlugAction(Request $request, Faculty $faculty)
    {
        $faculty = $faculty->load('directions.subjects');

        return response()->json($faculty);
    }

    /**
     * @api {get} /api/faculties Get paginated faculties
     * @apiSampleRequest /api/faculties
     * @apiDescription Get paginated faculties
     * @apiGroup Faculties
     *
     * @apiParam {Number} count Count faculties by page
     * @apiParam {Number} page Number of current page
     *
     * @apiSuccess (200) success
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPaginatedFacultiesAction(Request $request)
    {
        $faculties = Faculty::with('subjects', 'directions')->paginate($request->query->get('count', 5));

        return response()->json($faculties);
    }
}
