<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File as FacadeFile;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all the images
        $files  =   File::all();
        return view('Gallery',['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // file validation
        $validator = Validator::make($request->all(), ['filename' => 'required|mimes:jpeg,png,jpg,bmp|max:2048']);

        // if validation fails
        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // if validation success
        if($file = $request->file('filename')) {
            $name = time().time().'.'.$file->getClientOriginalExtension();

            $target_path = public_path('/uploads/');

            if($file->move($target_path, $name)) {
                $file_path = $target_path.$name;

                $process = new Process(['../scripts/venv/bin/python', '../scripts/neural_style.py', $file_path]);
                $process->setTimeout(3600);
                $process->setIdleTimeout(3600);
                $process->run();

                // executes after the command finishes
                if (!$process->isSuccessful()) {
                    FacadeFile::delete($file_path);
                    throw new ProcessFailedException($process);
                }

                // save file name in the database
                $file = File::create(['filename' => $name]);

                return back()->with("success", $process->getOutput());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
