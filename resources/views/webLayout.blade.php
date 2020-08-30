<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Malikhain</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="/css/gallery.css" rel="stylesheet"/>
        <link href="/css/indivArtistpage.css" rel="stylesheet"/>
        <link href="/css/artistpage.css" rel="stylesheet"/>
        <link href="/css/gallery.css" rel="stylesheet"/>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body style="font-family: 'Baumans', cursive;"">
        <nav class="navbar navbar-expand-lg text-uppercase navbar-light bg-transparent w-75 mx-auto pt-4">
            <a href="/home" class="h2 border-right border-light pr-3 py-1 font-weight-bold" style="font-family: 'Megrim', cursive; color: #FEBE7E;">malikh<strong style="color: #FFEDBC;">ai</strong>n</a>
            <button class="navbar-toggler border-white mb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-icons text-white">menu</span>
            </button>

            <div class="flex-row-reverse collapse navbar-collapse" id="navbarSupportedContent">
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
        
        
        <div class="container">
            @yield('content')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>

        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>  
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
        <script>
            AOS.init();
        </script>
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
    </body>
</html>
