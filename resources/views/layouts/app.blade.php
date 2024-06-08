<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'My Portfolio') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                    <div
                        class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <a href="{{ url('/') }}"
                            class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                            <span class="fs-5 d-none d-sm-inline">
                                <i class="bi bi-box"> My Portfolio</i>
                            </span>
                        </a>
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                            id="menu">
                            <li>
                                <a href="#submenu1" data-bs-toggle="collapse"
                                    class="nav-link px-0 align-middle link-light">
                                    <i class="fs-4 bi-speedometer2"></i><span
                                        class="ms-1 d-none d-sm-inline">Admin Dashboard</span> </a>
                                <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                    <li class="w-100">
                                        <a href="{{url('admin/projects') }}" class="nav-link px-0 link-light"> <span
                                                class="d-none d-sm-inline">{{ __('Projects') }}</span></a>
                                    </li>
                                    <li class="w-100">
                                        <a href="{{url('admin/types') }}" class="nav-link px-0 link-light"> <span
                                                class="d-none d-sm-inline">{{ __('Types') }}</span></a>
                                    </li>
                                    <li class="w-100">
                                        <a href="{{url('admin/technologies') }}" class="nav-link px-0 link-light"> <span
                                                class="d-none d-sm-inline">{{ __('Technologies') }}</span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <hr>
                        @guest
                            <ul>
                                <li class="dropdown pb-4 list-unstyled">
                                    <a class="d-flex align-items-center text-white text-decoration-none"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if(Route::has('register'))
                                    <li class="dropdown pb-4 list-unstyled">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                        @else
                                <li class="dropdown pb-4 list-unstyled">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="https://cdn.noitatnemucod.net/avatar/100x100/one_piece/user-08.jpeg"
                                            alt="One Piece - Luffy" width="30" height="30" class="rounded-circle">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class=" dropdown-menu dropdown-menu-dark text-small shadow"
                                        aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('admin/dashboard') }}">{{__('Dashboard')}}</a>
                                        <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                        <hr class="dropdown-divider">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
                <div class="col py-3">

                    <main>
                        @yield('content')
                    </main>

                    @yield('project')
                </div>
            </div>
        </div>
    </div>
</body>

</html>