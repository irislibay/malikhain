@extends('webLayout')

@section('content')



<div id="wrapper">
	<div id="featured-wrapper">
		<div id="featured" class="extra2 margin-btm tray">
			<div class="main-title" data-aos="fade-up" data-aos-duration="2000">
				<h2>Workshop</h2>
				<span class="byline">Explore and experience the wonders of Artificial Intelligence</span> </div>
			<div class="ebox1" data-aos="zoom-in"> <span class="fa fa-picture-o"></span>
				<div class="title">
					<h2>Are you an artist?</h2>
					<span class="byline">Style-Content fusion with images</span> </div>
				<p> Upload your digital artwork (.jpg, .png) and fuse it with a classical Filipino painter's work </p>
				<a href="/workshop/styletransferArt" class="btn">Fuse my artwork!</a> </div>
			<div class="ebox2" data-aos="zoom-in-up"><span class="fa fa-pencil"></span>
				<div class="title">
					<h2>Are you a poet?</h2>
					<span class="byline">Style-Content fusion with text</span> </div>
				<p>Upload your poetry (.txt) and fuse it with a classical Filipino poet's work</p>
				<a href="/workshop/styletransferPoem" class="btn">Fuse my poem!</a> </div>
		</div>
	</div>
</div>


@endsection