@extends('layouts.admin')

@section('title', 'Edit Timeline')

@section('content')

    <h1 class="admin-h1 mb-4">Edit Timeline</h1>

    <form method="POST" action="{{ route('admin.timelines.update', $timeline) }}" enctype="multipart/form-data" class="admin-card" style="max-width: 920px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul Peristiwa <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $timeline->title) }}" required>
            @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <label for="year" class="form-label">Tahun</label>
                <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $timeline->year) }}" placeholder="contoh: 1888 / 1920 / Saat Ini">
                @error('year')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="sort_order" class="form-label">Urutan</label>
                <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', $timeline->sort_order) }}" min="0">
                @error('sort_order')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4">
                <div class="form-check form-switch mt-4">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                           @checked(old('is_active', $timeline->is_active))>
                    <label for="is_active" class="form-check-label">Aktif</label>
                </div>
            </div>
        </div>

        <div class="mb-3 mt-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $timeline->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        @if ($timeline->image)
            <div class="mb-3">
                <p class="form-label mb-2">Foto Saat Ini</p>
                <img src="{{ $timeline->image_url }}" alt="" class="admin-form-image rounded">
            </div>
        @endif

        <div class="mb-3">
            <label for="image" class="form-label">{{ $timeline->image ? 'Ganti Foto' : 'Foto' }}</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            <div class="form-text">JPG, PNG, WEBP, GIF. Maksimal 4 MB.</div>
            @error('image')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-gold"><i class="bi bi-save me-1"></i>Perbarui</button>
            <a href="{{ route('admin.timelines.index') }}" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>

@endsection