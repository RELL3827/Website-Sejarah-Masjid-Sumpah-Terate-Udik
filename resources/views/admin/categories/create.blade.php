@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')

    <h1 class="admin-h1 mb-1">Tambah Kategori</h1>
    <p class="text-muted mb-4">Slug kategori dibuat otomatis berdasarkan nama.</p>

    <div class="admin-card" style="max-width: 720px;">
        <form method="POST" action="{{ route('admin.categories.store') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-gold"><i class="bi bi-save me-1"></i>Simpan</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </div>

@endsection