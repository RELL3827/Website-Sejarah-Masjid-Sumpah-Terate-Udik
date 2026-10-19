@props([])

@php
    $items = [
        ['route' => 'admin.dashboard', 'pattern' => 'admin.dashboard', 'icon' => 'bi-speedometer2', 'label' => 'Dashboard'],
        ['route' => 'admin.articles.index', 'pattern' => 'admin.articles.*', 'icon' => 'bi-newspaper', 'label' => 'Artikel'],
        ['route' => 'admin.categories.index', 'pattern' => 'admin.categories.*', 'icon' => 'bi-tags', 'label' => 'Kategori'],
        ['route' => 'admin.timelines.index', 'pattern' => 'admin.timelines.*', 'icon' => 'bi-clock-history', 'label' => 'Timeline Sejarah'],
        ['route' => 'admin.galleries.index', 'pattern' => 'admin.galleries.*', 'icon' => 'bi-images', 'label' => 'Galeri'],
        ['route' => 'admin.mosque-information.edit', 'pattern' => 'admin.mosque-information.*', 'icon' => 'bi-building', 'label' => 'Informasi Masjid'],
        ['route' => 'admin.settings.edit', 'pattern' => 'admin.settings.*', 'icon' => 'bi-gear', 'label' => 'Pengaturan'],
    ];
@endphp

<div class="admin-sidebar-backdrop" data-sidebar-close></div>

<aside class="admin-sidebar" id="adminSidebar">
    <div class="admin-sidebar-brand">
        <div class="sidebar-icon"><i class="bi bi-buildings"></i></div>
        <div class="sidebar-brand-text">
            <span>Masjid Sumpah</span>
            <span>Masigit</span>
        </div>
        <button class="admin-sidebar-close ms-auto d-lg-none" data-sidebar-close aria-label="Tutup menu samping">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <nav class="admin-sidebar-nav" aria-label="Navigasi admin">
        <ul class="admin-nav-list">
            @foreach ($items as $item)
                <li>
                    <a href="{{ route($item['route']) }}" class="{{ request()->routeIs($item['pattern']) ? 'active' : '' }}">
                        <i class="bi {{ $item['icon'] }}"></i>
                        <span>{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="admin-sidebar-footer">
        <a href="{{ route('home') }}" target="_blank" class="admin-sidebar-link">
            <i class="bi bi-globe"></i> Lihat Website
        </a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="admin-sidebar-link w-100">
                <i class="bi bi-box-arrow-right"></i> Keluar
            </button>
        </form>
    </div>
</aside>