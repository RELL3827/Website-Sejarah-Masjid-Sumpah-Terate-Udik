@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h1 class="admin-h1 mb-1">Kelola Galeri</h1>
            <p class="text-muted mb-0">Dokumentasi visual bangunan, interior, eksterior, dan kegiatan.</p>
        </div>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-gold mt-2 mt-md-0">
            <i class="bi bi-plus-lg me-1"></i>Unggah Foto
        </a>
    </div>

    <div class="admin-card">
        @if ($galleries->isEmpty())
            <div class="text-center py-5">
                <div class="empty-icon"><i class="bi bi-images"></i></div>
                <p class="text-muted mt-3 mb-0">Belum ada foto galeri.</p>
            </div>
        @else
            <div class="row g-3">
                @foreach ($galleries as $gallery)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="admin-gallery-item">
                            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="admin-gallery-img" loading="lazy">
                            <div class="admin-gallery-overlay">
                                <span class="admin-gallery-title">{{ Str::limit($gallery->title, 40) }}</span>
                                <span class="admin-gallery-category">{{ $gallery->category }}</span>
                                <div class="d-flex gap-1 mt-2">
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-light"><i class="bi bi-pencil"></i></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGallery{{ $gallery->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="admin-gallery-badge {{ $gallery->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}
                            </div>
                        </div>

                        <div class="modal fade" id="deleteGallery{{ $gallery->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Foto</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        Yakin ingin menghapus foto <strong>"{{ $gallery->title }}"</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form method="POST" action="{{ route('admin.galleries.destroy', $gallery) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                <x-pagination :paginator="$galleries" />
            </div>
        @endif
    </div>

@endsection