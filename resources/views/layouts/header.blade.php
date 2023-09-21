<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/educate-custon-icon.css">
    <link rel="stylesheet" href="assets/css/morrisjs/morris.css">
    <link rel="stylesheet" href="assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="assets/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="assets/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="assets/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="assets/js/DataTables/datatables.css">

    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>


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
