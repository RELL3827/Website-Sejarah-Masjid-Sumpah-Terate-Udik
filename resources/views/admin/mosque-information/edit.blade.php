@extends('layouts.admin')

@section('title', 'Kelola Informasi Masjid')

@section('content')

    <h1 class="admin-h1 mb-1">Kelola Informasi Masjid</h1>
    <p class="text-muted mb-4">Informasi ini ditampilkan pada halaman Beranda, Sejarah, Tentang, dan Lokasi.</p>

    <form method="POST" action="{{ route('admin.mosque-information.update') }}" class="admin-card">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Masjid <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ old('name', $mosque?->name) }}" required>
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                           value="{{ old('address', $mosque?->address) }}">
                    @error('address')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi Singkat</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $mosque?->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="history" class="form-label">Sejarah</label>
            <textarea class="form-control @error('history') is-invalid @enderror" id="history" name="history" rows="6">{{ old('history', $mosque?->history) }}</textarea>
            <div class="form-text">Mendukung HTML. Pastikan hanya mengisi dengan data yang sudah terverifikasi.</div>
            @error('history')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="architecture" class="form-label">Arsitektur</label>
            <textarea class="form-control @error('architecture') is-invalid @enderror" id="architecture" name="architecture" rows="5">{{ old('architecture', $mosque?->architecture) }}</textarea>
            @error('architecture')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cultural_value" class="form-label">Nilai Budaya</label>
            <textarea class="form-control @error('cultural_value') is-invalid @enderror" id="cultural_value" name="cultural_value" rows="5">{{ old('cultural_value', $mosque?->cultural_value) }}</textarea>
            @error('cultural_value')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude"
                       value="{{ old('latitude', $mosque?->latitude) }}" placeholder="contoh: -6.0029">
                @error('latitude')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude"
                       value="{{ old('longitude', $mosque?->longitude) }}" placeholder="contoh: 106.0114">
                @error('longitude')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">
                <div class="form-text">
                    <i class="bi bi-info-circle me-1"></i>
                    Jika latitude/longitude kosong, peta menggunakan pencarian berdasarkan alamat pada Google Maps.
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-gold"><i class="bi bi-save me-1"></i>Simpan Informasi</button>
            <a href="{{ route('about') }}" target="_blank" class="btn btn-outline-brown">Pratinjau Halaman Tentang</a>
        </div>
    </form>

@endsection