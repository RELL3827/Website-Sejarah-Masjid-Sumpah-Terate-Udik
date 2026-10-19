@extends('layouts.admin')

@section('title', 'Kelola Artikel')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h1 class="admin-h1 mb-1">Kelola Artikel</h1>
            <p class="text-muted mb-0">Tambah, sunting, publikasikan, atau hapus artikel sejarah.</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-gold mt-2 mt-md-0">
            <i class="bi bi-plus-lg me-1"></i>Tambah Artikel
        </a>
    </div>

    <div class="admin-card">
        @if ($articles->isEmpty())
            <div class="text-center py-5">
                <div class="empty-icon"><i class="bi bi-newspaper"></i></div>
                <p class="text-muted mt-3 mb-2">Belum ada artikel.</p>
                <a href="{{ route('admin.articles.create') }}" class="btn btn-gold btn-sm">Tulis Artikel Pertama</a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 70px;">Thumb</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Unggulan</th>
                            <th>Penulis</th>
                            <th>Dipublikasi</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>
                                    <img src="{{ $article->thumbnail_url }}" alt="" class="admin-thumb" loading="lazy">
                                </td>
                                <td>
                                    <a href="{{ route('admin.articles.edit', $article) }}" class="fw-semibold text-decoration-none">{{ Str::limit($article->title, 55) }}</a>
                                </td>
                                <td>{{ $article->category?->name ?? '—' }}</td>
                                <td>
                                    @if ($article->status === 'published')
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($article->is_featured)
                                        <i class="bi bi-star-fill text-warning" title="Unggulan"></i>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="text-muted">{{ $article->author?->name ?? '—' }}</td>
                                <td class="text-muted">{{ $article->published_at?->format('d M Y') ?? '—' }}</td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <form method="POST" action="{{ route('admin.articles.toggle-publish', $article) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-brown" title="{{ $article->status === 'published' ? 'Simpan sebagai draf' : 'Publikasikan' }}">
                                                @if ($article->status === 'published')
                                                    <i class="bi bi-pencil-square"></i>
                                                @else
                                                    <i class="bi bi-send"></i>
                                                @endif
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-outline-brown" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" title="Hapus"
                                                data-bs-toggle="modal" data-bs-target="#deleteArticle{{ $article->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="deleteArticle{{ $article->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Artikel</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Yakin ingin menghapus artikel <strong>"{{ Str::limit($article->title, 60) }}"</strong>? Tindakan ini tidak dapat dibatalkan.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="{{ route('admin.articles.destroy', $article) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <x-pagination :paginator="$articles" />
            </div>
        @endif
    </div>

@endsection