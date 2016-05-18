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
     * @apiHeader Authorization Authorization header
     *
     * @apiSuccess (200) success Returned file
     *
     * @apiParam {Number} id File id
     * @apiParam {Number} author_id File author id
     * @apiParam {String} filename File filename
     * @apiParam {String} path File path
     * @apiParam {String} content_type
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

        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), '0755', true);
        }

        $file->move(public_path($path), $full_filename);

        $file = File::create([
            'author_id' => $user->id,
            'filename' => $filename,
            'path' => $path . $full_filename,
            'content_type' => $file->getMimeType()
        ]);

        return response()->json($file);
    }

    /**
     * @api {get} /api/files Get all files current user
     * @apiSampleRequest /api/files
     * @apiDescription Get all files current user
     * @apiGroup Files
     *
     * @apiHeader Authorization Authorization header
     *
     * @apiSuccess (200) success Returned files
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFilesAction(Request $request)
    {
        $files = $request->user()->files()->paginate($request->get('count', 10));

        return response()->json($files);
    }

    /**
     * @api {get} /api/files/documents Get all documents current user
     * @apiSampleRequest /api/files/documents
     * @apiDescription Get all documents current user
     * @apiGroup Files
     *
     * @apiHeader Authorization Authorization header
     *
     * @apiSuccess (200) success Returned documents
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDocumentsAction(Request $request)
    {
        $files = $request->user()->files()->getNotImages()->paginate($request->get('count', 10));

        return response()->json($files);
    }

    /**
     * @api {get} /api/files/images Get all images current user
     * @apiSampleRequest /api/files/images
     * @apiDescription Get all images current user
     * @apiGroup Files
     *
     * @apiHeader Authorization Authorization header
     *
     * @apiSuccess (200) success Returned images
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getImagesAction(Request $request)
    {
        $files = $request->user()->files()->getImages()->paginate($request->get('count', 10));

        return response()->json($files);
    }

    /**
     * @api {get} /api/files/:id Get file by id
     * @apiSampleRequest /api/files/:id
     * @apiDescription Get file by id
     * @apiGroup Files
     *
     * @apiHeader Authorization Authorization header
     *
     * @apiSuccess (200) success Returned file
     *
     * @apiParam {Number} id File id
     * @apiParam {Number} author_id File author id
     * @apiParam {String} filename File filename
     * @apiParam {String} path File path
     * @apiParam {String} content_type
     *
     * @param Request $request
     * @param File $file
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFileAction(Request $request, File $file)
    {
        if ($request->user() != $file->author) {
            return response()->json(null, 400);
        }

        return response()->json($file);
    }

    /**
     * @api {delete} /api/files/:id Delete file by id
     * @apiSampleRequest /api/files/:id
     * @apiDescription Delete file by id
     * @apiGroup Files
     *
     * @apiHeader Authorization Authorization header
     *
     * @apiSuccess (204) success File deleted
     *
     * @param Request $request
     * @param File $file
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function deleteFileAction(Request $request, File $file)
    {
        if (file_exists(public_path($file->path))) {
            unlink(public_path($file->path));
        }

        $file->delete();

        return response()->json(null, 204);
    }
}
