@props(['item', 'index' => 0])

@php
    $side = $index % 2 === 0 ? 'left' : 'right';
@endphp

<div class="timeline-item {{ $side }}">
    <div class="timeline-marker">
        <span class="timeline-dot"><i class="bi bi-pin-angle-fill"></i></span>
    </div>

    <div class="timeline-card card">
        <div class="card-body">
            @if ($item->image)
                <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="timeline-image rounded mb-3" loading="lazy">
            @endif

            <div class="timeline-year">{{ $item->year ?: 'Tahun belum tercatat' }}</div>
            <h3 class="timeline-title">{{ $item->title }}</h3>
            <p class="timeline-description mb-0">{{ $item->description }}</p>
        </div>
    </div>
</div>