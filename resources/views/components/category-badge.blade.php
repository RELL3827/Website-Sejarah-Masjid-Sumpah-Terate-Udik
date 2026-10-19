@props(['category'])

@if ($category)
    @php
        $styles = [
            'sejarah' => 'badge-cat-sejarah',
            'tokoh' => 'badge-cat-tokoh',
            'arsitektur' => 'badge-cat-arsitektur',
            'budaya' => 'badge-cat-budaya',
            'tradisi' => 'badge-cat-tradisi',
            'dokumentasi' => 'badge-cat-dokumentasi',
            'perkembangan masjid' => 'badge-cat-perkembangan',
        ];
        $styleClass = $styles[strtolower($category->name)] ?? 'badge-cat-default';
    @endphp
    <a href="{{ route('articles.index', ['category' => $category->id]) }}" class="category-badge {{ $styleClass }}">
        {{ $category->name }}
    </a>
@else
    <span class="category-badge badge-cat-default">Umum</span>
@endif