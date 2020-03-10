@extends('webLayout')

@section('content')

<!-- 
<div id="header-wrapper" class= "container">
      <div id="header" class="container">

		<input type="radio" id="trigger1" name="slider">
		<label for="trigger1"></label>
		<div class="slide bg1"></div>

		<input type="radio" id="trigger2" name="slider" checked autofocus>
		<label for="trigger2"></label>
		<div class="slide bg2"></div>

		<input type="radio" id="trigger3" name="slider">
		<label for="trigger3"></label>
		<div class="slide bg3"></div>

		<input type="radio" id="trigger4" name="slider">
		<label for="trigger4"></label>
		<div class="slide bg4"></div>

		<input type="radio" id="trigger5" name="slider">
		<label for="trigger5"></label>
		<div class="slide bg5"></div>

		<a target="_blank" href="https://twitter.com/kamildyrek"><svg style="width:2em;height:2em;position:fixed;top:1em;left:1em;opacity:.8;" viewBox="0 0 24 24"><path fill="#fff" d="M17.71,9.33C18.19,8.93 18.75,8.45 19,7.92C18.59,8.13 18.1,8.26 17.56,8.33C18.06,7.97 18.47,7.5 18.68,6.86C18.16,7.14 17.63,7.38 16.97,7.5C15.42,5.63 11.71,7.15 12.37,9.95C9.76,9.79 8.17,8.61 6.85,7.16C6.1,8.38 6.75,10.23 7.64,10.74C7.18,10.71 6.83,10.57 6.5,10.41C6.54,11.95 7.39,12.69 8.58,13.09C8.22,13.16 7.82,13.18 7.44,13.12C7.81,14.19 8.58,14.86 9.9,15C9,15.76 7.34,16.29 6,16.08C7.15,16.81 8.46,17.39 10.28,17.31C14.69,17.11 17.64,13.95 17.71,9.33M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2Z" /></svg></a>

</div> -->

<div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1></span><a href="/home" style="color: #FEBE7E;">malikh<strong style="color: #FFEDBC;">ai</strong>n</a></h1>
            </div>
            <div id="menu">
                <ul>
                    <li class="current_page_item"><a href="/home" accesskey="1" title="">Home</a></li>
                    <li><a href="/workshop" accesskey="2" title="">Workshop</a></li>
                    <li><a href="/Gallery" accesskey="3" title="">Gallery</a></li>
                    <li><a href="/ArtistPage" accesskey="4" title="">Featured Artists</a></li>
                    
                </ul>
            </div>

    </div>

<div id = "gal">
                <input type="radio" id="trigger1" name="slider">
                <label for="trigger1"></label>
                <div class="slide bg1"></div>

                <input type="radio" id="trigger2" name="slider" checked autofocus>
                <label for="trigger2"></label>
                <div class="slide bg2"></div>

                <input type="radio" id="trigger3" name="slider">
                <label for="trigger3"></label>
                <div class="slide bg3"></div>

                <input type="radio" id="trigger4" name="slider">
                <label for="trigger4"></label>
                <div class="slide bg4"></div>

                <input type="radio" id="trigger5" name="slider">
                <label for="trigger5"></label>
                <div class="slide bg5"></div>

          
             </div>
<div id="wel" style= "background-color: #FFEDBC">

	<div class="container">
		<h2>Bridging the world of art and technology.</h2>
        <p style="font-size: 27px">Welcome to malikhain, young artist!</p>
        <p style="font-size: 27px"><strong>malikhain</strong> is a web application that creates a fusion of your own masterpiece and a
        classic Filipino artist's masterpiece using Deep Artificial Networks.</p>
		<a href="/workshop" class="button">I want to try!</a> </div>
</div>



@endsection