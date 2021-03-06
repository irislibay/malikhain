<!DOCTYPE html>
<html class="h-100">
    <head>
        {{-- Meta tags --}}
        @include('layouts.web.meta')

        {{-- CSS --}}
        @include('layouts.web.css')
    </head>
    {{-- TODO: Move this to app.css --}}
    <body style="font-family: 'Baumans', cursive;" class="h-100">

        <div id="particles-js"></div>

        {{-- Top navbar --}}
        @include('layouts.web.navbar')

        {{-- Content --}}
        <div class="d-flex">
            @yield('content')
        </div>

        {{-- JS --}}
        @include('layouts.web.js')

    </body>
</html>
