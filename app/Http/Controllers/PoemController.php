<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File as FacadeFile;
use Carbon\Carbon;
use GuzzleHttp\Client as HttpClient;
use Throwable;


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
            return view('styletransferPoem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function store(Request $request)
    {
        $now = time();
        $name = $now.'.txt';
        $target_path = public_path('uploads/');

        if($request->has('submitFile')) {
            $validator = Validator::make($request->all(), [
                'poemTextFile' => 'required',
                'model' => 'required'
            ]);

            if($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $textFile = $request->file('poemTextFile');
            $textFile->move($target_path, $name);
        } else if($request->has('submitText')) {
            $validator = Validator::make($request->all(), [
                'poem' => 'required',
                'model' => 'required'
            ]);

            if($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $text = $request->input('poem');
            file_put_contents($target_path.$name, $text);
        } else {
            return back()->with("error", "Invalid submission");
        }
        $model = $request->model;
        

        $client = new HttpClient();
        set_time_limit(0);

        try {
            $result = $client->post(config('app.malikhain_flask_api_base_url') . '/gpt/files', [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($target_path.$name, 'r')
                    ]
                ]
            ]);
        } catch (Throwable $e) {
            Log::error($e);

            return back()->with("error", "Unable to upload file");
        }

        Poem::create([
            'filename' => $name,
            'model' => $model
        ]);

        $body = json_decode($result->getBody());
        $output = $body->text;

        return $request->has('submitFile')
            ? back()->with("successFile", "Poem uploaded successfully")->with("output", $output)
            : back()->with("success", "Poem uploaded successfully")->with("output", $output);
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
