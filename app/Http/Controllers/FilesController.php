<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class FilesController
 * @package App\Http\Controllers
 */
class FilesController extends Controller
{
    /**
     * @api {post} /api/files Upload file to server
     * @apiSampleRequest /api/files
     * @apiDescription Upload file to server
     * @apiGroup Files
     *
     * @apiSuccess (200) success Returned file
     *
     * @apiParam {Object} file File object
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadFileAction(Request $request)
    {
        $user = $request->user();
        $file = $request->file('file');

        $filename =  $file->getClientOriginalName();
        $full_filename = md5($filename . uniqid()) . "." . $file->getClientOriginalExtension();
        $path = "/uploads/files/";

        if (!file_exists($path)) {
            mkdir($path, '0755', true);
        }

        $file->move($path, $full_filename);

        $file = File::create([
            'author_id' => $user->id,
            'filename' => $filename,
            'path' => $path . $full_filename,
        ]);

        return response()->json($file);
    }
}
