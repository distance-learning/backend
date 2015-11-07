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
     * Display a listing of the resource.
     *
     * @api {get} /api/faculties Get faculties
     * @apiSampleRequest /api/faculties
     * @apiDescription Get some faculties
     * @apiGroup Faculties
     *
     * @apiParam {Number} count Count faculties by page
     *
     * @apiSuccess {Object[]} faculties Array of faculties
     * @apiSuccess {String} faculties.name Faculty name
     * @apiSuccess {String} faculties.description
     * @apiSuccess {String} faculties.avatar
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $faculties = Faculty::paginate($request->get('count'));

        return response()->json($faculties);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @api {post} /api/faculties Create faculties
     * @apiSampleRequest /api/faculties
     * @apiDescriptions Create new faculties
     * @apiGroup Faculties
     *
     * @apiParam {String} name Faculty name
     * @apiParam {String} description Faculty description
     *
     * @apiSuccess {Object[]} faculties Array of faculties
     * @apiSuccess {String} faculties.name Faculty name
     * @apiSuccess {String} faculties.description
     * @apiSuccess {String} faculties.avatar
     *
     * @apiError (400) error Returned if validation error
     * @apiError (403) error Returned if user not access for create faculty
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('createFaculty')) {
            return response()->json(null, 403);
        }

        $validator = Validator::make($request->all(), Faculty::$rules);

        if ($validator->fails()) {
            return response()->json(null, 400);
        }

        //TODO Make upload faculty avatar
        $faculty = new Faculty([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        return response()->json($faculty, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
