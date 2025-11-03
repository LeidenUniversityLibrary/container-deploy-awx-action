<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ config('services.google_analytics.id') }}');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Primary Meta Tags -->
    <title>{{config('app.name', 'App - Leiden University Libraries')}}</title>
    <meta name="title" content="{{config('app.name')}} ">
    <meta name="description" content="{{config('app.description')}}">
    <meta name="keywords" content="{{config('app.keywords')}}">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{URL::current()}}">
    <meta property="og:title" content="{{config('app.name')}}">
    <meta property="og:description" content="{{config('app.description')}}">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{URL::current()}}">
    <meta property="twitter:title" content="{{config('app.name')}}">
    <meta property="twitter:description" content="{{config('app.description')}}">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Leiden University Libraries">
    <link rel="canonical" href={{ URL::current() }}>
    <link rel="icon" type="image/png" href="{{ mix('img/favicon-194x194.png') }}" sizes="194x194"/>
    <link rel="icon" type="image/png" href="{{ mix('img/favicon-32x32.png') }}" sizes="32x32"/>
    <link rel="icon" type="image/png" href="{{ mix('img/favicon-16x16.png') }}" sizes="16x16"/>
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @yield('css')
</head>
<body>
<div id="content">
    {{-- SECTION Header container --}}
    <div class="header-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container shadow-sm">
                <a class="navbar-brand" href="https://www.universiteitleiden.nl">
                    <img src="{{ mix('img/logo.png') }}" width="151" height="64" alt="Leiden University Logo"
                         id="logo_header">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="https://www.example.com"
                               target="_blank"
                               rel="noopener">Link <sup><i class="bi bi-box-arrow-up-right"></i></sup></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.example.com"
                               target="_blank"
                               class="nav-link">Link <sup><i
                                            class="bi bi-box-arrow-up-right"></i></sup></a>
                        </li>
                        <li class="nav-item">
                            <a href="https://ask-a-librarian.universiteitleiden.nl/"
                               target="_blank"
                               class="nav-link">Ask-a-Librarian <sup><i class="bi bi-box-arrow-up-right"></i></sup></a>
                        </li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->cn }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/">Homepage</a></li>
                                    <hr class="dropdown-divider">
                                    <li><a class="dropdown-item" href="/admin/">Admin Dashboard</a></li>
                                    <li><a class="dropdown-item" href="/admin/logs/">Logs</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                           href="{{route('logout')}}">{{ __('Logout') }}</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li>
                                <a class="nav-link"
                                   href="{{route('login')}}">{{ __('Login') }}</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <div class="border-bottom border-leiden"></div>
    </div>
    <div class="main-container">
        <div class="container shadow-sm p-3 mt-3 rounded">
            <h1 class="text-center mt-4">
                {{ config('app.name', 'Leiden University Libraries - App') }}
            </h1>
            <h5 class="text-muted text-center">Edit 'resources/views/layouts/app.blade.php' to edit the template</h5>
            @auth
                <div class="alert alert-primary text-center" role="alert">
                    <strong>You are logged in as an administrator.</strong>
                </div>
            @endauth
            <main class="container py-4">
                {{-- SECTION Yield Content --}}
                @yield('content')
                {{-- SECTION End Yield Content --}}
            </main>
        </div>
    </div>
    {{-- SECTION Footer container --}}
    <div class="footer-container">
        <div class="container-lg">
            <footer class="mt-5 pt-md-5 border-top col-12">
                <div class="row">
                    <div class="col-12 col-lg-4 mb-5">
                        <a href="https://www.universiteitleiden.nl/" class="text-gray-dark">
                            <img src="{{{ mix('img/logo.png') }}}" alt="Leiden University Logo" id="logo_footer"
                                 style="max-width:50%; display: block; margin:0 auto;"></a>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Leiden University</h5>
                        <ul class="list-unstyled text-small">
                            <li><a href="https://www.universiteitleiden.nl/" target="_blank" rel="noopener">Leiden
                                    University Website</a></li>
                            <li><a href="https://www.library.universiteitleiden.nl/" target="_blank"
                                   rel="noopener">Leiden University Libraries Website</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>Social</h5>
                        <ul class="list-unstyled text-small">
                            <li><a href="https://www.facebook.com/ubleiden/" target="_blank" rel="noopener">Leiden
                                    University Libraries
                                    on Facebook</a></li>
                            <li><a href="https://twitter.com/ubleiden" target="_blank" rel="noopener">Leiden
                                    University Libraries
                                    on Twitter</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md">
                        <h5>About</h5>
                        <ul class="list-unstyled text-small">
                            <li>
                                <p class="text-muted">Designed and developed by <a
                                            href="https://github.com/LeidenUniversityLibrary" target="_blank"
                                            rel="noopener">Leiden University Libraries</a>.
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
@yield('javascript')
</body>
</html>
