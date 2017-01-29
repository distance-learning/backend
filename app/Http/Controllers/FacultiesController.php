<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultiesController extends Controller
{
    /**
     * Get random faculties
     *
     * @deprecated Need remove in version 2.0
     *
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
        $faculties = Faculty::with('subjects', 'avatar')->get();
        $faculties = $faculties->shuffle()->splice(0, 4);

        return response()->json([
            'faculties' => $faculties,
        ]);
    }

    /**
     * Get faculty by slug
     *
     * @deprecated Need remove in version 2.0
     *
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
        $faculty = $faculty->load('directions.subjects', 'avatar');

        return response()->json([
            'faculty' => $faculty,
        ]);
    }

    /**
     * Get paginated faculties
     *
     * @deprecated Need remove in version 2.0
     *
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
        $faculties = Faculty::with('subjects', 'directions', 'teachers', 'avatar')
            ->orderBy('id')
            ->paginate(
                $request->query->get('count', 5)
            );

        return response()->json([
            'faculties' => $faculties,
        ]);
    }
}
