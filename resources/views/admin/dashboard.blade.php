@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h1 class="admin-h1 mb-1">Selamat Datang, {{ auth()->user()->name }}</h1>
            <p class="text-muted mb-0">Ringkasan pengelolaan arsip digital {{ setting('site_name') }}.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-gold mt-2 mt-md-0">
            <i class="bi bi-plus-lg me-1"></i>Artikel Baru
        </a>
    </div>

    <div class="row g-3 mb-4">
        @php
            $cards = [
                ['label' => 'Total Artikel', 'value' => $stats['total_articles'], 'icon' => 'bi-newspaper', 'color' => 'stat-green', 'route' => 'admin.articles.index'],
                ['label' => 'Artikel Published', 'value' => $stats['published_articles'], 'icon' => 'bi-check2-circle', 'color' => 'stat-gold', 'route' => 'admin.articles.index'],
                ['label' => 'Artikel Draft', 'value' => $stats['draft_articles'], 'icon' => 'bi-pencil-square', 'color' => 'stat-brown', 'route' => 'admin.articles.index', 'params' => ['status' => 'draft']],
                ['label' => 'Kategori', 'value' => $stats['total_categories'], 'icon' => 'bi-tags', 'color' => 'stat-green', 'route' => 'admin.categories.index'],
                ['label' => 'Timeline Sejarah', 'value' => $stats['total_timelines'], 'icon' => 'bi-clock-history', 'color' => 'stat-gold', 'route' => 'admin.timelines.index'],
                ['label' => 'Foto Galeri', 'value' => $stats['total_galleries'], 'icon' => 'bi-images', 'color' => 'stat-brown', 'route' => 'admin.galleries.index'],
            ];
        @endphp
        @foreach ($cards as $card)
            <div class="col-6 col-md-4 col-xl-2">
                <a href="{{ route($card['route'], $card['params'] ?? []) }}" class="stat-card {{ $card['color'] }}">
                    <div class="stat-icon"><i class="bi {{ $card['icon'] }}"></i></div>
                    <div class="stat-value">{{ $card['value'] }}</div>
                    <div class="stat-label">{{ $card['label'] }}</div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="admin-card-title mb-0">Artikel Terbaru</h2>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-sm btn-outline-brown">Lihat Semua</a>
                </div>

                @if ($recentArticles->isEmpty())
                    <p class="text-muted mb-0">Belum ada artikel.</p>
                @else
                    <div class="table-responsive">
                        <table class="table admin-table align-middle">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentArticles as $article)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.articles.edit', $article) }}" class="fw-semibold text-decoration-none">{{ Str::limit($article->title, 50) }}</a>
                                        </td>
                                        <td>{{ $article->category?->name ?? '—' }}</td>
                                        <td>
                                            @if ($article->status === 'published')
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Draft</span>
                                            @endif
                                        </td>
                                        <td class="text-muted small">{{ $article->published_at?->format('d M Y') ?? $article->updated_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <div class="col-lg-5">
            <div class="admin-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="admin-card-title mb-0">Timeline Terbaru</h2>
                    <a href="{{ route('admin.timelines.index') }}" class="btn btn-sm btn-outline-brown">Kelola</a>
                </div>

                @if ($recentTimelines->isEmpty())
                    <p class="text-muted mb-0">Belum ada timeline.</p>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach ($recentTimelines as $timeline)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <span class="badge bg-brown-soft me-2">{{ $timeline->year ?: '—' }}</span>
                                    <span class="fw-semibold">{{ Str::limit($timeline->title, 40) }}</span>
                                </div>
                                <a href="{{ route('admin.timelines.edit', $timeline) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="admin-card mt-4">
                <h2 class="admin-card-title mb-3">Aksi Cepat</h2>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.articles.create') }}" class="btn btn-outline-brown"><i class="bi bi-plus-circle me-2"></i>Buat Artikel</a>
                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-outline-brown"><i class="bi bi-images me-2"></i>Unggah Foto Galeri</a>
                    <a href="{{ route('admin.settings.edit') }}" class="btn btn-outline-brown"><i class="bi bi-gear me-2"></i>Pengaturan Website</a>
                </div>
            </div>
        </div>
    </div>

@endsection