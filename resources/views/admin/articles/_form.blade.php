@php
    $statuses = [
        'draft' => 'Draft (Simpan sebagai draf)',
        'published' => 'Published (Langsung diterbitkan)',
    ];
@endphp

<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-card">
            <h2 class="admin-card-title mb-3">Konten Artikel</h2>

            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"
                       id="title" name="title" value="{{ old('title', $article->title ?? '') }}" required>
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="excerpt" class="form-label">Ringkasan (Excerpt)</label>
                <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
                <div class="form-text">Ringkasan singkat yang tampil pada kartu artikel dan hasil pencarian.</div>
                @error('excerpt')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                <label for="content" class="form-label">Isi Artikel <span class="text-danger">*</span></label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="18">{{ old('content', $article->content ?? '') }}</textarea>
                <div class="form-text">Mendukung HTML: gunakan &lt;h3&gt;, &lt;p&gt;, &lt;blockquote&gt;, &lt;ul&gt;, dsb.</div>
                @error('content')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-card">
            <h2 class="admin-card-title mb-3">Pengaturan Penerbitan</h2>

            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                    @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}" @selected(old('status', $article->status ?? 'draft') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1"
                       @checked(old('is_featured', $article->is_featured ?? false))>
                <label for="is_featured" class="form-check-label">Artikel Unggulan (Featured)</label>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">— Pilih Kategori —</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $article->category_id ?? '') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="admin-card">
            <h2 class="admin-card-title mb-3">Thumbnail</h2>

            @if (isset($article) && $article->thumbnail)
                <img src="{{ $article->thumbnail_url }}" alt="" class="img-fluid rounded mb-3 admin-form-image">
            @endif

            <div class="mb-3">
                <label for="thumbnail" class="form-label">
                    {{ isset($article) && $article->thumbnail ? 'Ganti Thumbnail' : 'Pilih Thumbnail' }}
                </label>
                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail" name="thumbnail" accept="image/*">
                <div class="form-text">JPG, PNG, WEBP, GIF. Maksimal 4 MB.</div>
                @error('thumbnail')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="admin-card">
            <h2 class="admin-card-title mb-3">SEO</h2>

            <div class="mb-3">
                <label for="seo_title" class="form-label">SEO Title</label>
                <input type="text" class="form-control @error('seo_title') is-invalid @enderror" id="seo_title" name="seo_title" value="{{ old('seo_title', $article->seo_title ?? '') }}">
                <div class="form-text">Jika kosong, judul artikel yang digunakan.</div>
                @error('seo_title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-0">
                <label for="meta_description" class="form-label">Meta Description</label>
                <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $article->meta_description ?? '') }}</textarea>
                <div class="form-text">Tips: 150–160 karakter.</div>
                @error('meta_description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-gold btn-lg">
        <i class="bi bi-save me-2"></i>{{ isset($article) ? 'Perbarui Artikel' : 'Simpan Artikel' }}
    </button>
    <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary btn-lg">Batal</a>
</div>