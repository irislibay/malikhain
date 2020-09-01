@extends('layouts.web.index')

@section('styles')
    {{-- Separate CSS from app.css since not all pages are using particle.js --}}
    <link href="{{ mix('css/particles.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="text-white mb-5">

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

        <form action="{{ route('poem.store') }}"
            method="post"
            enctype="multipart/form-data">

            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card col-12 mb-5 bg-transparent border border-white">
                        <div class="card-body text-white">
                            <div class="row">
                                <img src="https://www.sardiniauniqueproperties.com/wp-content/uploads/2015/10/Square-Profile-Pic-1.jpg"
                                    class="col-3 rounded float-left border border-white"
                                    alt="...">
                                <div class="col-9">
                                    <br>
                                    <select class="form-control form-control-sm">
                                        <option>Large select 1</option>
                                        <option>Large select 2</option>
                                        <option>Large select 3</option>
                                        <option>Large select 4</option>
                                        <option>Large select 5</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow bg-transparent border border-white">
                        {{-- TODO: What is this other form for? --}}
                        <form>
                            <div class="form-group">
                                <div class="card-header bg-info text-white" color="#F3EEC3">
                                    <p class="text-left">Choose a text file:</p>
                                    <input type="file" class="form-control-file border border-white" id="poemTextFile" accept=".txt">
                                </div>
                                <div class="col-12 m-auto">
                                    <br>
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
                                        <textarea class="form-control"
                                            id="poem"
                                            name="poem"
                                            style="resize:none"
                                            rows="15">
                                        </textarea>
                                        <span class="text-danger">
                                            {{ $errors->first('poem') }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-group text-center">
                                        <button type="submit"
                                            class="btn btn-success btn-sm mr-2">
                                            Fuse File
                                        </button>
                                        <button type="submit"
                                            class="btn btn-success btn-sm">
                                            Fuse Text
                                        </button>
                                    </div>
                                    {{ csrf_field() }}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    {{-- TODO: What is this form for? --}}
                    <form>
                        <div class="card col-12 mb-5 bg-transparent border border-white">
                            <div class="card-body text-white">
                                <div class="col-12 bg-light border border-white text-dark text-left overflow-auto"
                                    style="height: 50em;">

                                    @if(Session::has('output'))
                                        {!! Session::get('output') !!}
                                        @php
                                            Session::forget('output');
                                        @endphp
                                    @endif

                                </div>
                                <div class="row mt-3">
                                    <div class="col"></div>
                                    <button class="col btn btn-success btn-sm mr-2">
                                        Profile
                                    </button>
                                    <button class="col btn btn-success btn-sm">
                                        Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </form>
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
    </script>

@endsection
