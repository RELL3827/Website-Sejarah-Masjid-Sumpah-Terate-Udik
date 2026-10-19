@props([])

<header class="admin-navbar">
    <button class="admin-menu-btn" data-sidebar-open aria-label="Buka menu samping">
        <i class="bi bi-list"></i>
    </button>

    <div class="admin-navbar-title">
        <i class="bi bi-archive text-gold"></i>
        <span>Digital Historical Archive</span>
    </div>

    <div class="admin-navbar-user">
        <div class="admin-user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        <div class="admin-user-info d-none d-md-block">
            <span class="admin-user-name">{{ auth()->user()->name }}</span>
            <span class="admin-user-role">Administrator</span>
        </div>
        <div class="dropdown">
            <button class="btn btn-admin-dropdown" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Menu pengguna">
                <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li><a class="dropdown-item" href="{{ route('home') }}" target="_blank"><i class="bi bi-globe me-2"></i>Lihat Website</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Keluar</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>