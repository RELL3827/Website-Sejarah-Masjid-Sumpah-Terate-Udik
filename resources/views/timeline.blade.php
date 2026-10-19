@extends('layouts.public')

@section('title', 'Timeline Sejarah')
@section('meta_description', 'Garis waktu sejarah Masjid Sumpah Cilegon — era Kesultanan Banten, Masjid Perjuangan, Ki Akhmad pasca Geger Cilegon, hingga DKM modern.')

@section('content')

    <x-page-header
        title="Timeline Sejarah Masjid Sumpah"
        subtitle="Titik perjalanan sejarah, estafet juru kunci, dan perkembangan Masjid Sumpah dari masa ke masa."
        eyebrow="Jejak Waktu" />

    <section class="section section-cream">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    @if ($timelines->isNotEmpty())
                        <div class="timeline-list">
                            @foreach ($timelines as $index => $item)
                                <x-timeline-item :item="$item" :index="$index" />
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="empty-icon"><i class="bi bi-clock-history"></i></div>
                            <p class="text-muted mt-3">Data timeline sedang disiapkan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container text-center">
            <div class="notice-box mx-auto" style="max-width:760px;">
                <div class="notice-box-icon"><i class="bi bi-clock-history"></i></div>
                <div class="notice-box-text text-start">
                    <h3>Linimasa Sejarah Lisan & Kasepuhan</h3>
                    <p class="mb-0">
                        Linimasa ini dirangkum berdasarkan penuturan turun-temurun para sesepuh Kampung Terate Udik, silsilah keluarga pejuang Geger Cilegon 1888, dan pengurus DKM Masjid Sumpah.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection