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
                <div class="col-md-6 col-lg-5">
                    <div class="contact-card d-flex flex-column justify-content-between">
                        <div>
                            <div class="contact-icon"><i class="bi bi-geo-alt"></i></div>
                            <h3 class="contact-title">Alamat Masjid</h3>
                            <p class="text-muted mb-2">Lokasi cagar budaya dan pusat peribadatan masyarakat Terate Udik.</p>
                            <p class="fw-semibold text-brown mb-0">
                                {{ $contact['address'] ?? 'Kampung Terate Udik RT 02/RW 02, Kel. Masigit, Kec. Jombang, Kota Cilegon, Provinsi Banten' }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('location') }}" class="btn btn-sm btn-outline-brown">
                                <i class="bi bi-map me-1"></i> Buka Petunjuk Arah & Peta
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="contact-card d-flex flex-column justify-content-between">
                        <div>
                            <div class="contact-icon" style="background: linear-gradient(135deg, #25D366, #128C7E);"><i class="bi bi-whatsapp"></i></div>
                            <h3 class="contact-title">WhatsApp & Kontak</h3>
                            <p class="text-muted mb-2">Informasi, penelusuran sejarah, konfirmasi ziarah, atau penyerahan arsip.</p>
                            <p class="fs-4 fw-bold mb-1" style="color: #128C7E; letter-spacing: 0.5px;">
                                {{ $contact['phone'] ?? '081803651184' }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-center gap-2 mt-3">
                            <a href="https://wa.me/6281803651184" target="_blank" rel="noopener" class="btn btn-sm btn-primary-custom" style="background: #25D366; border-color: #25D366; color: #fff;">
                                <i class="bi bi-whatsapp me-1"></i> Hubungi WhatsApp
                            </a>
                            <a href="tel:081803651184" class="btn btn-sm btn-outline-brown">
                                <i class="bi bi-telephone me-1"></i> Panggilan
                            </a>
                        </div>
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
                            masjid ini bisa mengisi arsip. Hubungi pengurus langsung melalui WhatsApp di nomor <strong>081803651184</strong>. Tiap bahan kami catat
                            asal-usulnya, dan nama Anda kami tulis sebagai sumber—kecuali minta dirahasiakan.
                        </p>
                        <div class="d-flex justify-content-center flex-wrap gap-2 mt-3">
                            <a href="https://wa.me/6281803651184" target="_blank" rel="noopener" class="btn btn-primary-custom">
                                <i class="bi bi-whatsapp me-2"></i>Kirim Arsip via WhatsApp
                            </a>
                            @if (!empty($contact['instagram']))
                                <a href="{{ $contact['instagram'] }}" target="_blank" rel="noopener" class="btn btn-outline-brown">
                                    <i class="bi bi-instagram me-2"></i>Instagram
                                </a>
                            @endif
                            @if (!empty($contact['facebook']))
                                <a href="{{ $contact['facebook'] }}" target="_blank" rel="noopener" class="btn btn-outline-brown">
                                    <i class="bi bi-facebook me-2"></i>Facebook
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection