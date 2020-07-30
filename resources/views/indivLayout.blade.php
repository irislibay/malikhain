<html>
    <head>
    <link rel = "stylesheet" href="{{ mix('/css/app.css')  }}" />
    <link href="/css/indivArtistpage.css" rel="stylesheet"/>
    <link href="/css/default.css" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body>

        <div id="header-wrapper">
            <div id="header" class="tray">
                <div id="logo">
                    <h1></span><a href="/home" style="color: #FEBE7E;">malikh<strong style="color: #FFEDBC;">ai</strong>n</a></h1>
                </div>
                <div id="menu">
                    <ul>
                        <li class="{{Request::path() === '/' ? 'current_page_item' : ''}}"><a href="/home" accesskey="1" title="">Home</a></li>
                        <li class="{{Request::path() === 'workshop' ? 'current_page_item' : ''}}"><a href="/workshop" accesskey="2" title="">Workshop</a></li>
                        <li class="{{Request::path() === 'Gallery' ? 'current_page_item' : ''}}"><a href="/Gallery" accesskey="3" title="">Exhibit</a></li>
                        <li class="{{Request::path() === 'ArtistPage' ? 'current_page_item' : ''}}"><a href="/ArtistPage" accesskey="4" title="">Featured Artists</a></li>
                    </ul>
                </div>
            </div>
    </div>
 
        @yield('content')

        <div id="copyright" class="tray">
            <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
        </div>

        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <script>
            AOS.init();
        </script>
    
</body>
</html>
