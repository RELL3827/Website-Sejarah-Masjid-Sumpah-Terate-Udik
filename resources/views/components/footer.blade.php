@props([])

<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <img src="{{ asset('images/logo/logo-kkn-terate-udik.png') }}"
                         alt="Logo KKN III.3 Terate Udik"
                         class="footer-logo-img"
                         width="56"
                         height="56">
                    <div>
                        <h4 class="footer-brand mb-0">{{ setting('site_name', 'Masjid Sumpah') }}</h4>
                        <span class="text-gold small fw-semibold">Kampung Terate Udik, Cilegon</span>
                    </div>
                </div>
                <p class="footer-desc">
                    Arsip digital dan dokumentasi sejarah Masjid Sumpah (Masjid Perjuangan Banten) diinisiasi dan dikembangkan oleh <strong>Kelompok KKN III.3 Terate Udik</strong> berkolaborasi dengan DKM & Kesepuhan Kampung Terate Udik.
                </p>
                <p class="footer-archive text-gold">
                    <i class="bi bi-patch-check-fill me-1"></i> Program Pengabdian Masyarakat & Pelestarian Sejarah Lokal
                </p>
            </div>

            <div class="col-6 col-lg-3">
                <h5 class="footer-heading">Menu</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('history') }}">Sejarah</a></li>
                    <li><a href="{{ route('timeline') }}">Timeline</a></li>
                    <li><a href="{{ route('articles.index') }}">Artikel</a></li>
                    <li><a href="{{ route('gallery') }}">Galeri</a></li>
                    <li><a href="{{ route('about') }}">Tentang</a></li>
                    <li><a href="{{ route('location') }}">Lokasi</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-4">
                <h5 class="footer-heading">Lokasi</h5>
                <ul class="footer-contact">
                    <li>
                        <i class="bi bi-geo-alt-fill text-gold"></i>
                        <span>{{ setting('contact_address', 'Kampung Terate Udik, Kelurahan Masigit, Kecamatan Jombang, Kota Cilegon, Banten') }}</span>
                    </li>
                    <li>
                        <i class="bi bi-whatsapp text-gold"></i>
                        <a href="https://wa.me/6281803651184" target="_blank" rel="noopener">WhatsApp: {{ setting('contact_phone', '081803651184') ?: '081803651184' }}</a>
                    </li>
                    <li class="pt-2">
                        <a href="{{ route('location') }}" class="text-gold text-decoration-none small fw-semibold">
                            <i class="bi bi-map me-1"></i> Petunjuk Arah & Peta Interaktif &rarr;
                        </a>
                    </li>
                </ul>

                @php
                    $socials = [
                        'facebook' => ['facebook_url', 'bi-facebook'],
                        'instagram' => ['instagram_url', 'bi-instagram'],
                        'twitter' => ['twitter_url', 'bi-twitter-x'],
                        'youtube' => ['youtube_url', 'bi-youtube'],
                    ];
                @endphp
                <div class="footer-social">
                    @foreach ($socials as $label => [$key, $icon])
                        @if ($url = setting($key))
                            <a href="{{ $url }}" target="_blank" rel="noopener" aria-label="{{ ucfirst($label) }}">
                                <i class="bi {{ $icon }}"></i>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>{{ setting('copyright_text', '© ' . date('Y') . ' Masjid Sumpah Terate Udik · Diinisiasi oleh Kelompok KKN III.3 Terate Udik. All Rights Reserved.') }}</p>
        </div>
    </div>
</footer>