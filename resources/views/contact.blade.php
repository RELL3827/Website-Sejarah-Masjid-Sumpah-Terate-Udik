@extends('layouts.public')

@section('title', 'Kontak')
@section('meta_description', 'Hubungi pengelola dokumentasi digital Masjid Sumpah Cilegon.')

@section('content')

    <x-page-header
        title="Kontak"
        subtitle="Untuk informasi, penelusuran data, atau menyerahkan arsip tentang masjid ini."
        eyebrow="Hubungi Pengurus" />

    <section class="section section-cream">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="contact-icon"><i class="bi bi-geo-alt"></i></div>
                        <h3 class="contact-title">Alamat</h3>
                        <p class="mb-0">{{ $contact['address'] ?? 'Kota Cilegon, Provinsi Banten' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="contact-icon"><i class="bi bi-envelope"></i></div>
                        <h3 class="contact-title">Email</h3>
                        @if ($contact['email'])
                            <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
                        @else
                            <p class="mb-0">Disiapkan pengurus</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="contact-card">
                        <div class="contact-icon"><i class="bi bi-telephone"></i></div>
                        <h3 class="contact-title">Telepon</h3>
                        @if ($contact['phone'])
                            <a href="tel:{{ $contact['phone'] }}">{{ $contact['phone'] }}</a>
                        @else
                            <p class="mb-0">Disiapkan pengurus</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="museum-card text-center">
                        <div class="museum-corner corner-tl"></div>
                        <div class="museum-corner corner-br"></div>
                        <h2 class="section-title mb-2">Punya Arsip atau Cerita? Kami Mencatatnya.</h2>
                        <div class="divider-gold-center"></div>
                        <p class="text-muted mx-auto" style="max-width: 620px;">
                            Catatan wakaf, foto masjid dari masa lalu, atau sekadar kenangan warga tentang
                            masjid ini bisa mengisi arsip. Hubungi kami lewat kontak di atas. Tiap bahan kami catat
                            asal-usulnya, dan nama Anda kami tulis sebagai sumber—kecuali minta dirahasiakan.
                        </p>
                        @if ($contact['instagram'])
                            <a href="{{ $contact['instagram'] }}" target="_blank" rel="noopener" class="btn btn-primary-custom mt-2">
                                <i class="bi bi-instagram me-2"></i>Instagram
                            </a>
                        @endif
                        @if ($contact['facebook'])
                            <a href="{{ $contact['facebook'] }}" target="_blank" rel="noopener" class="btn btn-outline-brown mt-2 ms-2">
                                <i class="bi bi-facebook me-2"></i>Facebook
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection