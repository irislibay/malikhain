<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File as FacadeFile;
use Carbon\Carbon;


class PoemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'poem' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $text = $request->input('poem');

        Log::info($text);

        $process = new Process(['../scripts/venv/bin/python', '../scripts/gpt/main.py', $text]);
        $process->setTimeout(3600);
        $process->setIdleTimeout(3600);
        $process->run();

        if (!$process->isSuccessful()) {
            Log::error(new ProcessFailedException($process));
            return back()->withErrors(['poem' => 'Unable to upload poem']);
        }

        $output = $process->getOutput();
        Log::info($output);
        $current_timestamp = Carbon::now()->timestamp;
        FacadeFile::put('output_poem/'.$current_timestamp.'.txt',$output);

        return back()->with("success", "Poem uploaded successfully", $output);
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
