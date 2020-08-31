<div id="particles-js"></div>
@extends('layouts.web.index')

@section('content')
<div class="text-white mb-5">
	<div class="text-center my-5" data-aos="fade-up" data-aos-duration="2000">
		<p class="display-3 drop-shadow font-weight-bold" style="font-family: 'Megrim', cursive;">Art Style Fusion</p>
		<p class="h2" style="font-family: 'Major Mono Display', cursive">Fuse your artwork with a Classic Filipino artist's work</p>
	</div>
		<form class="pt-5" action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
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
									<label class="my-3" for="filename">Upload your artwork (.jpeg, .jpg, .png)</label>
									<input type="file" name="filename" id="filename" class="form-control my-3">
									<span class="text-danger"> {{ $errors->first('filename') }}</span>
								</div>
								<div class="mt-5">
									<label>Select Style</label>
									<select>
										<option value="styles/style-pacitaabad.jpg">Pacita Abad</option>
										<option value="styles/style-filipinofamily-baldemor.jpg">Manuel Baldemor</option>
										<option value="styles/style-spolarium-juanluna.jpg">Juan Luna</option>
										<option value="styles/style-amorsolo-1.jpg">Fernando Amorsolo</option>
									</select>
								</div>
						</div>
						<div class="card-footer bg-transparent">
							<div class="form-group mt-3">
								<button type="submit" class="btn btn-success btn-md"> Fuse my artwork! </button>
							</div>
							{{ csrf_field() }}
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>


<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
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

	particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#f8c390"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":6},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"grab"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats(); stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;

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
