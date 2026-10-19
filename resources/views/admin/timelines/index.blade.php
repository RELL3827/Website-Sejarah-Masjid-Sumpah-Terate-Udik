@extends('layouts.admin')

@section('title', 'Kelola Timeline Sejarah')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h1 class="admin-h1 mb-1">Kelola Timeline Sejarah</h1>
            <p class="text-muted mb-0">Urutkan peristiwa bersejarah dari masa ke masa.</p>
        </div>
        <a href="{{ route('admin.timelines.create') }}" class="btn btn-gold mt-2 mt-md-0">
            <i class="bi bi-plus-lg me-1"></i>Tambah Timeline
        </a>
    </div>

    <div class="admin-card">
        @if ($timelines->isEmpty())
            <div class="text-center py-5">
                <div class="empty-icon"><i class="bi bi-clock-history"></i></div>
                <p class="text-muted mt-3 mb-0">Belum ada timeline.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Urutan</th>
                            <th>Tahun</th>
                            <th>Peristiwa</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aktif</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timelines as $timeline)
                            <tr>
                                <td><span class="badge bg-brown-soft">{{ $timeline->sort_order }}</span></td>
                                <td class="fw-semibold">{{ $timeline->year ?: '—' }}</td>
                                <td>{{ Str::limit($timeline->title, 50) }}</td>
                                <td class="text-muted">{{ Str::limit($timeline->description, 60) }}</td>
                                <td>
                                    @if ($timeline->image)
                                        <img src="{{ $timeline->image_url }}" alt="" class="admin-thumb" loading="lazy">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($timeline->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.timelines.edit', $timeline) }}" class="btn btn-sm btn-outline-brown"><i class="bi bi-pencil"></i></a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteTimeline{{ $timeline->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="deleteTimeline{{ $timeline->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Timeline</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Yakin ingin menghapus peristiwa <strong>"{{ $timeline->title }}"</strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <form method="POST" action="{{ route('admin.timelines.destroy', $timeline) }}">
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
        @endif
    </div>

@endsection