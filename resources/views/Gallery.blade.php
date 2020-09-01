@extends('layouts.web.index')

@section('content')

	<div class="my-5">
        <div class="text-white text-center mb-5"
            data-aos="fade-up"
            data-aos-duration="2000">
            <p class="display-4 drop-shadow font-weight-bold"
                style="font-family: 'Megrim', cursive;">
                Exhibit
            </p>
            <span class="h3"
                style="font-family: 'Major Mono Display', cursive">
                Style-content-fused works using artificial intelligence
            </span>
		</div>

		<div id="card" class="border-bottom pb-5">
			<div class="content">
				@foreach($images as $image)
					<a class="card" href="#!">
                        <div class="front"
                            style="background-image: url(/output_image/{{ $image }})">
						</div>
						<div class="back">
							<div>
								<p>//image here//</p>
								<p>Who is //artist name here// </p>
								<button class="button">Know more</button>
							</div>
						</div>
					</a>
				@endforeach

				@foreach($poems as $poem)
					<a class="card" href="#!">
						<div class="front overflow-auto">
							<pre class="text-dark mt-5">
								{!! $poem  !!}
							</pre>
						</div>
						<div class="back">
							<div>
								<p>//book image here//</p>
								<p>Who is //artist name here// </p>
								<button class="button">Know more</button>
							</div>
						</div>
					</a>

				@endforeach
			</div>
		</div>
	</div>

@endsection
