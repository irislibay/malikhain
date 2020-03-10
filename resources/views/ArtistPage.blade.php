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
                    <li><a href="/workshop" accesskey="2" title="">Workshop</a></li>
                    <li><a href="/Gallery" accesskey="3" title="">Gallery</a></li>
                    <li class="current_page_item"><a href="/ArtistPage" accesskey="4" title="">Featured Artists</a></li>
                    
                </ul>
            </div>

    </div>

<div id="wrapper">
	<div id="featured-wrapper">
		<div id="featured" class="extra2 margin-btm container">
			<div class="main-title">
				<h2>Featured Artists</h2>
				<span class="byline">Meet our classic Filipino Artists!</span> </div>
		</div>
		
	</div>
</div>
        
@endsection