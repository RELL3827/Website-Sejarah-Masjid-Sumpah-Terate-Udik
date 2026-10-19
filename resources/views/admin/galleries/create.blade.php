@extends('layouts.admin')

@section('title', 'Unggah Foto Galeri')

@section('content')

    <h1 class="admin-h1 mb-4">Unggah Foto Galeri</h1>

    <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data" class="admin-card" style="max-width: 920px;">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Judul Foto <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" @selected(old('category') === $category)>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="year" class="form-label">Tahun</label>
                <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year') }}" placeholder="contoh: 1990">
                @error('year')
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
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar <span class="text-danger">*</span></label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>
            <div class="form-text">JPG, PNG, WEBP, GIF. Maksimal 8 MB.</div>
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-gold"><i class="bi bi-upload me-1"></i>Unggah</button>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>

@endsection