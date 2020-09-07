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
        //
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
        if($request->has('submitFile')){
            $validator = Validator::make($request->all(), [
                'poemTextFile' => 'required'
            ]);

            if($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $text = file_get_contents($request->file('poemTextFile'));
        } else if($request->has('submitText')) {
            $validator = Validator::make($request->all(), [
                'poem' => 'required'
            ]);

            if($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $text = $request->input('poem');
        }

//        Log::info($text);

        $client = new HttpClient();

        try {
            $result = $client->post(config('app.malikhain_flask_api_base_url').'/gpt/text', [
                'json' => [
                    'text' => $text
                ]
            ]);
        } catch (Throwable $e) {
            Log::error($e);

            return $request->has('submitFile')
                ? back()->with("errorFile", "Unable to upload file")
                : back()->with("error", "Unable to read text");
        }

        $body = json_decode($result->getBody());
        $output = $body->text;

//        Log::info($output);

        $current_timestamp = Carbon::now()->timestamp;
        FacadeFile::put('output_poem/'.$current_timestamp.'.txt', $output);

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
