<?php

namespace App\Http\Controllers;

use App\Services\ObjectStorageService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function showLogin() : View
    {
        return view('auth.login');
    }

    public function showRegister() : View
    {
        return view('auth.register');
    }

    public function showWelcome() : View
    {
        return view('welcome');
    }

    public function showHome() : View
    {
        $storageService = new ObjectStorageService();
        $bucket = 'my-bucket';
        $folder = request()->input('folder', '');

        $files = $storageService->listFiles($bucket, $folder ?? '');

        return view('home', compact('files', 'bucket', 'folder'));
    }
}
