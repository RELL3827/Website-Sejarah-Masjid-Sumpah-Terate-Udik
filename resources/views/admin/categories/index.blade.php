@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h1 class="admin-h1 mb-1">Kelola Kategori</h1>
            <p class="text-muted mb-0">Kategori untuk mengelompokkan artikel sejarah.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-gold mt-2 mt-md-0">
            <i class="bi bi-plus-lg me-1"></i>Tambah Kategori
        </a>
    </div>

    <div class="admin-card">
        @if ($categories->isEmpty())
            <div class="text-center py-5">
                <div class="empty-icon"><i class="bi bi-tags"></i></div>
                <p class="text-muted mt-3 mb-0">Belum ada kategori.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table admin-table align-middle">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Slug</th>
                            <th>Deskripsi</th>
                            <th>Jumlah Artikel</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td class="fw-semibold">{{ $category->name }}</td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td class="text-muted">{{ Str::limit($category->description, 60) }}</td>
                                <td><span class="badge bg-brown-soft">{{ $category->articles_count }}</span></td>
                                <td class="text-end">
                                    <div class="d-inline-flex gap-1">
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-brown"><i class="bi bi-pencil"></i></a>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteCat{{ $category->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <div class="modal fade" id="deleteCat{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    @if ($category->articles_count > 0)
                                                        Kategori <strong>"{{ $category->name }}"</strong> masih memiliki
                                                        {{ $category->articles_count }} artikel sehingga tidak dapat dihapus.
                                                    @else
                                                        Yakin ingin menghapus kategori <strong>"{{ $category->name }}"</strong>?
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                                    @if ($category->articles_count === 0)
                                                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                        </form>
                                                    @endif
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