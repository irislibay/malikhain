@extends('galleryLayout')

@section('content')

<div id="featured-wrapper">
	<div id="featured" class="extra2 margin-btm tray">
		<div class="main-title" data-aos="fade-up" data-aos-duration="2000">
			<h2>Exhibit</h2>
				<span class="byline" style="color: white; font-family: 'Major Mono Display', cursive">Style-content-fused works using artificial intelligence</span>
		</div>

        @foreach($images as $image)
            <figure class="wiggly wiggle2">
                <img src="/output/{{ $image }}" />
            </figure>
        @endforeach

        @foreach($poems as $poem)
            <figure class="wiggly wiggle2">
                {!! $poem  !!}
            </figure>
        @endforeach
	</div>
</div>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script>
		function type($target) {
		//stop typing when hover is off//
		if ($target.Stop) {
			return;
		}
		if ($target.index < $target.caption.length) {
			$target.text($target.text() + $target.caption.charAt($target.index));

			$target.index++;

			setTimeout(function() {
			type($target);
			}, 50);
		}
		}
		$(document).ready(function() {
		var $figures = $(".wiggly");
		$figures.each(function() {
			let $figure = $(this);

			let $caption = $figure.find("figcaption");

			$caption.caption = $caption.text();
			$caption.index = 0;
			$caption.text("");
			$caption.Stop = false;
			let $img = $figure.find("img");
			$figure.hover(
			function(e) {
				$caption.Stop = false;
				type($caption);
			},
			function() {
				$caption.Stop = true;
				$caption.text("");
				$caption.index = 0;
			}
			);
		});
		});
  </script>

@endsection

