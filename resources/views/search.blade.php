@extends('layouts.public')

@section('title', 'Pencarian')
@section('meta_description', 'Cari artikel sejarah dan dokumentasi Masjid Sumpah Cilegon.')

@section('content')

    <x-page-header
        title="Pencarian"
        subtitle="Cari artikel berdasarkan judul, isi, atau kategori."
        eyebrow="Cari Arsip" />

    <section class="section section-cream">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('search') }}" method="GET" class="search-form mb-5">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="q" class="form-control border-start-0"
                                   placeholder="Masukkan kata kunci..." value="{{ $q }}" autofocus>
                            <button type="submit" class="btn btn-gold px-4">Cari</button>
                        </div>
                    </form>

                    @if ($q !== '')
                        <p class="text-muted mb-4">
                            <strong>{{ $articles->total() }}</strong> hasil untuk kata kunci
                            "<strong>{{ $q }}</strong>"
                        </p>
                    @endif

                    @if ($q !== '' && $articles->isEmpty())
                        <div class="text-center py-5">
                            <div class="empty-icon"><i class="bi bi-search"></i></div>
                            <p class="mt-3 text-muted">Tidak ditemukan artikel yang cocok.</p>
                            <p class="text-muted small">Coba kata kunci lain atau telusuri kategori di bawah.</p>
                        </div>
                    @endif

                    @if ($q === '')
                        <p class="text-muted text-center py-4">
                            Ketik kata kunci pada kolom pencarian di atas. Contoh: <em>sejarah</em>, <em>arsitektur</em>, <em>masjid</em>.
                        </p>
                    @endif

                    @if ($q !== '' && $articles->isNotEmpty())
                        <div class="search-results">
                            @foreach ($articles as $article)
                                <article class="search-result-item">
                                    <div class="search-result-thumb">
                                        <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" loading="lazy">
                                    </div>
                                    <div class="search-result-body">
                                        <x-category-badge :category="$article->category" />
                                        <h3 class="search-result-title">
                                            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                                        </h3>
                                        <p class="search-result-excerpt mb-2">{{ Str::limit($article->excerpt ?: strip_tags($article->content), 160) }}</p>
                                        <div class="article-meta">
                                            <span><i class="bi bi-person"></i> {{ $article->author?->name ?? 'Admin' }}</span>
                                            <span><i class="bi bi-calendar3"></i> {{ $article->published_date }}</span>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                        <div class="mt-5">
                            <x-pagination :paginator="$articles" />
                        </div>
                    @endif
                </div>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-lg-8">
                    <div class="popular-categories">
                        <h3 class="sidebar-title">Kategori Populer</h3>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($popularCategories as $category)
                                <a href="{{ route('articles.index', ['category' => $category->id]) }}" class="filter-chip">
                                    {{ $category->name }} <span class="badge bg-brown-soft ms-1">{{ $category->articles_count }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection