<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\File;


class FileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        return response()->json($files);
    }
}
