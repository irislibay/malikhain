@extends('webLayout')

@section('content')

<div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1></span><a href="/home" style="color: #FEBE7E;">malikh<strong style="color: #FFEDBC;">ai</strong>n</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="/home" accesskey="1" title="">Homepage</a></li>
                    <li  class="current_page_item"><a href="/workshop" accesskey="2" title="">Workshop</a></li>
                    <li><a href="/Gallery" accesskey="3" title="">Gallery</a></li>
                    <li><a href="/ArtistPage" accesskey="4" title="">Featured Artists</a></li>
                    
                </ul>
            </div>

</div>


<div id="wrapper">
	<div id="featured-wrapper">
		<div id="featured" class="extra2 margin-btm container">
			<div class="main-title">
				<h2>Workshop</h2>
				<span class="byline">Explore and experience the wonders of Artificial Intelligence</span> </div>
			<div class="ebox1"> <span class="fa fa-picture-o"></span>
				<div class="title">
					<h2>Are you an artist?</h2>
					<span class="byline">Style-Content fusion with images</span> </div>
				<p> Upload your digital artwork (.jpg, .png) and fuse it with a classical Filipino painter's work </p>
				<a href="/workshop/ArtStyleFusion" class="button">Fuse my artwork!</a> </div>
			<div class="ebox2"><span class="fa fa-pencil"></span>
				<div class="title">
					<h2>Are you a poet?</h2>
					<span class="byline">Style-Content fusion with text</span> </div>
				<p>Upload your poetry (.txt) and fuse it with a classical Filipino poet's work</p>
				<a href="#" class="button">Fuse my poetry!</a> </div>
		</div>
		
	</div>
</div>


@endsection