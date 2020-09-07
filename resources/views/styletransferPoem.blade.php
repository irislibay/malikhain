@extends('layouts.web.index')

@section('styles')
    {{-- Separate CSS from app.css since not all pages are using particle.js --}}
    <link href="{{ mix('css/particles.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container text-white mb-5">
        <div class="text-center my-5"
            data-aos="fade-up"
            data-aos-duration="2000">
            <p class="display-3 drop-shadow font-weight-bold"
                style="font-family: 'Megrim', cursive;">
                Poem Style Fusion
            </p>
            <p class="h2"
                style="font-family: 'Major Mono Display', cursive">
                Style-content-fused works using artificial intelligence
            </p>
        </div>

        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card col-12 mb-5 bg-transparent border border-white">
                    <div class="card-body text-white">
                        <div class="row">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Self_portrait_of_F%C3%A9lix_Resurrecci%C3%B3n_Hidalgo.jpg/330px-Self_portrait_of_F%C3%A9lix_Resurrecci%C3%B3n_Hidalgo.jpg"
                                class="col-3 rounded float-left border border-white"
                                style="object-fit: cover;">
                            <div class="col-9">
                                <br>
                                <select class="form-control form-control-sm">
                                    <option>Francisco Balagtas</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow bg-transparent border border-white">
                    <form action="{{ route('poem.store') }}"
                        method="post"
                        enctype="multipart/form-data">
                        <div class="form-group" {{ $errors->has('poemFile') ? 'has-error' : '' }}>
                            <div class="card-header bg-info text-white text-center" color="#F3EEC3">
                                <p class="text-left">Choose a text file:</p>
                                @if(Session::has('successFile'))
                                <div class="alert alert-success">
                                    {!! Session::get('successFile') !!}
                                    @php
                                        Session::forget('successFile');
                                    @endphp
                                </div>
                                @endif
                                <input type="file" class="form-control-file border border-white" name ="poemTextFile" id="poemTextFile" accept=".txt">
                                <span class="text-danger">
                                    {{ $errors->first('poemFile') }}
                                </span>
                                <button type="submit" name="submitFile" id="submitFile"
                                    class="btn btn-success btn-sm my-4">
                                    Fuse File
                                </button>
                            </div>
                        </div>
                        <div class="col-12 m-auto">
                            <div class="row">
                                <div class="col-5"><hr class="bg-white"></div>
                                <div class="col-2 text-white">OR</div>
                                <div class="col-5"><hr class="bg-white"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-left text-white">
                                Type in your poem here:
                            </p>

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {!! Session::get('success') !!}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            <div class="form-group" {{ $errors->has('poem') ? 'has-error' : '' }}>
                                <textarea class="form-control" id="poem" name="poem" style="resize:none" rows="15">@if(Session::has('inputPoem'))
                                {!! Session::get('inputPoem') !!}
                                @php
                                    Session::forget('inputPoem');
                                @endphp
                            @endif</textarea>
                                <span class="text-danger">
                                    {{ $errors->first('poem') }}
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group text-center">
                                <button type="submit" name="submitText" id="submitText"
                                    class="btn btn-success btn-sm">
                                    Fuse Text
                                </button>
                            </div>
                            {{ csrf_field() }}
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card col-12 mb-5 bg-transparent border border-white">
                    <div class="card-body text-white">
                        <div class="col-12 bg-light border border-white text-dark text-left overflow-auto"
                            style="height: 50em;">
                            <div id="output">@if(Session::has('output'))
                                {!! Session::get('output') !!}
                                @php
                                    Session::forget('output');
                                @endphp
                            @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col"></div>
                            <a href="#link" class="btn btn-success btn-sm" role="button">Profile</a>
                            <button onclick="download()" class="col btn btn-success btn-sm" id="downloadLink">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    {{-- Particles JS --}}
    <script src="{{ asset('js/particles.js') }}"></script>

    <script>
        //----- jQuery Javascript---- //
        // get the select box element and store it as '$selecBox'
        var $selectbox = $("#selectbox");
        // get the image container and store it as '$imageContainer'
        var $imagecontainer = $(".images");
        // get the current image selection
        var selection = $selectbox.data("selected");

        // listen for when the selection changes...
        // when it does change, run our `changeImageSelection` function
        $selectbox.on("change", changeImageSelection);

        function changeImageSelection() {
        // change the `selection` variable to the selected option
        selection = $selectbox.val();
        // add a '.loading' class to the $imageContainer
        $imagecontainer.addClass("loading");
        // clear the $imageContainer's selected option
        $imagecontainer[0].dataset.selected = null;

        // set a timout of 1.5 seconds
        setTimeout(function() {
            // remove the '.loading' class from $imageContainer
            $imagecontainer.removeClass("loading");
            // add the currently selected option to $imageContainer
            $imagecontainer[0].dataset.selected = selection;
        }, 1500);
        }

        function download() {
            var a = document.body.appendChild(
               document.createElement("a")
            );
        //    const regex = /(< ?br ?>)/g;
           a.download = "newfile.txt";
           const text = document.getElementById("output").innerHTML.replaceAll("<br>", "\n");
           a.href = "data:text/html," + text;
           a.click(); //Trigger a click on the element
        }
    </script>

@endsection
