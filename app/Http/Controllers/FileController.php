<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File as FacadeFile;
use App\Jobs\ProcessImage;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poems_path = public_path('output_poem');
        $poem_files = FacadeFile::files($poems_path);
        $poems = array();

        foreach($poem_files as $poem) {
            $poem = pathinfo($poem);
            $content = FacadeFile::get('output_poem/'.$poem['basename']);
            array_push($poems, $content);
        }

        $images_path = public_path('output_image');
        $image_files = FacadeFile::files($images_path);
        $images = array();

        foreach($image_files as $image) {
            $image = pathinfo($image);
            array_push($images, $image['basename']);
        }

        return view('Gallery', ['images' => $images, 'poems' => $poems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all();

        return view('styletransferArt', ['files' => $files]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['filename' => 'required|mimes:jpeg,png,jpg,bmp|max:2048', 'style_image' => 'required']);

        if($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        if($file = $request->file('filename')) {
            $name = time().time().'.'.$file->getClientOriginalExtension();

            $target_path = public_path('/uploads/');

            if($file->move($target_path, $name)) {
                $style_image = $request->get('style_image');

                ProcessImage::dispatch($name, $file->getClientOriginalName(), $style_image);

                return back()->with("success", "File uploaded successfully");
            }
        }

        return back()->with("success", "File uploaded successfully");
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
