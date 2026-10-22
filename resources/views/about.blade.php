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
                'title' => 'Jejak Benda & Pusaka Sepuh',
                'text' => 'Merawat peninggalan bersejarah, pusaka kuno Banten, dan makam para waliyullah serta pejuang Geger Cilegon.',
                'link' => '#jejak-benda',
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
                        {{ $mosque?->description ?? 'Zaman dahulu dikenal sebagai masjid sumpah perjuangan Banten dan sarana mengungkap kebenaran bagi pihak yang berselisih melalui proses sumpah sesuai syariat islam.' }}
                    </p>
                    @if ($mosque?->address)
                        <p class="text-brown"><i class="bi bi-geo-alt-fill me-1"></i>{{ $mosque->address }}</p>
                    @endif
                </div>
            </div>

            <div class="row g-4 mt-3">
                @foreach ($sections as $section)
                    <div class="col-md-6 col-lg-4">
                        @if (!empty($section['link']))
                            <a href="{{ $section['link'] }}" class="text-decoration-none d-block h-100">
                        @endif
                        <div class="about-card h-100">
                            <div class="about-icon"><i class="bi {{ $section['icon'] }}"></i></div>
                            <h3 class="about-title">{{ $section['title'] }}</h3>
                            <p class="about-text">{{ $section['text'] }}</p>
                        </div>
                        @if (!empty($section['link']))
                            </a>
                        @endif
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

                    <div class="notice-box mt-3">
                        <div class="notice-box-icon"><i class="bi bi-people-fill"></i></div>
                        <div class="notice-box-text">
                            <h3>Narasumber & Sumber Penuturan Sejarah</h3>
                            <p class="mb-3 text-muted">
                                Dokumentasi dan kisah sejarah lisan Masjid Sumpah dihimpun dari para kesepuhan, juru kunci, dan sesepuh Kampung Terate Udik:
                            </p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge-source"><i class="bi bi-person-fill"></i>KH. Mahmud</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Ust. Ahyar</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Mameu Fahrudim</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Ust. Afifi</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Alm. Ust. Arifin</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Mameu Mas'udi</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>H. Aliyumi</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Yai Basit</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Mameu Ustuhri</span>
                                <span class="badge-source"><i class="bi bi-person-fill"></i>Ki Arsyad</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===================== JEJAK BENDA & PUSAKA TERATE UDIK ===================== --}}
    <section class="section section-cream" id="jejak-benda">
        <div class="container">
            <div class="section-heading text-center">
                <p class="section-eyebrow">Khazanah Leluhur</p>
                <h2 class="section-title">Jejak Benda & Pusaka Terate Udik</h2>
                <div class="divider-gold-center"></div>
                <p class="text-muted mx-auto" style="max-width: 720px;">
                    Koleksi peninggalan fisik bersejarah dari era Kesultanan Banten dan para sepuh pejuang yang dirawat dengan takzim oleh para juru kunci peninggalan Kampung Terate Udik.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius);">
                        <div style="background: #000; height: 260px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ asset('images/pusaka/tombak-luk-3.jpg') }}" alt="Pusaka Tombak Luk 3" class="w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="card-body p-4 bg-white">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-gold text-dark px-2 py-1 small rounded">Abad 15 (1400 M)</span>
                                <span class="text-muted small">Pusaka & Pustaka</span>
                            </div>
                            <h3 class="h5 font-heading mb-1 text-brown">Tombak Luk 3</h3>
                            <p class="small text-gold fw-semibold mb-2">Pamor: Pengawak Waja / Keleng</p>
                            <p class="small text-muted mb-0">
                                Pusaka berpamor Pengawak Waja era abad ke-15 Masehi. Simbol ketajaman tauhid dan kepeloporan syiar Islam awal di tanah Banten.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius);">
                        <div style="background: #000; height: 260px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ asset('images/pusaka/tombak-megantoro.jpg') }}" alt="Pusaka Tombak Megantoro" class="w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="card-body p-4 bg-white">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-gold text-dark px-2 py-1 small rounded">Abad 17 (1600 M)</span>
                                <span class="text-muted small">Pusaka & Pustaka</span>
                            </div>
                            <h3 class="h5 font-heading mb-1 text-brown">Tombak Megantoro</h3>
                            <p class="small text-gold fw-semibold mb-2">Pamor: Wis Utah</p>
                            <p class="small text-muted mb-0">
                                Pusaka Tombak Megantoro peninggalan era Kesultanan Banten (1600 M) berpamor Wis Utah, lambang kepemimpinan ulama dan syiar pejuang.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius);">
                        <div style="background: #000; height: 260px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ asset('images/pusaka/pedang-sunduk-alit.jpg') }}" alt="Pedang Sunduk Alit" class="w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="card-body p-4 bg-white">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-gold text-dark px-2 py-1 small rounded">Abad 18 (1700 M)</span>
                                <span class="text-muted small">Ekek Keling</span>
                            </div>
                            <h3 class="h5 font-heading mb-1 text-brown">Pedang Sunduk Alit</h3>
                            <p class="small text-gold fw-semibold mb-2">Pamor: Wasutah · Gagang: Tanduk</p>
                            <p class="small text-muted mb-0">
                                Senjata pusaka berbilah tajam khas Banten dengan warangka kayu serta hulu gagang ukir dari tanduk alami.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius);">
                        <div style="background: #000; height: 260px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ asset('images/pusaka/pedang-lameng.jpg') }}" alt="Pedang Lameng Pamengkang Jagat" class="w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="card-body p-4 bg-white">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-gold text-dark px-2 py-1 small rounded">Abad 18 (1700 M)</span>
                                <span class="text-muted small">Pusaka Sepuh</span>
                            </div>
                            <h3 class="h5 font-heading mb-1 text-brown">Pedang Lameng Pamengkang Jagat</h3>
                            <p class="small text-gold fw-semibold mb-2">Pamor: Adeg, Batu Lapak / Puser Bumi</p>
                            <p class="small text-muted mb-0">
                                Memiliki corak pamor langka Adeg dan Puser Bumi dengan hulu gagang golok berbahan tanduk asli. Warisan ketangkasan para kiai dan pendekar pejuang Terate Udik.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius);">
                        <div style="background: #000; height: 260px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ asset('images/pusaka/kendi-banyu-adem.jpg') }}" alt="Kendi Banyu Adem" class="w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="card-body p-4 bg-white">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-gold text-dark px-2 py-1 small rounded">Abad 17 (1600an)</span>
                                <span class="text-muted small">Pusaka & Pustaka</span>
                            </div>
                            <h3 class="h5 font-heading mb-1 text-brown">Kendi Banyu Adem</h3>
                            <p class="small text-gold fw-semibold mb-2">Wadah Air Tradisional Berukir</p>
                            <p class="small text-muted mb-0">
                                Kendi berleher jenjang dengan cerat samping khas dan tutup kuno. Media air barakah dan penyejuk spiritual peninggalan para sesepuh pejuang Terate Udik.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius);">
                        <div style="background: #000; height: 260px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <img src="{{ asset('images/pusaka/keramik-dinasti-ming.jpg') }}" alt="Keramik Dinasti Ming" class="w-100 h-100" style="object-fit: contain;">
                        </div>
                        <div class="card-body p-4 bg-white">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-gold text-dark px-2 py-1 small rounded">Abad 17 (1600an)</span>
                                <span class="text-muted small">Pusaka & Pustaka</span>
                            </div>
                            <h3 class="h5 font-heading mb-1 text-brown">Keramik Dinasti Ming</h3>
                            <p class="small text-gold fw-semibold mb-2">Porselen Biru-Putih · Motif Ikan & Teratai</p>
                            <p class="small text-muted mb-0">
                                Mangkuk dan piring porselen biru-putih era Dinasti Ming. Menjadi saksi historis hubungan peradaban niaga maritim internasional Kesultanan Banten.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: var(--radius);">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-5" style="background: #222; height: 280px; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                                <img src="{{ asset('images/pusaka/kendi-dan-pusaka-kuno.jpg') }}" alt="Koleksi Meja Pusaka & Artefak Kuno" class="w-100 h-100" style="object-fit: cover;">
                            </div>
                            <div class="col-md-7 p-4 bg-white">
                                <span class="badge bg-green text-white px-3 py-1 small rounded mb-2">Koleksi Artefak Terate Udik</span>
                                <h3 class="h4 font-heading mb-1 text-brown">Khazanah Kendi, Mangkuk Kuno & Bilah Pusaka</h3>
                                <p class="small text-gold fw-semibold mb-2">Dirawat Turun-Temurun oleh Kesepuhan DKM</p>
                                <p class="text-muted mb-3">
                                    Dokumentasi meja pusaka merekam keutuhan artefak asli: kendi mori putih, mangkuk porselen Dinasti Ming, gulungan rotan keramat, serta bilah-bilah golok dan pedang bersejarah yang tersimpan di kediaman perawat pusaka makam para waliyullah Terate Udik.
                                </p>
                                <a href="{{ route('gallery', ['category' => 'Jejak Benda']) }}" class="btn btn-sm btn-outline-brown">
                                    <i class="bi bi-images me-1"></i> Buka Detail Koleksi di Galeri
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('gallery', ['category' => 'Jejak Benda']) }}" class="btn btn-gold btn-lg shadow-sm">
                    <i class="bi bi-images me-2"></i>Buka Galeri Foto Jejak Benda &rarr;
                </a>
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