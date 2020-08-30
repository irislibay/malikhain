<div id="particles-js" style="width: 100%; margin: 0; padding: 0;"></div>
@extends('webLayout')

@section('content')

<div id="wrapper">
	<div id="featured-wrapper">
		<div id="featured" class="extra2 margin-btm tray">
			<div class="main-title" data-aos="fade-up" data-aos-duration="2000">
                <h2>Poem Style Fusion</h2>
                    <span class="byline" style="color: white; font-family: 'Major Mono Display', cursive">Style-content-fused works using artificial intelligence</span>
            </div>
                <div class="featured">
                    <form action="{{ route('poem.store') }}" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card col-12 mb-5 bg-transparent border border-white">
                                    <div class="card-body text-white">
                                        <div class="row">
                                            <img src="https://www.sardiniauniqueproperties.com/wp-content/uploads/2015/10/Square-Profile-Pic-1.jpg" class="col-3 rounded float-left border border-white" alt="...">
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
                                            <p class="text-left text-white">Type in your poem here:</p>
                                                @if(Session::has('success'))
                                                    <div class="alert alert-success">
                                                        {!! Session::get('success') !!}
                                                        @php
                                                            Session::forget('success');
                                                        @endphp
                                                    </div>
                                                @endif
                                                <div class="form-group" {{ $errors->has('poem') ? 'has-error' : '' }}>
                                                    <textarea class="form-control" id="poem" name="poem" style="resize:none" rows="15"></textarea>
                                                    <span class="text-danger"> {{ $errors->first('poem') }}</span>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-sm"> Fuse File </button>
                                                    <button type="submit" class="btn btn-success btn-sm"> Fuse Text </button>
                                                </div>
                                                {{ csrf_field() }}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <form>
                                    <div class="card col-12 mb-5 bg-transparent border border-white">
                                        <div class="card-body text-white">
                                            <textarea readonly class="form-control" id="poemOutput" name="poemOutput" style="resize:none" rows="35">
                                            @if(Session::has('success'))
                                            {{ $output }}
                                            @else
                                            output goes here
                                            @endif
                                            </textarea>
                                            <div class="row">
                                                <div class="offset-4">
                                                    <button class="btn btn-success btn-sm">Profile</button>
                                                    <button class="btn btn-success btn-sm">Download</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>

		</div>
	</div>
</div>


<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<script>
	particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#f8c390"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":6},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"grab"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;

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

// ----- Plain Javascipt ---- //
// const selectbox = document.getElementById("selectbox");
// const imagecontainer = document.querySelector(".images");
// let selection = selectbox.dataset.selected;

// selectbox.addEventListener("change", e => {
//   selection = selectbox.value;
//   imagecontainer.classList.add("loading");
//   imagecontainer.dataset.selected = "";

//   setTimeout(() => {
//     imagecontainer.classList.remove("loading");
//     imagecontainer.dataset.selected = selection;
//   }, 1500);
// });

</script>
@endsection

