@extends('layouts.web.index')

@section('styles')
    {{-- Separate CSS from app.css since not all pages are using particle.js --}}
    <link href="{{ mix('css/particles.css') }}" rel="stylesheet">
    <link href="css/loadAnim.css" rel="stylesheet">
    <style>
        /* HIDE RADIO */
        [type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
        cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
        outline: 2px solid #fff;
        -moz-outline-radius: 10px;
        }

        .img-fluid{
        border-radius: 10px;
        width: 300px;
        height: 300px;
        object-fit: cover;
        }
    </style>
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
                    <div class="card shadow bg-transparent border border-white text-white mb-5">
                        <div class="mt-4 text-center">
                            <div class="col-12 row m-auto">
                                <label class="col-3">
                                    Select Artist:
                                </label>
                                <select id="artistSelect" class="form-control form-control-sm col-5 offset-3">
                                    <option value="Pacita Abad">
                                        Pacita Abad
                                    </option>
                                    <option value="Manuel Baldemor">
                                        Manuel Baldemor
                                    </option>
                                    <option value="Juan Luna">
                                        Juan Luna
                                    </option>
                                    <option value="Ang Kiukok">
                                        Ang Kiukok
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow bg-transparent border border-white text-white mb-5">
                        <div class="mt-4 text-center">
                            <label class="col-12">
                                    Select Style:
                            </label>
                            <div class="row p-3">
                                <label class="col-6">
                                    <input type="radio" name="style_image" id="radio1" value="/styles/Pacita Abad/01.png" checked>
                                    <img class="img-fluid" id="image1" src="/styles/Pacita Abad/01.png">
                                </label>
                                <label class="col-6">
                                    <input type="radio" name="style_image" id="radio2" value="/styles/Pacita Abad/02.png">
                                    <img class="img-fluid" id="image2" src="/styles/Pacita Abad/02.png">
                                </label>
                            </div>
                            <div class="row p-3">
                                <label class="col-6">
                                    <input type="radio" name="style_image" id="radio3" value="/styles/Pacita Abad/03.png">
                                    <img class="img-fluid" id="image3" src="/styles/Pacita Abad/03.png">
                                </label>
                                <label class="col-6">
                                    <input type="radio" name="style_image" id="radio4" value="/styles/Pacita Abad/04.png">
                                    <img class="img-fluid" id="image4" src="/styles/Pacita Abad/04.png">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow bg-transparent border border-white text-white">
                        <div class="card-body bg-info">
                            <!-- print success message after file upload  -->
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                    @php
                                        Session::forget('success');
                                    @endphp
                                </div>
                            @endif

                            @if(Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                    @php
                                        Session::forget('error');
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
                                    class="form-control-file border border-white"
                                    accept="image/x-png,image/jpeg">
                                <span class="text-danger">
                                    {{ $errors->first('filename') }}
                                </span>
                            </div>

                        </div>

                        <div class="card-footer bg-transparent">
                            <div class="form-group mt-3">
                                @if(isset($message))
                                <div class="alert alert-warning" role="alert">
                                    {{ $message }}
                                </div>
                                @endif
                                <button id="fuseBtn" type="submit" class="btn btn-success btn-md">
                                    <span id="fuseBtnText" class="btn-text">Fuse my artwork!</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                                <div id="output-iteration" class="carousel slide" data-ride="carousel" style="border-radius: 10px; overflow: hidden; margin-bottom: 15px;">
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row text-dark text-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 m-auto">
                <div class="card shadow bg-transparent border border-white text-white mb-5">
                    <div class="card-footer bg-transparent">
                        <button class="dlimg btn btn-success btn-md">
                            Download
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

    <script src="js/FileSaver.js">
        let btnDownload = document.querySelector(".dlimg");

        btnDownload.addEventListener('click', () => {
            let imagePath = "{{ config('app.malikhain_flask_api_base_url').'/nst/files/' }}";
            let filename = "{{ $uploaded_filename }}-500.png";
            saveAs(imagePath, fileName);
        });
    </script>

    <script>
        let filename = "{{ $uploaded_filename }}";

        if (filename) {
            function buildCarousel(id,images){
                var html = $("#"+id).append('<ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a class="carousel-control-prev" href="#'+id+'" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#'+id+'" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>');
                let indicators = html.find('.carousel-indicators');
                let carousel = html.find('.carousel-inner')
                images.forEach((image, i)=>{
                    var activeclass = i === 0 ? "active":"";
                    indicators.append('<li data-target="#output-iteration" data-slide-to="'+i+'" class="'+activeclass+'"></li>');
                    carousel.append('<div class="carousel-item ' + activeclass + '"><img class="d-block w-100" src="' + image + '" alt="Slide"></div>');
                })
            }

            const images = [];

            for(let i = 0; i <= 500; i += 100){
                images.push(`{{ config('app.malikhain_flask_api_base_url').'/nst/files/' }}${filename}-${i}.png`);
            }

            buildCarousel("output-iteration", images)
        }

        $(document).ready(function() {
            $("#fuseBtn").on("click", function() {
                $(".spinner").removeClass("hide");
                $("#fuseBtnText").text("Generating image...");
                $("#fuseBtnText").attr("disabled", true);
            })
        })

        $('#artistSelect').change(function(){
            var folderName = $('#artistSelect option:selected').val();
            $('#radio1').attr('value', '/styles/'+folderName+'/01.png');
            $('#radio2').attr('value', '/styles/'+folderName+'/02.png');
            $('#radio3').attr('value', '/styles/'+folderName+'/03.png');
            $('#radio4').attr('value', '/styles/'+folderName+'/04.png');

            $('#image1').attr('src', '/styles/'+folderName+'/01.png');
            $('#image2').attr('src', '/styles/'+folderName+'/02.png');
            $('#image3').attr('src', '/styles/'+folderName+'/03.png');
            $('#image4').attr('src', '/styles/'+folderName+'/04.png');
        });
        // //----- jQuery Javascript---- //
        // // get the select box element and store it as '$selecBox'
        // var $selectbox = $("#aristSelect");
        // // get the image container and store it as '$imageContainer'
        // var $imagecontainer = $("#artPreview");
        // // get the current image selection
        // var selection = $selectbox.data("selected");

        // // listen for when the selection changes...
        // // when it does change, run our `changeImageSelection` function
        // $selectbox.on("change", changeImageSelection);

        // function changeImageSelection() {
        //     // change the `selection` variable to the selected option
        //     selection = $selectbox.val();
        //     // add a '.loading' class to the $imageContainer
        //     $imagecontainer.addClass("loading");
        //     // clear the $imageContainer's selected option
        //     $imagecontainer[0].dataset.selected = null;

        //     // set a timout of 1.5 seconds
        //     setTimeout(function() {
        //         // remove the '.loading' class from $imageContainer
        //         $imagecontainer.removeClass("loading");
        //         // add the currently selected option to $imageContainer
        //         $imagecontainer[0].dataset.selected = selection;
        //     }, 1500);
        // }
    </script>

    {{-- Particles JS --}}
    <script src="{{ asset('js/particles.js') }}"></script>
@endsection
