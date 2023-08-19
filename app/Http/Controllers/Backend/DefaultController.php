<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DefaultController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }
    public function download($fileName): BinaryFileResponse
    {
        $fileName = base64_decode($fileName);
        $folderName = strstr($fileName, '/', true);
        $downloadPath = substr($fileName, strlen($folderName.'/'));
        $filePath = storage_path('app/public/'.$folderName.'/'.$downloadPath);
        if (file_exists($filePath)) {
            return response()->download($filePath, $downloadPath);
        } else {
            return redirect()->back()->withStatus(__('File not found'));
        }
    }
}
