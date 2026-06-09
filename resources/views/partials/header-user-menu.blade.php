@php
    $u = auth()->user();
    $displayName = $u->name ?? \Illuminate\Support\Str::before($u->email, '@');
    $dashboardRoute = $u->is_admin ? route('admin.dashboard', [], false) : route('dashboard', [], false);
@endphp
<div class="dropdown site-user-menu">
    <button type="button" class="site-user-menu__trigger dropdown-toggle" id="siteUserMenuBtn" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false" aria-haspopup="true">
        <img src="{{ $u->avatarUrl() }}" alt="" class="site-user-menu__avatar" width="32" height="32" loading="lazy">
        <span class="site-user-menu__name">{{ $displayName }}</span>
        <i class="fa-solid fa-chevron-down site-user-menu__chevron" aria-hidden="true"></i>
    </button>
    <ul class="dropdown-menu dropdown-menu-end site-user-menu__dropdown shadow-sm" role="menu" aria-labelledby="siteUserMenuBtn">
        <li role="none">
            <a href="{{ $dashboardRoute }}" class="dropdown-item site-user-menu__item" role="menuitem">
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i> Dashboard
            </a>
        </li>
        <li role="none"><hr class="dropdown-divider my-1"></li>
        <li role="none">
            <form action="{{ route('logout', [], false) }}" method="post" class="m-0">
                @csrf
                <button type="submit" class="dropdown-item site-user-menu__item site-user-menu__item--danger w-100" role="menuitem">
                    <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
