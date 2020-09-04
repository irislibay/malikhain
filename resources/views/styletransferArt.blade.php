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
                Art Style Fusion
            </p>
            <p class="h2"
                style="font-family: 'Major Mono Display', cursive">
                Fuse your artwork with a Classic Filipino artist's work
            </p>
        </div>

        <form class="pt-5"
            action="{{ route('file.store') }}"
            method="post"
            enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="row text-dark text-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                    <div class="card shadow">
                        <div class="card-body">

                            <!-- print success message after file upload  -->
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            <div class="form-group" {{ $errors->has('filename') ? 'has-error' : '' }}>
                                <label class="my-3" for="filename">
                                    Upload your artwork (.jpeg, .jpg, .png)
                                </label>
                                <input type="file"
                                    name="filename"
                                    id="filename"
                                    class="form-control my-3">
                                <span class="text-danger">
                                    {{ $errors->first('filename') }}
                                </span>
                            </div>
                            <div class="mt-5">
                                <label>
                                    Select Style
                                </label>
                                <select>

                                    <option value="styles/style-pacitaabad.jpg">
                                        Pacita Abad
                                    </option>

                                    <option value="styles/style-filipinofamily-baldemor.jpg">
                                        Manuel Baldemor
                                    </option>

                                    <option value="styles/style-spolarium-juanluna.jpg">
                                        Juan Luna
                                    </option>

                                    <option value="styles/style-amorsolo-1.jpg">
                                        Fernando Amorsolo
                                    </option>

                                </select>
                            </div>
                        </div>

                        <div class="card-footer bg-transparent">
                            <div class="form-group mt-3">
                                <button type="submit"
                                    class="btn btn-success btn-md">
                                    Fuse my artwork!
                                </button>
                            </div>
                        </div>

                    </div>
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
