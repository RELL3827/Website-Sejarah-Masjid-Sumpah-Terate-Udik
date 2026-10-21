@extends('layouts.public')

@section('title', 'Sejarah Masjid Sumpah')
@section('meta_description', 'Mengenal sejarah Masjid Sumpah Cilegon, Banten — Masjid Perjuangan Banten, kemunculan langgar keramat, silsilah kepengurusan, dan tradisi persumpahan.')

@section('content')

    <x-page-header
        title="Sejarah Masjid Sumpah"
        subtitle="Asal-usul, Masjid Perjuangan Banten, silsilah kepengurusan, hingga tradisi pengungkapan kebenaran di Cilegon."
        eyebrow="Arsip Sejarah" />

    <section class="section section-cream">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="museum-card museum-card-lg">
                        <div class="museum-corner corner-tl"></div>
                        <div class="museum-corner corner-br"></div>

                        <p class="museum-eyebrow">Dokumentasi Sejarah</p>
                        <h2 class="museum-title">{{ $mosque?->name ?? 'Masjid Sumpah' }} Cilegon</h2>
                        <div class="divider-gold"></div>

                        <div class="article-content">
                            @if ($mosque?->history)
                                <div class="history-body">
                                    {!! $mosque->history !!}
                                </div>
                            @endif

                            <div class="notice-box mt-4">
                                <div class="notice-box-icon"><i class="bi bi-bookmark-check-fill"></i></div>
                                <div class="notice-box-text">
                                    <h3>Catatan Penuturan Sejarah</h3>
                                    <p class="mb-0">
                                        Dokumentasi ini dihimpun berdasarkan penuturan lisan para kesepuhan dan sesepuh Kampung Terate Udik, tokoh DKM, serta silsilah keturunan pejuang Geger Cilegon dan perawat pusaka Masjid Sumpah.
                                    </p>
                                </div>
                            </div>

                            {{-- Galeri Foto Dokumentasi Sejarah --}}
                            <div class="history-gallery-section mt-5 pt-4 border-top">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="h4 mb-0"><i class="bi bi-camera me-2 text-gold"></i>Dokumentasi Visual Masjid Sumpah</h3>
                                    <a href="{{ route('gallery') }}" class="small text-gold text-decoration-none">Buka Galeri Lengkap &rarr;</a>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                            <img src="{{ asset('images/dokumentasi/gerbang-masjid-sumpah.jpg') }}" class="card-img-top" alt="Gerbang Utama Masjid Sumpah Terate Udik" style="height: 220px; object-fit: cover;">
                                            <div class="card-body p-3 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Tampak Gerbang & Kanopi Depan</h4>
                                                <p class="small text-muted mb-0">Plang nama resmi Masjid Sumpah Terate Udik berhiaskan kaligrafi tauhid dan pelataran depan.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                            <img src="{{ asset('images/dokumentasi/interior-mihrab.jpg') }}" class="card-img-top" alt="Ruang Pengimaman dan Mihrab Kuno" style="height: 220px; object-fit: cover;">
                                            <div class="card-body p-3 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Mihrab & Ruang Pengimaman Kuno</h4>
                                                <p class="small text-muted mb-0">Lengkungan kubah dan pilar putih khas Banten tempat jamaah dan kesepuhan berhimpun.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                            <img src="{{ asset('images/dokumentasi/arsitektur-jendela-atap.jpg') }}" class="card-img-top" alt="Arsitektur Jendela Kuno & Mongolo" style="height: 180px; object-fit: cover;">
                                            <div class="card-body p-3 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Jendela Kuno & Atap Mongolo</h4>
                                                <p class="small text-muted mb-0">Jendela lengkung ornamen matahari khas dan puncak atap limas bertingkat.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                            <img src="{{ asset('images/dokumentasi/arsip-terate-udik-kuno.jpg') }}" class="card-img-top" alt="Arsip Foto Lawas Terate Udik" style="height: 180px; object-fit: cover;">
                                            <div class="card-body p-3 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Foto Lawas Kampung Terate</h4>
                                                <p class="small text-muted mb-0">Arsip jalan desa tempo dulu dengan siluet atap bertingkat masjid di kejauhan.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                            <img src="{{ asset('images/dokumentasi/arsip-lingkungan-sejarah.jpg') }}" class="card-img-top" alt="Pemukiman Sejarah Terate Udik" style="height: 180px; object-fit: cover;">
                                            <div class="card-body p-3 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Arsip Pemukiman Sejarah</h4>
                                                <p class="small text-muted mb-0">Deretan pemukiman tradisional zaman perjuangan Banten tempo dulu.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Jejak Benda & Pusaka Bersejarah --}}
                            <div class="history-relics-section mt-5 pt-4 border-top">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <h3 class="h4 mb-0"><i class="bi bi-shield-shaded me-2 text-gold"></i>Jejak Benda & Pusaka Bersejarah</h3>
                                    <a href="{{ route('gallery', ['category' => 'Jejak Benda']) }}" class="small text-gold text-decoration-none">Lihat Semua di Galeri &rarr;</a>
                                </div>
                                <p class="text-muted small mb-3">
                                    Koleksi pusaka kuno era Kesultanan Banten abad ke-15 hingga ke-18 dan artefak peninggalan sepuh pejuang Kampung Terate Udik.
                                </p>
                                <div class="row g-3">
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center bg-white" style="border-radius: var(--radius);">
                                            <div style="background: #000; height: 180px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ asset('images/pusaka/tombak-luk-3.jpg') }}" alt="Tombak Luk 3" class="w-100 h-100" style="object-fit: contain;">
                                            </div>
                                            <div class="card-body p-2 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Tombak Luk 3</h4>
                                                <span class="badge bg-gold text-dark small">Abad 15 (1400 M)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center bg-white" style="border-radius: var(--radius);">
                                            <div style="background: #000; height: 180px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ asset('images/pusaka/tombak-megantoro.jpg') }}" alt="Tombak Megantoro" class="w-100 h-100" style="object-fit: contain;">
                                            </div>
                                            <div class="card-body p-2 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Tombak Megantoro</h4>
                                                <span class="badge bg-gold text-dark small">Abad 17 (1600 M)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center bg-white" style="border-radius: var(--radius);">
                                            <div style="background: #000; height: 180px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ asset('images/pusaka/pedang-sunduk-alit.jpg') }}" alt="Pedang Sunduk Alit" class="w-100 h-100" style="object-fit: contain;">
                                            </div>
                                            <div class="card-body p-2 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Pedang Sunduk Alit</h4>
                                                <span class="badge bg-gold text-dark small">Abad 18 (1700 M)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center bg-white" style="border-radius: var(--radius);">
                                            <div style="background: #000; height: 180px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ asset('images/pusaka/pedang-lameng.jpg') }}" alt="Pedang Lameng" class="w-100 h-100" style="object-fit: contain;">
                                            </div>
                                            <div class="card-body p-2 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Pedang Lameng</h4>
                                                <span class="badge bg-gold text-dark small">Abad 18 (1700 M)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center bg-white" style="border-radius: var(--radius);">
                                            <div style="background: #000; height: 180px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ asset('images/pusaka/kendi-banyu-adem.jpg') }}" alt="Kendi Banyu Adem" class="w-100 h-100" style="object-fit: contain;">
                                            </div>
                                            <div class="card-body p-2 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Kendi Banyu Adem</h4>
                                                <span class="badge bg-gold text-dark small">Abad 17 (1600an)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center bg-white" style="border-radius: var(--radius);">
                                            <div style="background: #000; height: 180px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ asset('images/pusaka/keramik-dinasti-ming.jpg') }}" alt="Keramik Dinasti Ming" class="w-100 h-100" style="object-fit: contain;">
                                            </div>
                                            <div class="card-body p-2 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Keramik Dinasti Ming</h4>
                                                <span class="badge bg-gold text-dark small">Abad 17 (1600an)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center bg-white" style="border-radius: var(--radius);">
                                            <div style="background: #222; height: 200px; display:flex; align-items:center; justify-content:center;">
                                                <img src="{{ asset('images/pusaka/kendi-dan-pusaka-kuno.jpg') }}" alt="Kendi & Koleksi Pusaka" class="w-100 h-100" style="object-fit: cover;">
                                            </div>
                                            <div class="card-body p-2 bg-light">
                                                <h4 class="h6 mb-1 font-weight-bold">Kendi Pusaka & Koleksi Artefak Kuno</h4>
                                                <span class="badge bg-green text-white small">Peninggalan Sepuh Terate Udik</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('timeline') }}" class="btn btn-primary-custom">
                                Lihat Timeline Sejarah <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                            <a href="{{ route('about') }}" class="btn btn-outline-brown ms-2">
                                Tentang Masjid
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container">
            <div class="section-heading text-center">
                <p class="section-eyebrow">Metode</p>
                <h2 class="section-title">Cara Kami Menelusuri</h2>
                <div class="divider-gold-center"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">01</div>
                        <h3 class="step-title">Menghimpun Sumber</h3>
                        <p class="step-text">Kami kumpulkan arsip pengurus, dokumen wakaf, foto lama, dan cerita para sepuh—lalu catat dari mana masing-masing datang.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">02</div>
                        <h3 class="step-title">Menguji dan Mencatat</h3>
                        <p class="step-text">Tiap fakta disilangkan dengan sumber lain. Yang belum cocok kami biarkan menganga sebagai pertanyaan, bukan dipaksa jadi kesimpulan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="step-card">
                        <div class="step-number">03</div>
                        <h3 class="step-title">Menerbitkan yang Sahih</h3>
                        <p class="step-text">Tulisan terbit setelah terverifikasi, dengan sumber dicantumkan pada tiap rincian penting.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('articles.index') }}" class="btn btn-primary-custom btn-lg">
                    <i class="bi bi-newspaper me-2"></i>Baca Artikel
                </a>
            </div>
        </div>
    </section>

@endsection