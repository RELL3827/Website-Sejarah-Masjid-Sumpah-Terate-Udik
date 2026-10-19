@props(['article'])

<article class="card article-card h-100 {{ $article->is_featured ? 'article-card-featured' : '' }}">
    <a href="{{ route('articles.show', $article->slug) }}" class="article-thumb-link" tabindex="-1">
        <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="card-img-top article-thumb" loading="lazy">
        @if ($article->is_featured)
            <span class="badge badge-featured"><i class="bi bi-star-fill"></i> Unggulan</span>
        @endif
    </a>
    <div class="card-body d-flex flex-column">
        <x-category-badge :category="$article->category" />

        <h3 class="card-title article-title">
            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
        </h3>

        <p class="card-text article-excerpt">{{ Str::limit($article->excerpt ?: strip_tags($article->content), 120) }}</p>

        <div class="article-meta mt-auto pt-3">
            <div class="d-flex flex-wrap align-items-center gap-2">
                <span class="meta-item"><i class="bi bi-person"></i> {{ $article->author?->name ?? 'Admin' }}</span>
                <span class="meta-item"><i class="bi bi-calendar3"></i> {{ $article->published_date }}</span>
            </div>
            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-link btn-article-read p-0">
                Baca Artikel <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</article>