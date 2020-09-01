<nav class="navbar navbar-expand-lg text-uppercase navbar-light bg-transparent w-75 mx-auto pt-4">

    <a href="{{ route('home') }}"
        class="h2 border-right border-light pr-3 py-1 font-weight-bold" style="font-family: 'Megrim', cursive; color: #FEBE7E;">
        malikh<strong style="color: #FFEDBC;">ai</strong>n
    </a>

    <button class="navbar-toggler border-white mb-2"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="material-icons text-white">menu</span>
    </button>

    <div class="flex-row-reverse collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">

            <li class="nav-item mx-3">
                <a class="nav-link {{ Request::path() === 'home' || Request::path() === '/' ? 'text-white' : 'text-malikhain-yellow' }}"
                    href="{{ route('home') }}"
                    accesskey="1"
                    title="">
                    Home
                </a>
            </li>

            <li class="nav-item mx-3">
                <a class="nav-link {{ Request::path() === 'workshop' ? 'text-white' : 'text-malikhain-yellow' }}"
                    href="{{ route('workshop') }}"
                    accesskey="2"
                    title="">
                    Workshop
                </a>
            </li>

            <li class="nav-item  mx-3">
                <a class="nav-link {{ Request::path() === 'Gallery' ? 'text-white' : 'text-malikhain-yellow' }}"
                    href="/Gallery"
                    accesskey="3"
                    title="">
                    Exhibit
                </a>
            </li>

            <li class="nav-item mx-3">
                <a class="nav-link {{ Request::path() === 'ArtistPage' ? 'text-white' : 'text-malikhain-yellow' }}"
                    href="/ArtistPage"
                    accesskey="4"
                    title="">
                    Featured Artists
                </a>
            </li>

        </ul>
    </div>

</nav>
