@props(['title', 'subtitle' => null, 'eyebrow' => null])

<section class="page-header">
    <div class="page-header-pattern" aria-hidden="true"></div>
    <div class="container position-relative">
        @if ($eyebrow)
            <p class="page-header-eyebrow">{{ $eyebrow }}</p>
        @endif
        <h1 class="page-header-title">{{ $title }}</h1>
        @if ($subtitle)
            <p class="page-header-subtitle">{{ $subtitle }}</p>
        @endif
    </div>
</section>