<div id="particles-js"></div>

@extends('layouts.web.index')

@section('content')

    <div class="text-white my-5">

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
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#f8c390"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":6},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"grab"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
    </script>
@endsection
