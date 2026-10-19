@extends('layouts.admin')

@section('title', 'Pengaturan Website')

@section('content')

    <h1 class="admin-h1 mb-1">Pengaturan Website</h1>
    <p class="text-muted mb-4">Identitas, hero section, kontak, dan tautan media sosial.</p>

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="admin-card">
                    <h2 class="admin-card-title mb-3">Identitas Website</h2>

                    <div class="mb-3">
                        <label for="site_name" class="form-label">Nama Website <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name"
                               value="{{ old('site_name', setting('site_name')) }}" required>
                        @error('site_name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="site_tagline" class="form-label">Tagline</label>
                        <input type="text" class="form-control @error('site_tagline') is-invalid @enderror" id="site_tagline" name="site_tagline"
                               value="{{ old('site_tagline', setting('site_tagline')) }}">
                        @error('site_tagline')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-0">
                        <label for="site_description" class="form-label">Deskripsi Website</label>
                        <textarea class="form-control @error('site_description') is-invalid @enderror" id="site_description" name="site_description" rows="3">{{ old('site_description', setting('site_description')) }}</textarea>
                        <div class="form-text">Digunakan untuk meta description default dan bagian footer.</div>
                        @error('site_description')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="admin-card">
                    <h2 class="admin-card-title mb-3">Hero Section</h2>

                    <div class="mb-3">
                        <label for="hero_title" class="form-label">Judul Hero</label>
                        <input type="text" class="form-control @error('hero_title') is-invalid @enderror" id="hero_title" name="hero_title"
                               value="{{ old('hero_title', setting('hero_title')) }}">
                        @error('hero_title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hero_subtitle" class="form-label">Subjudul Hero</label>
                        <input type="text" class="form-control @error('hero_subtitle') is-invalid @enderror" id="hero_subtitle" name="hero_subtitle"
                               value="{{ old('hero_subtitle', setting('hero_subtitle')) }}">
                        @error('hero_subtitle')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="hero_image" class="form-label">Gambar Latar Hero</label>
                        <input type="file" class="form-control @error('hero_image') is-invalid @enderror" id="hero_image" name="hero_image" accept="image/*">
                        <div class="form-text">JPG, PNG, WEBP. Maksimal 8 MB. Direkomendasikan berukuran lebar &ge; 1600px.</div>
                        @error('hero_image')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="admin-card">
                    <h2 class="admin-card-title mb-3">Kontak & Media Sosial</h2>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="contact_email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('contact_email') is-invalid @enderror" id="contact_email" name="contact_email"
                                   value="{{ old('contact_email', setting('contact_email')) }}">
                            @error('contact_email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="contact_phone" class="form-label">Telepon</label>
                            <input type="text" class="form-control @error('contact_phone') is-invalid @enderror" id="contact_phone" name="contact_phone"
                                   value="{{ old('contact_phone', setting('contact_phone')) }}">
                            @error('contact_phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="contact_address" class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('contact_address') is-invalid @enderror" id="contact_address" name="contact_address"
                                   value="{{ old('contact_address', setting('contact_address')) }}">
                            @error('contact_address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="facebook_url" class="form-label">Facebook</label>
                            <input type="url" class="form-control @error('facebook_url') is-invalid @enderror" id="facebook_url" name="facebook_url"
                                   value="{{ old('facebook_url', setting('facebook_url')) }}" placeholder="https://facebook.com/...">
                            @error('facebook_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="instagram_url" class="form-label">Instagram</label>
                            <input type="url" class="form-control @error('instagram_url') is-invalid @enderror" id="instagram_url" name="instagram_url"
                                   value="{{ old('instagram_url', setting('instagram_url')) }}" placeholder="https://instagram.com/...">
                            @error('instagram_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="twitter_url" class="form-label">X / Twitter</label>
                            <input type="url" class="form-control @error('twitter_url') is-invalid @enderror" id="twitter_url" name="twitter_url"
                                   value="{{ old('twitter_url', setting('twitter_url')) }}" placeholder="https://x.com/...">
                            @error('twitter_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="youtube_url" class="form-label">YouTube</label>
                            <input type="url" class="form-control @error('youtube_url') is-invalid @enderror" id="youtube_url" name="youtube_url"
                                   value="{{ old('youtube_url', setting('youtube_url')) }}" placeholder="https://youtube.com/...">
                            @error('youtube_url')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="admin-card">
                    <h2 class="admin-card-title mb-3">Hak Cipta</h2>

                    <div>
                        <label for="copyright_text" class="form-label">Teks Hak Cipta</label>
                        <input type="text" class="form-control @error('copyright_text') is-invalid @enderror" id="copyright_text" name="copyright_text"
                               value="{{ old('copyright_text', setting('copyright_text')) }}">
                        @error('copyright_text')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="admin-card sticky-lg-top" style="top: 90px;">
                    <h2 class="admin-card-title mb-3">Simpan Perubahan</h2>
                    <p class="text-muted small">
                        Perubahan akan langsung diterapkan pada seluruh halaman website.
                    </p>
                    <button type="submit" class="btn btn-gold w-100 btn-lg">
                        <i class="bi bi-save me-2"></i>Simpan Pengaturan
                    </button>
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-brown w-100 mt-2">
                        <i class="bi bi-eye me-2"></i>Lihat Website
                    </a>
                </div>
            </div>
        </div>
    </form>

@endsection