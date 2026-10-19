@extends('layouts.public')

@section('title', 'Artikel')
@section('meta_description', 'Kumpulan artikel sejarah dan dokumentasi Masjid Sumpah Cilegon.')

@section('content')

    <x-page-header
        title="Artikel"
        subtitle="Tulisan tentang sejarah masjid, latar Cilegon, dan arsip yang sedang kami kumpulkan."
        eyebrow="Arsip Artikel" />

    <section class="section section-cream">
        <div class="container">
            <div class="filter-bar mb-5">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <a href="{{ route('articles.index') }}"
                       class="filter-chip {{ ! request()->filled('category') ? 'active' : '' }}">
                        Semua
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('articles.index', ['category' => $category->id]) }}"
                           class="filter-chip {{ request()->integer('category') === $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            @if ($articles->isNotEmpty())
                <div class="row g-4">
                    @foreach ($articles as $article)
                        <div class="col-md-6 col-lg-4">
                            <x-article-card :article="$article" />
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <x-pagination :paginator="$articles" />
                </div>
            @else
                <div class="text-center py-5">
                    <div class="empty-icon"><i class="bi bi-newspaper"></i></div>
                    <p class="mt-3 text-muted">Belum ada artikel yang diterbitkan.</p>
                </div>
            @endif
        </div>
    </section>

@endsection