<?php

namespace App\Services;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class FileUploaderService
{
    protected $user;

    /**
     * FileUploaderService constructor.
     * @param User $user
     * @param Request $request
     */
    public function __construct(User $user, Request $request)
    {
        $this->user = $user;
        $this->request = $request;
    }

    /**
     * @return File|array|\Illuminate\Http\UploadedFile|null
     */
    public function upload()
    {
        $file = $this->request->file('file');

        $filename =  $file->getClientOriginalName();
        $full_filename = md5($filename . uniqid()) . "." . $file->getClientOriginalExtension();
        $path = "/uploads/files/";

        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), '0755', true);
        }

        $content_type = $file->getMimeType();

        $file->move(public_path($path), $full_filename);

        /** @var File $file */
        $file = File::create([
            'author_id' => $this->user->id,
            'filename' => $filename,
            'path' => $path . $full_filename,
            'content_type' => $content_type,
        ]);

        return $file;
    }
}
