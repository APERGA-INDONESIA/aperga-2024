<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.7">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="icon" href="/img/logo-w.png">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- JS -->
    {{-- <script src="https://code.jquery.com/jquery-latest.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('extrastyle')
    <style>
        /* Adjust styles for left navbar */
        .navbar.navbar-expand-md {
            flex-direction: column;
            /* Stack navbar elements vertically */
            width: 250px;
            /* Set width for left navbar */
            position: fixed;
            /* Fix the navbar to the left side */
            top: 0;
            /* Start navbar from the top */
            height: 100vh;
            /* Set navbar height to 100vh (full viewport height) */
            background: #135589 !important;
            /* Background color */
            padding: 10px;
            /* Add some padding */
        }

        .navbar-toggler {
            display: none;
            /* Hide the toggle button for left navbar */
        }

        .navbar-nav {
            width: 100%;
        }

        .collapse.navbar-collapse {
            display: block !important;
            /* Force navbar content to always show */
        }

        .nav-link {
            color: #fff !important;
            margin-bottom: 10px;
            /* Add spacing between navbar items */
        }

        .logo-img {
            height: 50px;
        }

        .main {
            margin-left: 250px;
            /* Make content area start after the navbar width */
            padding: 10px;
            /* Add some padding to content area */
            min-height: 100vh;
        }

        .bg-logo {
            background-color: #f2f2f2;
            /* Optional background color for main content */
        }

        .header-bar {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
        }

        .nav-header {
            height: 90px !important;
            display: flex;
            align-items: center;
            color: #fff
        }

        .header-bar .label {
            margin-left: 10px;
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .header-bar .label .email {
            font-size: 12px;
        }

        .nav-logout {
            position: absolute;
            bottom: 10%;
            width: 80%;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        @auth
            <nav class="navbar navbar-expand-md navbar-light shadow-sm">
                <div class="container">
                    {{-- <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="/img/logo-w.png" alt="logo" class="logo-img"/>
                </a> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    @auth
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav flex-column">
                                <li class="nav-header">
                                    <div class="header-bar">
                                        <img src="/img/logo-w.png" alt="logo" class="logo-img" />
                                        <div class="label">
                                            <span>{{ Auth::user()->name }} <br></span>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                </li>
                                @if (Auth::user()->role == 'superuser')
                                    <li class="nav-item">
                                        <a class="nav-link {{ Str::contains(request()->route()->getName(), 'administrator') ? 'active' : '' }}"
                                            href="{{ route('administrator') }}">
                                            <i class="fa fa-key"></i> &nbsp;
                                            {{ ucwords('Akses Pengguna') }}
                                        </a>
                                    </li>
                                    <li class="nav-item" onclick="toggleShow('master-data')">
                                        <a class="nav-link {{ Str::contains(request()->route()->getName(), 'masterdata') ? 'active' : '' }}"
                                            href="#">
                                            <i class="fa fa-cog"></i> &nbsp;
                                            Master Data &nbsp;
                                            <span id="master-data-caret"><i class="fa fa-caret-down"></i></span>
                                        </a>
                                    </li>
                                    <div id="master-data-child" class="children">
                                        <li class="nav-item child">
                                            <a class="nav-link {{ Str::contains(request()->route()->getName(), 'masterdata_type') ? 'active' : '' }}"
                                                href="{{ route('masterdata_type') }}"> &nbsp;Tipe </a>
                                        </li>
                                        <li class="nav-item child">
                                            <a class="nav-link {{ Str::contains(request()->route()->getName(), 'masterdata_skill') ? 'active' : '' }}"
                                                href="{{ route('masterdata_skill') }}"> &nbsp;Keahlian </a>
                                        </li>
                                        <li class="nav-item child">
                                            <a class="nav-link {{ Str::contains(request()->route()->getName(), 'masterdata_location') ? 'active' : '' }}"
                                                href="{{ route('masterdata_location') }}"> &nbsp;Lokasi </a>
                                        </li>
                                    </div>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link {{ Str::contains(request()->route()->getName(), 'apperlog') ? 'active' : '' }}"
                                        href="{{ route('apperlog') }}">
                                        <i class="fa fa-clipboard-check"></i> &nbsp;
                                        {{ ucwords('Apperlog') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Str::contains(request()->route()->getName(), 'apperfind') ? 'active' : '' }}"
                                        href="{{ route('apperfind') }}">
                                        <i class="fa fa-search"></i> &nbsp;
                                        {{ ucwords('Apperfind') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('apperassist') ? 'active' : '' }}"
                                        href="{{ route('apperassist') }}">
                                        <i class="fa-regular fa-message"></i> &nbsp;
                                        {{ ucwords('Apperassist') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('apperpay') ? 'active' : '' }}"
                                        href="{{ route('apperpay') }}">
                                        <i class="fa-regular fa-credit-card"></i> &nbsp;
                                        {{ ucwords('Apperpay') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('apperneed') ? 'active' : '' }}"
                                        href="{{ route('apperneed') }}">
                                        <i class="fa fa-pen-to-square"></i> &nbsp;
                                        {{ ucwords('Apperneed') }}
                                    </a>
                                </li>

                                <li class="nav-logout">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> &nbsp;
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </nav>
        @endauth
        <main class="py-4 bg-logo main">
            @yield('content')
        </main>
    </div>
</body>
@yield('extrascript')
<script>
    $(document).ready(() => {
        $(".children").hide();
        handleOnInit("{{ request()->route()->getName() }}");
    });

    function toggleShow(elem) {
        const childElem = $(`#${elem}-child`);
        const caretElem = $(`#${elem}-caret`);
        childElem.toggle();
        const visible = childElem.is(':visible');
        caretElem.html("<i class='fa fa-caret-down'></i>");
        if (visible) {
            caretElem.html("<i class='fa fa-caret-up'></i>");
        }
    }

    function handleOnInit(elem) {
        console.log(elem);
        if (elem.includes("masterdata")) {
            toggleShow("master-data");
        }
    }
</script>

</html>
