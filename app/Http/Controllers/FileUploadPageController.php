<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadPageController extends Controller
{
    public function showFileUploadPage()
    {
        return view('fileUpload.file-upload-page');
    }
}
