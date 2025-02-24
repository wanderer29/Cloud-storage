<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ObjectStorageService
{
    /**
     * Uploading file by filePath into bucket
     *
     * @param string $key
     * @param string $filePath
     * @return bool
     */
    public function uploadFile(string $key, string $filePath): bool
    {
        try {
            $disk = Storage::disk('minio');
            $disk->put("{$key}", file_get_contents($filePath));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Removing file from bucket by key
     *
     * @param string $bucket
     * @param string $key
     * @return bool
     */
    public function deleteFile(string $bucket, string $key): bool
    {
        try {
            $disk = Storage::disk('minio');
            $disk->delete("{$bucket}/{$key}");
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function listFiles(string $bucket, string $folder): array
    {
        $disk = Storage::disk('minio');

        $files =  $disk->files("{$bucket}/{$folder}");

        return array_map(function ($file) use ($bucket) {
            return [
                'basename' => basename($file),
                'path' => $file,
            ];
        }, $files);
    }
}
