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
                    Are you interested in art?
                </p>

                <p class="mb-5"
                    style="font-family: 'Major Mono Display', cursive;">
                    Style-Content fusion with images
                </p>

                <p>
                    Upload your digital artwork (.jpg, .png) and fuse it with a Filipino master painter's work
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
                    Are you interested in poetry?
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

@endsection
