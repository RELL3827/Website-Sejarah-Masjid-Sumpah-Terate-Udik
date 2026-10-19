@props(['photo'])

<figure class="gallery-card">
    <button type="button"
            class="gallery-trigger"
            data-bs-toggle="modal"
            data-bs-target="#galleryLightbox"
            data-lightbox-image="{{ $photo->image_url }}"
            data-lightbox-title="{{ $photo->title }}"
            data-lightbox-description="{{ $photo->description }}"
            data-lightbox-year="{{ $photo->year }}"
            data-lightbox-category="{{ $photo->category }}"
            aria-label="Lihat foto {{ $photo->title }}">
        <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}" class="gallery-image" loading="lazy">
        <figcaption class="gallery-overlay">
            <span class="gallery-category">{{ $photo->category }}</span>
            <h3 class="gallery-title">{{ $photo->title }}</h3>
            @if ($photo->year)
                <span class="gallery-year"><i class="bi bi-calendar3"></i> {{ $photo->year }}</span>
            @endif
        </figcaption>
    </button>
</figure>