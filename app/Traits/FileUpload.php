<?php

namespace App\Traits;

use App\Models\File;
use Illuminate\Http\Request;

trait FileUpload
{
    /**
     * @param Request $request
     * @return array|null|\Symfony\Component\HttpFoundation\File\UploadedFile|static|\App\File
     */
    public function uploadFile(Request $request)
    {
        $user = $request->user();
        $file = $request->file('file');

        $filename =  $file->getClientOriginalName();
        $full_filename = md5($filename . uniqid()) . "." . $file->getClientOriginalExtension();
        $path = "/uploads/files/";

        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), '0755', true);
        }

        $content_type = $file->getMimeType();

        $file->move(public_path($path), $full_filename);

        $file = File::create([
            'author_id' => $user->id,
            'filename' => $filename,
            'path' => $path . $full_filename,
            'content_type' => $content_type,
        ]);

        return $file;
    }
}