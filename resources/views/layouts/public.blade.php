<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') | {{ setting('site_name') }}</title>
    @else
        <title>{{ setting('site_name') }} — {{ setting('site_tagline') }}</title>
    @endif

    @hasSection('meta_description')
        <meta name="description" content="@yield('meta_description')">
    @else
        <meta name="description" content="{{ setting('site_description') }}">
    @endif

    <link rel="canonical" href="{{ url()->current() }}">

    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @else
        <meta property="og:image" content="{{ asset(setting('hero_image', 'images/masjid/hero.jpg')) }}">
    @endif
    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ setting('site_name') }}">
    @hasSection('title')
        <meta property="og:title" content="@yield('title') | {{ setting('site_name') }}">
    @else
        <meta property="og:title" content="{{ setting('site_name') }}">
    @endif
    <meta property="og:url" content="{{ url()->current() }}">
    @hasSection('meta_description')
        <meta property="og:description" content="@yield('meta_description')">
    @else
        <meta property="og:description" content="{{ setting('site_description') }}">
    @endif

    <meta name="twitter:card" content="summary_large_image">
    @hasSection('title')
        <meta name="twitter:title" content="@yield('title') | {{ setting('site_name') }}">
    @else
        <meta name="twitter:title" content="{{ setting('site_name') }}">
    @endif
    @hasSection('meta_description')
        <meta name="twitter:description" content="@yield('meta_description')">
    @else
        <meta name="twitter:description" content="{{ setting('site_description') }}">
    @endif
    <meta name="twitter:image" content="{{ asset(setting('hero_image', 'images/masjid/hero.jpg')) }}">

    <link rel="icon" type="image/png" href="{{ asset('images/masjid/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Source+Sans+3:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <x-flash-message />

    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    @stack('scripts')
</body>
</html>