<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
            <div class="container">
                <img src="{{ asset('images/logo.png') }}" alt="Deskripsi Gambar" width="30" height="40"> &nbsp;
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/arsip.png') }}" alt="Judul" width="130" height="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @auth

                        <!-- Left Side Of Navbar -->
                        @if (Auth::user()->hasRole('admin'))
                            <ul class="navbar-nav mr-auto hover-text-primary">
                                <li title="Halaman Dashboard" class="nav-item dropdown"> <a class="nav-link"
                                        href="{{ route('admin.page') }}" role="button" aria-haspopup="true"
                                        aria-expanded="false">Dashboard</a></li>

                                <li class="nav-item" title="Daftar Kategori"> <a class="nav-link"
                                        href="{{ route('katadmin.index') }}">Kategori</a> </li>

                                <li class="nav-item" title="Semua Dokumen"> <a class="nav-link"
                                        href="{{ route('dokadmin.index') }}">All Dokumen</a> </li>

                                <li class="nav-item" title="Data Instansi"> <a class="nav-link"
                                        href="{{ route('instansi.index') }}">Data Instansi</a> </li>
                                <li class="nav-item" title="Data Produk"> <a class="nav-link"
                                        href="{{ route('produk.index') }}">Data Produk</a> </li>
                                <li class="nav-item" title="Daftar User"> <a class="nav-link"
                                        href="{{ route('kelola-user.index') }}">Kelola User</a> </li>
                                <li class="nav-item" title="Daftar Berita"> <a class="nav-link"
                                        href="{{ route('berita.index') }}">Berita</a> </li>
                            </ul>
                        @elseif(Auth::user()->hasRole('user'))
                            <ul class="navbar-nav mr-auto hover-text-primary">
                                <li title="Halaman Dashboard" class="nav-item dropdown"> <a class="nav-link"
                                        href="{{ route('user.page') }}" role="button" aria-haspopup="true"
                                        aria-expanded="false">Dashboard</a></li>

                                <li class="nav-item" title="Daftar Kategori"> <a class="nav-link"
                                        href="{{ route('katuser.index') }}">Kategori</a> </li>

                                <li class="nav-item" title="Semua Dokumen"> <a class="nav-link"
                                        href="{{ route('dokuser.index') }}">All Dokumen</a> </li>
                            </ul>
                        @endif


                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('change.password') }}">
                                        Ganti Password
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
