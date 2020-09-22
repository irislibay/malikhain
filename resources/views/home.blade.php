@extends('layouts.web.index')

@section('content')
    <div class="container">
        <div class="row border-bottom mt-5 pb-5">
            <div class="col p-4">
                <div class="text-white text-right" data-aos="zoom-in-up" >

                    <p class="drop-shadow h1 font-weight-bold"
                        data-aos="fade-up"
                        data-aos-duration="2000"
                        style="font-family: 'Major Mono Display', cursive">
                        Bridging the world of art and technology.
                    </p>

                    <p class="h3 mt-3" data-aos="flip-left">
                        Welcome, young artist!
                    </p>

                    <p class="h5 mt-3" data-aos="flip-up">
                        <strong class=" h4 text-white font-weight-light" style="font-family: 'Megrim', cursive">malikhain</strong> is an Artificial Intelligence that fuses your own masterpiece
                    </p>

                    <p class="h5 mt-3" data-aos="flip-up">
                        and a classic Filipino artist's masterpiece using Artificial Intelligence.
                    </p>

                    <a href="{{ route('workshop') }}"
                        class="btn btn-sm border-round p-4 m-3 text-white rounded">
                        I want to try!
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
