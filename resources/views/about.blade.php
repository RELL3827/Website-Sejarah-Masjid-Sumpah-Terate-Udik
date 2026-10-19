@extends('layouts.public')

@section('title', 'Tentang Masjid Sumpah')
@section('meta_description', 'Profil Masjid Sumpah Cilegon — sejarah berdirinya, Masjid Perjuangan Banten, arsitektur kuno, struktur DKM, dan tradisi persumpahan syariat Islam.')

@section('content')

    <x-page-header
        title="Tentang Masjid Sumpah"
        subtitle="Sejarah, nama, arsitektur, kepengurusan DKM, dan tradisi pengungkapan kebenaran di Cilegon."
        eyebrow="Profil Situs Sejarah" />

    @php
        $sections = [
            [
                'icon' => 'bi-book-half',
                'title' => 'Sejarah & Asal-Usul',
                'text' => $mosque?->history
                    ? 'Bermula dari langgar keramat era Kesultanan Banten yang meluas sendiri, hingga direhab gotong royong warga menjadi Masjid Perjuangan Banten.'
                    : 'Catatan sejarah lisan Kesultanan Banten dan gotong royong warga Terate Udik.',
            ],
            [
                'icon' => 'bi-patch-check-fill',
                'title' => 'Nama & Makna',
                'text' => 'Nama “Masjid Sumpah” merujuk pada tradisi pengungkapan kebenaran di hadapan Al-Qur\'an bagi pihak yang berselisih dan mencari keadilan sesuai hukum Islam.',
            ],
            [
                'icon' => 'bi-building',
                'title' => 'Arsitektur Khas Banten',
                'text' => $mosque?->architecture ?: 'Bangunan persegi dengan pintu setinggi 1,5 meter sebagai simbol tawadhu, menara barat bergaya Banten, dan atap limas 4 undak dengan mongolo.',
            ],
            [
                'icon' => 'bi-shield-check',
                'title' => 'Masjid Perjuangan Banten',
                'text' => $mosque?->cultural_value ?: 'Pernah menjadi tempat musyawarah rahasia ulama dan kiai pejuang tanah air dan agama, serta tempat tirakat para sepuh.',
            ],
            [
                'icon' => 'bi-people',
                'title' => 'Fungsi & Keagamaan',
                'text' => 'Shalat berjamaah, dzikir Maulid, Marhaban, ngeriung, musyawarah warga di pendopo, serta mediasi perdamaian.',
            ],
            [
                'icon' => 'bi-gem',
                'title' => 'Pusaka & Makam Sepuh',
                'text' => 'Merawat peninggalan bersejarah, pusaka kuno Banten, dan makam para waliyullah serta pejuang Geger Cilegon.',
            ],
        ];
    @endphp

    <section class="section section-cream">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <p class="museum-eyebrow">Seputar Masjid</p>
                    <h2 class="section-title">{{ $mosque?->name ?? 'Masjid Sumpah' }} Cilegon</h2>
                    <div class="divider-gold-center"></div>
                    <p class="lead text-muted mx-auto" style="max-width: 800px;">
                        {{ $mosque?->description ?? 'Salah satu masjid bersejarah di Kota Cilegon, Banten dengan nama unik “Masjid Sumpah”.' }}
                    </p>
                    @if ($mosque?->address)
                        <p class="text-brown"><i class="bi bi-geo-alt-fill me-1"></i>{{ $mosque->address }}</p>
                    @endif
                </div>
            </div>

            <div class="row g-4 mt-3">
                @foreach ($sections as $section)
                    <div class="col-md-6 col-lg-4">
                        <div class="about-card">
                            <div class="about-icon"><i class="bi {{ $section['icon'] }}"></i></div>
                            <h3 class="about-title">{{ $section['title'] }}</h3>
                            <p class="about-text">{{ $section['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===================== STRUKTUR DKM ===================== --}}
    <section class="section bg-white">
        <div class="container">
            <div class="section-heading text-center">
                <p class="section-eyebrow">Tata Kelola & Kepengurusan</p>
                <h2 class="section-title">Struktur DKM Masjid Sumpah</h2>
                <div class="divider-gold-center"></div>
                <p class="text-muted mx-auto" style="max-width: 700px;">
                    Seiring perkembangan zaman, kepengurusan Masjid Sumpah dilembagakan secara struktural modern melalui Dewan Kemakmuran Masjid (DKM).
                </p>
            </div>

            <div class="row g-4 justify-content-center mt-2">
                <div class="col-md-4">
                    <div class="museum-card text-center h-100">
                        <div class="mb-3">
                            <span class="badge bg-gold text-dark px-3 py-2 rounded-pill fs-6">Ketua DKM</span>
                        </div>
                        <h3 class="h4 mb-1">KH. A. Marzuqi</h3>
                        <p class="text-muted small mb-0">bin KH. Mastur</p>
                        <hr class="my-3">
                        <p class="small text-muted mb-0">Murid KH. Mahmmud, memimpin kepengurusan dan arah kemakmuran masjid.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="museum-card text-center h-100">
                        <div class="mb-3">
                            <span class="badge bg-gold text-dark px-3 py-2 rounded-pill fs-6">Wakil Ketua DKM</span>
                        </div>
                        <h3 class="h4 mb-1">A. Faridi</h3>
                        <p class="text-muted small mb-0">Wakil DKM</p>
                        <hr class="my-3">
                        <p class="small text-muted mb-0">Membantu kepengurusan operasional, kegiatan ibadah, dan kemaslahatan jamaah.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="museum-card text-center h-100">
                        <div class="mb-3">
                            <span class="badge bg-gold text-dark px-3 py-2 rounded-pill fs-6">Bendahara DKM</span>
                        </div>
                        <h3 class="h4 mb-1">Habibi</h3>
                        <p class="text-muted small mb-0">Bendahara DKM</p>
                        <hr class="my-3">
                        <p class="small text-muted mb-0">Pengelolaan transparansi keuangan, pemeliharaan fisik masjid, dan dana umat.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-lg-10">
                    <div class="notice-box">
                        <div class="notice-box-icon"><i class="bi bi-clock-history"></i></div>
                        <div class="notice-box-text">
                            <h3>Estafet Juru Kunci & Pengurus Terdahulu</h3>
                            <p class="mb-0">
                                <strong>Era 1928:</strong> Ki Akhmad (putra pejuang Geger Cilegon KH. Mahmmud bin Ki Hamzah) &rarr;
                                <strong>Generasi Ke-2:</strong> KH. Mahmmud bin H. Abdurrohman (pembangun pendopo & perawat pusaka) &rarr;
                                <strong>Era 1986:</strong> Ust. Abdul Hayi (pengurus & renovasi fasilitas) dan Ust. Akhyar bin Abdullatif (juru kunci persumpahan & spiritual).
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    {{-- ===================== TIM PENGEMBANG / KKN SECTION ===================== --}}
    <section class="section section-cream">
        <div class="container">
            <div class="museum-card p-4 p-md-5">
                <div class="row align-items-center g-4">
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('images/logo/logo-kkn-terate-udik.png') }}"
                             alt="Logo Kelompok KKN III.3 Terate Udik"
                             class="img-fluid rounded-circle shadow-lg"
                             style="max-width: 170px; border: 4px solid var(--gold); padding: 4px; background: #fff;">
                    </div>
                    <div class="col-md-9">
                        <span class="badge bg-gold text-dark px-3 py-2 rounded-pill fs-6 mb-2">Inisiator & Tim Pengembang Arsip</span>
                        <h2 class="h3 font-heading mb-2">Kelompok KKN III.3 Terate Udik</h2>
                        <p class="text-gold fw-semibold mb-3">Kuliah Kerja Nyata · Kampung Terate Udik, Kelurahan Masigit, Kecamatan Jombang, Kota Cilegon</p>
                        <p class="text-muted mb-3">
                            Platform arsip digital ini dibangun sebagai bentuk pengabdian kepada masyarakat dalam merawat, mendokumentasikan, dan mempublikasikan sejarah luhur <strong>Masjid Sumpah</strong> (Masjid Perjuangan Banten). Seluruh materi dihimpun melalui penelusuran sejarah lisan bersama para sesepuh kampung, wawancara DKM Masjid Sumpah, serta dokumentasi fisik di lapangan.
                        </p>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-white text-brown border px-3 py-2"><i class="bi bi-shield-check text-gold me-1"></i> Dokumentasi Sejarah Otentik</span>
                            <span class="badge bg-white text-brown border px-3 py-2"><i class="bi bi-camera text-gold me-1"></i> Digitalisasi Galeri & Arsip</span>
                            <span class="badge bg-white text-brown border px-3 py-2"><i class="bi bi-people text-gold me-1"></i> Kolaborasi DKM & Kesepuhan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Dokumentasi Sejarah Terate Udik</h2>
                    <div class="divider-gold"></div>
                    <p class="lead text-muted">
                        Arsip digital ini mendokumentasikan nilai luhur, arsitektur khas Banten, dan tradisi Masjid Sumpah berdasarkan penuturan turun-temurun para sesepuh Kampung Terate Udik.
                    </p>
                    <ul class="check-list mt-4">
                        <li><i class="bi bi-check-circle-fill"></i> Silsilah juru kunci dan tokoh pejuang dicatat runtut.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Arsitektur kuno dan filosofi pintu 1,5 meter dilestarikan.</li>
                        <li><i class="bi bi-check-circle-fill"></i> Tata cara tradisi persumpahan didokumentasikan sesuai syariat Islam.</li>
                    </ul>
                    <div class="mt-4">
                        <a href="{{ route('history') }}" class="btn btn-primary-custom">Baca Sejarah Lengkap</a>
                        <a href="{{ route('gallery') }}" class="btn btn-outline-brown ms-2">Lihat Galeri</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="location-card">
                        <div class="location-card-head">
                            <div><i class="bi bi-geo-alt-fill text-gold"></i></div>
                            <div class="ms-3">
                                <h3 class="location-card-title">{{ $mosque?->name ?? 'Masjid Sumpah' }}</h3>
                                <p class="mb-0">{{ $mosque?->address ?? 'Kota Cilegon, Banten' }}</p>
                            </div>
                        </div>
                        <div class="location-map-frame">
                            @if ($mosque)
                                <iframe src="{{ $mosque->google_maps_embed_url }}"
                                        loading="lazy"
                                        title="Peta {{ $mosque->name }}"
                                        allowfullscreen
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                            @else
                                <div class="map-placeholder">Peta belum diatur.</div>
                            @endif
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('location') }}" class="btn btn-gold btn-sm">
                                <i class="bi bi-map me-1"></i> Buka Halaman Lokasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection