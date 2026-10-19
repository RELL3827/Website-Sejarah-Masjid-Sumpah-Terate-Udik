@extends('layouts.public')

@section('title', 'Lokasi')
@section('meta_description', 'Lokasi dan alamat Masjid Sumpah di Kampung Terate Udik, Kota Cilegon, Provinsi Banten, beserta peta panduan arah.')

@section('content')

    <x-page-header
        title="Lokasi Masjid"
        subtitle="Posisi masjid di Kota Cilegon, beserta peta dan petunjuk arah."
        eyebrow="Petunjuk Arah" />

    <section class="section section-cream">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="location-info-card">
                        <div class="location-info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <h2 class="location-info-title">{{ $mosque?->name ?? 'Masjid Sumpah' }}</h2>

                        @if ($mosque?->address)
                            <div class="location-info-row">
                                <div class="row-label"><i class="bi bi-building"></i> Alamat</div>
                                <p class="mb-0">{{ $mosque->address }}</p>
                            </div>
                        @endif

                        <div class="location-info-row">
                            <div class="row-label"><i class="bi bi-pin-map"></i> Kota / Kabupaten</div>
                            <p class="mb-0">Cilegon</p>
                        </div>

                        <div class="location-info-row">
                            <div class="row-label"><i class="bi bi-flag"></i> Provinsi</div>
                            <p class="mb-0">Banten</p>
                        </div>

                        @if ($mosque)
                            <div class="mt-4 d-grid">
                                <a href="{{ $mosque->google_maps_link }}" target="_blank" rel="noopener" class="btn btn-gold btn-lg">
                                    <i class="bi bi-map me-2"></i>Buka Google Maps
                                </a>
                            </div>
                        @endif

                        <div class="location-note mt-4">
                            <i class="bi bi-info-circle me-2"></i>
                            Posisi di peta dan koordinat ini merujuk pada lokasi halaman masjid yang dibagikan pengurus.
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="location-map-card h-100">
                        @if ($mosque)
                            <iframe src="{{ $mosque->google_maps_embed_url }}" class="location-embed"
                                    loading="lazy"
                                    title="Peta {{ $mosque->name }}"
                                    allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @else
                            <div class="map-placeholder h-100">
                                <i class="bi bi-map display-4"></i>
                                <p class="mt-3 mb-0">Peta belum tersedia. Admin dapat mengatur koordinat melalui panel admin.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection