<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="/css/artistpage.css" rel="stylesheet"/>
        <link href="/css/default.css" rel="stylesheet"/>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body>

        <nav class="navbar navbar-expand-sm bg-transparent text-uppercase">
            <div class="container">
                <h1>
                    <a href="/home" class="border-right border-light pr-3" style="font-family: 'Megrim', cursive; color: #FEBE7E;">malikh<strong style="color: #FFEDBC;">ai</strong>n</a>
                </h1>

                <div id="menu" class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-3">
                            <a class="nav-link {{Request::path() === 'home' || Request::path() === '/' ? 'text-white' : 'text-malikhain-yellow'}}" href="/home" accesskey="1" title=""> Home </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link {{Request::path() === 'workshop' ? 'text-white' : 'text-malikhain-yellow'}}" href="/workshop" accesskey="2" title=""> Workshop </a>
                        </li>
                        <li class="nav-item  mx-3">
                            <a class="nav-link {{Request::path() === 'Gallery' ? 'text-white' : 'text-malikhain-yellow'}}" href="/Gallery" accesskey="3" title=""> Exhibit </a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link {{Request::path() === 'ArtistPage' ? 'text-white' : 'text-malikhain-yellow'}}" href="/ArtistPage" accesskey="4" title=""> Featured Artists </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    
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
