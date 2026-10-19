@extends('layouts.public')

@section('title', 'Beranda')

@section('content')

    {{-- ===================== HERO ===================== --}}
    <section class="hero" style="background-image: url('{{ image_url($heroImage ?? null, 'images/masjid/hero.jpg') }}');">
        <div class="hero-overlay"></div>
        <div class="hero-pattern" aria-hidden="true"></div>
        <div class="container hero-content">
            <div class="hero-inner reveal">
                <div class="mb-3">
                    <span class="kkn-badge-pill">
                        <img src="{{ asset('images/logo/logo-kkn-terate-udik.png') }}" alt="Logo KKN III.3 Terate Udik" width="22" height="22">
                        <span>Arsip Digital · Kelompok KKN III.3 Terate Udik</span>
                    </span>
                </div>
                <p class="hero-eyebrow"><i class="bi bi-geo-alt-fill"></i> Cilegon · Banten · Indonesia</p>
                <h1 class="hero-title">{{ setting('hero_title', 'Masjid Sumpah') }}</h1>
                <p class="hero-subtitle">{{ setting('hero_subtitle', 'Rumah ibadah bersejarah di Kampung Terate Udik, Cilegon — simbol perjuangan ulama Banten dan sarana pengungkapan kebenaran.') }}</p>
                <div class="hero-actions">
                    <a href="{{ route('history') }}" class="btn btn-gold btn-lg">
                        <i class="bi bi-compass me-2"></i>Jelajahi Sejarah
                    </a>
                    <a href="{{ route('gallery') }}" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-images me-2"></i>Lihat Galeri
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== SEJARAH SINGKAT ===================== --}}
    <section class="section section-cream">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="museum-card">
                        <div class="museum-corner corner-tl"></div>
                        <div class="museum-corner corner-br"></div>
                        <p class="museum-eyebrow">Arsip Sejarah</p>
                        <h2 class="museum-title">Tentang {{ $mosque?->name ?? 'Masjid Sumpah' }}</h2>
                        <div class="divider-gold"></div>
                        <p class="museum-text">
                            {{ $mosque?->description ?? 'Salah satu masjid bersejarah di Kota Cilegon yang dikenal sebagai Masjid Perjuangan Banten dan tempat mengungkap kebenaran melalui tradisi persumpahan.' }}
                        </p>
                        <p class="museum-note">
                            <i class="bi bi-shield-check"></i>
                            <strong>Situs Bersejarah Banten:</strong> Jejak pertemuan ulama pejuang kemerdekaan, arsitektur kuno, serta tradisi ikrar persumpahan syariat Islam.
                        </p>
                        <a href="{{ route('about') }}" class="btn btn-primary-custom">
                            Baca Catatan Lengkap <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row g-4">
                        <div class="section-eyebrow mb-1">Arsip yang dikumpulkan</div>
                        <div class="col-6">
                            <div class="fact-card">
                                <div class="fact-icon"><i class="bi bi-file-earmark-text"></i></div>
                                <h3 class="fact-value">Naskah & Dokumen</h3>
                                <p class="fact-label">Catatan wakaf, daftar imam, risalah pengurus</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fact-card fact-card-dark">
                                <div class="fact-icon"><i class="bi bi-images"></i></div>
                                <h3 class="fact-value">Foto & Peta Lama</h3>
                                <p class="fact-label">Gambar masjid dari segala masa</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fact-card fact-card-gold">
                                <div class="fact-icon"><i class="bi bi-mic"></i></div>
                                <h3 class="fact-value">Penuturan Lisan</h3>
                                <p class="fact-label">Kesaksian para sepuh dan warga</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="fact-card fact-card-green">
                                <div class="fact-icon"><i class="bi bi-shop"></i></div>
                                <h3 class="fact-value">Jejak Benda</h3>
                                <p class="fact-label">Benda dan peralatan dari masa awal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== TIMELINE RINGKAS ===================== --}}
    <section class="section section-dark-green">
        <div class="container">
            <div class="text-center section-heading">
                <p class="section-eyebrow text-gold">Jejak Waktu</p>
                <h2 class="section-title text-white">Garis Waktu Sejarah</h2>
                <div class="divider-gold-center"></div>
            </div>

            <div class="timeline-horizontal">
                @forelse ($timelines->take(5) as $index => $item)
                    <div class="timeline-h-item">
                        <div class="timeline-h-dot">
                            <span>{{ $index + 1 }}</span>
                        </div>
                        <div class="timeline-h-line"></div>
                        <div class="timeline-h-content">
                            <span class="timeline-h-year">{{ $item->year ?: 'Tahun belum tercatat' }}</span>
                            <h3 class="timeline-h-title">{{ $item->title }}</h3>
                            <p class="timeline-h-desc">{{ Str::limit($item->description, 100) }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-white-50">Belum ada data timeline.</p>
                @endforelse
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('timeline') }}" class="btn btn-gold">
                    Jelajahi Timeline Lengkap <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ===================== ARTIKEL UNGGULAN ===================== --}}
    <section class="section section-cream">
        <div class="container">
            <div class="section-heading d-flex flex-wrap align-items-end justify-content-between">
                <div>
                    <p class="section-eyebrow">Tulisan Pilihan</p>
                    <h2 class="section-title">Artikel Unggulan</h2>
                </div>
                <a href="{{ route('articles.index') }}" class="btn btn-link btn-view-all">
                    Semua Artikel <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse ($featuredArticles as $article)
                    <div class="col-md-6 col-xl-4">
                        <x-article-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">Belum ada artikel unggulan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===================== GALERI PREVIEW ===================== --}}
    <section class="section bg-white">
        <div class="container">
            <div class="section-heading d-flex flex-wrap align-items-end justify-content-between">
                <div>
                    <p class="section-eyebrow">Dokumentasi</p>
                    <h2 class="section-title">Galeri Masjid</h2>
                </div>
                <a href="{{ route('gallery') }}" class="btn btn-link btn-view-all">
                    Semua Foto <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse ($galleries as $photo)
                    <div class="col-6 col-lg-4">
                        <x-gallery-card :photo="$photo" />
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">Belum ada foto galeri.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===================== CTA ===================== --}}
    <section class="section section-cta">
        <div class="container text-center">
            <div class="cta-inner reveal">
                <h2 class="cta-title">Punya Arsip atau Cerita Lama Tentang Masjid Ini?</h2>
                <p class="cta-text">Foto dari tahun 1970-an, catatan wakaf, atau kenangan shalat di bangunan lama—semuanya berarti bagi arsip ini. Kirim lewat kontak pengurus; kami catat sumbernya.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a href="{{ route('contact') }}" class="btn btn-gold btn-lg">
                        <i class="bi bi-envelope me-2"></i>Hubungi Pengurus
                    </a>
                    <a href="{{ route('location') }}" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-geo-alt me-2"></i>Lihat Lokasi
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection