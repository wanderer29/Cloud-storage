<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Services\ObjectStorageService;

class FileController extends Controller
{
    public function upload(UploadRequest $request)
    {
        $storageService = new ObjectStorageService();

        $bucket = $request->input('bucket');
        $folder = $request->input('folder');
        $files = $request->file('files');

        foreach ($files as $file) {
            $filePath = $folder . $file->getClientOriginalName();
            $result = $storageService->uploadFile($filePath, $file->getPathname());

            if (!$result) {
                return redirect()->back()->with('error', "Error uploading file: {$file->getClientOriginalName()}");
            }
        }

        return redirect()->back()->with('success', 'Files uploaded successfully!');
    }
}
