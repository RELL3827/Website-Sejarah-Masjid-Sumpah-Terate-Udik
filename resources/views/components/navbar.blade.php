@props([])

@php
    $menu = [
        ['label' => 'Beranda', 'route' => 'home'],
        ['label' => 'Sejarah', 'route' => 'history'],
        ['label' => 'Timeline', 'route' => 'timeline'],
        ['label' => 'Artikel', 'route' => 'articles.index'],
        ['label' => 'Galeri', 'route' => 'gallery'],
        ['label' => 'Tentang', 'route' => 'about'],
        ['label' => 'Lokasi', 'route' => 'location'],
    ];
@endphp

<nav class="navbar navbar-expand-lg site-navbar sticky-top" id="siteNavbar" aria-label="Navigasi utama">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
            <span class="brand-icon" aria-hidden="true">
                <i class="bi bi-buildings"></i>
            </span>
            <span class="brand-text">
                <span class="brand-name">{{ setting('site_name', 'Masjid Sumpah') }}</span>
                <span class="brand-tagline d-none d-sm-block">Cilegon — Banten</span>
            </span>
        </a>

        <div class="d-flex align-items-center gap-2 order-lg-last">
            <a class="btn btn-navbar-search" href="{{ route('search') }}" aria-label="Cari artikel">
                <i class="bi bi-search"></i>
                <span class="d-none d-md-inline ms-1">Cari</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-lg-auto text-center text-lg-start">
                @foreach ($menu as $item)
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                           href="{{ route($item['route']) }}">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>