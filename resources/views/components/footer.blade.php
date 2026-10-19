@props([])

<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <h4 class="footer-brand">{{ setting('site_name', 'Masjid Sumpah') }} Cilegon</h4>
                <p class="footer-desc">
                    {{ setting('site_description') ?? 'Arsip digital sejarah dan budaya Masjid Sumpah Cilegon—catatan pengurus dan warga tentang masjid ini.' }}
                </p>
                <p class="footer-archive">
                    <i class="bi bi-archive"></i> Arsip digital yang dirawat bersama
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
                </ul>
            </div>

            <div class="col-6 col-lg-4">
                <h5 class="footer-heading">Kontak</h5>
                <ul class="footer-contact">
                    @if ($address = setting('contact_address'))
                        <li><i class="bi bi-geo-alt"></i> {{ $address }}</li>
                    @endif
                    @if ($email = setting('contact_email'))
                        <li><i class="bi bi-envelope"></i> <a href="mailto:{{ $email }}">{{ $email }}</a></li>
                    @endif
                    @if ($phone = setting('contact_phone'))
                        <li><i class="bi bi-telephone"></i> <a href="tel:{{ $phone }}">{{ $phone }}</a></li>
                    @endif
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
            <p>{{ setting('copyright_text', '© 2026 DKM Masjid Sumpah Cilegon. All Rights Reserved.') }}</p>
        </div>
    </div>
</footer>