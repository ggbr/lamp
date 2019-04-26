<header>
    <nav class="white">
        <div class="container">
            <div class="nav-wrapper">
                <a href="{{ url('home') }}" class="landingPageLogo">
                    <img src="{{ asset('images/logo/logo-averbweb.png') }}" alt="Logo {{ config('app.name') }}">
                </a>
                {{-- Menu Desktop --}}
                @include('layouts.landingPage.menus.desktop')

                {{-- Menu Mobile --}}
                @include('layouts.landingPage.menus.mobile')
            </div>
        </div>
    </nav>
</header>
