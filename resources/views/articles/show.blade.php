@extends('layouts.public')

@section('title', $article->title)
@section('meta_description', $article->meta_description ?: Str::limit($article->excerpt, 160))
@section('og_image', $article->thumbnail_url)

@section('content')

    <article class="article-detail">

        <header class="article-hero">
            <div class="article-hero-overlay"></div>
            <div class="container position-relative">
                <div class="article-hero-inner">
                    <div class="article-hero-top">
                        <x-category-badge :category="$article->category" />
                    </div>
                    <h1 class="article-hero-title">{{ $article->title }}</h1>
                    <div class="article-hero-meta">
                        <span><i class="bi bi-person"></i> {{ $article->author?->name ?? 'Admin' }}</span>
                        <span><i class="bi bi-calendar3"></i> {{ $article->published_date }}</span>
                        @if ($article->category)
                            <span><i class="bi bi-folder2-open"></i> {{ $article->category->name }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </article>

        <section class="section section-cream">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <div class="article-body card museum-article">
                            @if ($article->thumbnail)
                                <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="article-cover img-fluid" loading="lazy">
                            @endif

                            @if ($article->excerpt)
                                <p class="article-lead">{{ $article->excerpt }}</p>
                            @endif

                            <div class="article-content">
                                {!! $article->content !!}
                            </div>

                            <div class="article-tags mt-4 pt-4 border-top">
                                <span class="me-1"><i class="bi bi-folder2-open me-1"></i>Kategori:</span>
                                <x-category-badge :category="$article->category" />
                            </div>
                        </div>

                        <nav class="share-bar mt-4" aria-label="Bagikan artikel">
                            <span class="me-2">Bagikan:</span>
                            @php
                                $url = urlencode($article->thumbnail_url);
                            @endphp
                            <a class="share-btn share-whatsapp" target="_blank" rel="noopener"
                               href="https://wa.me/?text={{ urlencode($article->title . ' ' . route('articles.show', $article->slug)) }}" aria-label="Bagikan ke WhatsApp">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a class="share-btn share-facebook" target="_blank" rel="noopener"
                               href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('articles.show', $article->slug)) }}" aria-label="Bagikan ke Facebook">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a class="share-btn share-twitter" target="_blank" rel="noopener"
                               href="https://twitter.com/intent/tweet?url={{ urlencode(route('articles.show', $article->slug)) }}" aria-label="Bagikan ke X">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                        </nav>
                    </div>

                    <div class="col-lg-4">
                        <aside class="sidebar">
                            <div class="sidebar-card mb-4">
                                <h3 class="sidebar-title">Tentang Penulis</h3>
                                <div class="author-box">
                                    <div class="author-avatar">
                                        {{ strtoupper(substr($article->author?->name ?? 'A', 0, 1)) }}
                                    </div>
                                    <div class="author-info">
                                        <strong>{{ $article->author?->name ?? 'Administrator' }}</strong>
                                        <p class="mb-0">Pengelola arsip digital Masjid Sumpah Cilegon.</p>
                                    </div>
                                </div>
                            </div>

                            @if ($relatedArticles->isNotEmpty())
                                <div class="sidebar-card">
                                    <h3 class="sidebar-title">Artikel Terkait</h3>
                                    <ul class="related-list">
                                        @foreach ($relatedArticles as $related)
                                            <li>
                                                <a href="{{ route('articles.show', $related->slug) }}" class="related-item">
                                                    <span class="related-thumb">
                                                        <img src="{{ $related->thumbnail_url }}" alt="{{ $related->title }}" loading="lazy">
                                                    </span>
                                                    <span class="related-text">
                                                        <span class="related-title">{{ $related->title }}</span>
                                                        <span class="related-date"><i class="bi bi-calendar3"></i> {{ $related->published_date }}</span>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="sidebar-card mt-4">
                                <h3 class="sidebar-title">Arsip Digital</h3>
                                <p class="small text-muted mb-0">
                                    Website ini dikelola sebagai <strong>digital historical archive</strong> untuk
                                    mendokumentasikan warisan budaya Masjid Sumpah Cilegon.
                                </p>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </article>

@endsection