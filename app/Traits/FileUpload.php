<?php

namespace App\Traits;

use App\Services\FileUploaderService;

trait FileUpload
{
    /**
     * @return mixed
     */
    public function uploadFile()
    {
        return app(FileUploaderService::class)->upload();
    }
}
