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
    // public function download($fileName): BinaryFileResponse
    // {
    //     $fileName = base64_decode($fileName);
    //     $folderName = strstr($fileName, '/', true);
    //     $downloadPath = substr($fileName, strlen($folderName.'/'));
    //     $filePath = storage_path('app/public/'.$folderName.'/'.$downloadPath);
    //     if (file_exists($filePath)) {
    //         return response()->download($filePath, $downloadPath);
    //     } else {
    //         return redirect()->back()->withStatus(__('File not found'));
    //     }
    // }
    public function download($encodedPath): BinaryFileResponse
    {
        $filePath = base64_decode($encodedPath);
        $pathParts = collect(explode('/', $filePath));
        $fileName = $pathParts->pop();
        $folderName = $pathParts->implode('/');

        $fullPath = storage_path('app/public/' . $folderName . '/' . $fileName);

        if (file_exists($fullPath)) {
            return response()->download($fullPath, $fileName);
        } else {
            return redirect()->back()->withStatus(__('File not found'));
        }
    }
    public function jsonImageDelete($model, $id, $key,$column): RedirectResponse
    {
        if (class_exists("App\Models\\".$model)) {
            $modelClass = "App\Models\\" . $model;
            $data = $modelClass::findOrFail($id);
            $files = json_decode($data->$column, true);

            if (isset($files[$key])) {
                $filePathToDelete = $files[$key];
                unset($files[$key]);
                $data->$column = json_encode($files);
                $data->save();
                $this->fileDelete($filePathToDelete);
                return redirect()->back()->withStatus(__('Image deleted successfully.'));
            }
        } else {
            return redirect()->back()->withStatus(__('Table not found.'));
        }
    }
}
