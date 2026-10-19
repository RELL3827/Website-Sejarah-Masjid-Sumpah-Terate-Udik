@extends('layouts.public')

@section('title', 'Galeri')
@section('meta_description', 'Dokumentasi visual Masjid Sumpah Cilegon — bangunan, interior, eksterior, dan kegiatan keagamaan.')

@section('content')

    <x-page-header
        title="Galeri Dokumentasi"
        subtitle="Dokumentasi visual autentik Masjid Sumpah Terate Udik — bangunan, interior mihrab, eksterior, serta arsip foto sejarah tempo dulu."
        eyebrow="Dokumentasi Visual" />

    <section class="section section-cream">
        <div class="container">
            <div class="filter-bar mb-5">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <a href="{{ route('gallery') }}"
                       class="filter-chip {{ ! request()->filled('category') ? 'active' : '' }}">
                        Semua
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('gallery', ['category' => $category]) }}"
                           class="filter-chip {{ request()->string('category')->toString() === $category ? 'active' : '' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            </div>

            @if ($galleries->isNotEmpty())
                <div class="row g-4">
                    @foreach ($galleries as $photo)
                        <div class="col-6 col-md-4 col-lg-3">
                            <x-gallery-card :photo="$photo" />
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <x-pagination :paginator="$galleries" />
                </div>
            @else
                <div class="text-center py-5">
                    <div class="empty-icon"><i class="bi bi-images"></i></div>
                    <p class="mt-3 text-muted">Belum ada foto galeri.</p>
                </div>
            @endif
        </div>
    </section>

    <div class="modal fade" id="galleryLightbox" tabindex="-1" aria-hidden="true" aria-label="Pratinjau foto">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content gallery-lightbox">
                <div class="modal-header">
                    <div>
                        <span class="gallery-lb-category" id="galleryLbCategory"></span>
                        <h2 class="modal-title" id="galleryLbTitle"></h2>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <img src="" alt="" class="gallery-lb-image" id="galleryLbImage">
                </div>
                <div class="modal-footer">
                    <p class="text-light mb-0" id="galleryLbDescription"></p>
                    <span class="text-gold ms-auto" id="galleryLbYear"></span>
                </div>
            </div>
        </div>
    </div>

@endsection