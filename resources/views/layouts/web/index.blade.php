<!DOCTYPE html>
<html>
    <head>
        {{-- Meta tags --}}
        @include('layouts.web.meta')

        {{-- CSS --}}
        @include('layouts.web.css')
    </head>
    {{-- TODO: Move this to app.css --}}
    <body style="font-family: 'Baumans', cursive;">

        {{-- Top navbar --}}
        @include('layouts.web.navbar')

        {{-- Content --}}
        <div class="container">
            @yield('content')
        </div>

        {{-- JS --}}
        @include('layouts.web.js')

    </body>
</html>
