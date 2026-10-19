@props(['paginator'])

@if ($paginator->hasPages())
    <nav aria-label="Navigasi halaman" class="pagination-wrap">
        {{ $paginator->links() }}
    </nav>
@endif