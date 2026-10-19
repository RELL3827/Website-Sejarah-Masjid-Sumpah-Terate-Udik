@props(['type' => 'success', 'message' => null])

@if ($message)
    @php
        $icons = [
            'success' => 'bi-check-circle-fill',
            'danger' => 'bi-exclamation-triangle-fill',
            'warning' => 'bi-exclamation-circle-fill',
            'info' => 'bi-info-circle-fill',
        ];
        $classes = [
            'success' => 'alert-success',
            'danger' => 'alert-danger',
            'warning' => 'alert-warning',
            'info' => 'alert-info',
        ];
    @endphp
    <div class="alert {{ $classes[$type] ?? 'alert-success' }} alert-dismissible fade show" role="alert">
        <i class="bi {{ $icons[$type] ?? 'bi-check-circle-fill' }} me-2"></i>{{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif