@extends('layouts.web.index')

@section('styles')
    {{-- Separate CSS from app.css since not all pages are using particle.js --}}
    <link href="{{ mix('css/particles.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container text-white my-5">

        <div class="text-center mb-5"
            data-aos="fade-up"
            data-aos-duration="2000">
            <p class="display-3 drop-shadow font-weight-bold"
                style="font-family: 'Megrim', cursive;">
                Workshop
            </p>
            <p class="h3"
                style="font-family: 'Major Mono Display', cursive">
                Explore and experience the wonders of Artificial Intelligence
            </p>
        </div>

        <div class="row text-center pt-5">
            <div class="col border-right"
                data-aos="zoom-in">

                <span class="material-icons md-72 text-malikhain-yellow">
                    crop_original
                </span>

                <p class="h2 drop-shadow mt-5"
                    style="font-family: 'Megrim', cursive">
                    Are you an artist?
                </p>

                <p class="mb-5"
                    style="font-family: 'Major Mono Display', cursive;">
                    Style-Content fusion with images
                </p>

                <p>
                    Upload your digital artwork (.jpg, .png) and fuse it with a classical Filipino painter's work
                </p>

                <a href="/workshop/styletransferArt"
                    class="btn">
                    Fuse my artwork!
                </a>

            </div>
            <div class="col border-left"
                data-aos="zoom-in-up">

                <span class="material-icons md-72 text-malikhain-yellow">
                    edit
                </span>

                <p class="h2 drop-shadow mt-5"
                    style="font-family: 'Megrim', cursive">
                    Are you a poet?
                </p>

                <p class="mb-5"
                    style="font-family: 'Major Mono Display', cursive;">
                    Style-Content fusion with text
                </p>

                <p class="mb-5">
                    Upload your poetry (.txt) and fuse it with a classical Filipino poet's work
                </p>

                <a href="/workshop/styletransferPoem" class="btn">
                    Fuse my poem!
                </a>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    {{-- Particles JS --}}
    <script src="{{ asset('js/particles.js') }}"></script>

    <script>
        const minuteInSeconds = 60;
        setInterval(function () {
            axios.get('/api/files')
                .then(res => {
                    const files = res.data;
                    let html = '';

                    for (const file of files) {
                        console.log(file);
                        html += '<div class="form-group">' +
                            '<label for="filename">'+ `${file.filename}` + '</label>' +
                            '<div class="progress">' +
                            '<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>' +
                            '</div>' +
                            '</div>';
                    }

                    $('#processing-files').html(html);
                })
        }, 1000 * minuteInSeconds * 2)
    </script>

@endsection
