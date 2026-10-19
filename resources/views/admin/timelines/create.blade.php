@extends('layouts.admin')

@section('title', 'Tambah Timeline')

@section('content')

    <h1 class="admin-h1 mb-4">Tambah Timeline</h1>

    <form method="POST" action="{{ route('admin.timelines.store') }}" enctype="multipart/form-data" class="admin-card" style="max-width: 920px;">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Peristiwa <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <label for="year" class="form-label">Tahun</label>
                <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" placeholder="contoh: 1888 / 1920 / Saat Ini">
                @error('year')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="sort_order" class="form-label">Urutan</label>
                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                <div class="form-text">Nomor lebih kecil tampil lebih awal.</div>
                @error('sort_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <div class="form-check form-switch mt-4">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" checked>
                    <label for="is_active" class="form-check-label">Aktif</label>
                </div>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Foto</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            <div class="form-text">JPG, PNG, WEBP, GIF. Maksimal 4 MB.</div>
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-gold"><i class="bi bi-save me-1"></i>Simpan</button>
            <a href="{{ route('admin.timelines.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>

@endsection