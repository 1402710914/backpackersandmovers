@php
    $u = $u ?? auth()->user();
    $displayName = $u?->name ?? ($u ? \Illuminate\Support\Str::before($u->email, '@') : '');
@endphp
@if ($u)
    <div class="admin-user-menu">
        <button type="button" class="admin-user-pill" id="adminUserMenuBtn" aria-haspopup="true" aria-expanded="false" aria-controls="adminUserDropdown">
            <img src="{{ $u->avatarUrl() }}" alt="" class="admin-user-avatar-img" width="32" height="32" loading="lazy">
            <span class="admin-user-meta d-none d-sm-block">
                <strong>{{ $u->headerRoleLabel() }}</strong>
                <span>{{ $displayName }}</span>
            </span>
            <i class="fa-solid fa-chevron-down admin-user-chevron d-none d-sm-inline-block" aria-hidden="true"></i>
        </button>
        <div class="admin-user-dropdown" id="adminUserDropdown" role="menu" aria-labelledby="adminUserMenuBtn">
            <a href="{{ route('admin.dashboard') }}" class="admin-user-dropdown__item" role="menuitem">
                <i class="fa-solid fa-gauge-high" aria-hidden="true"></i> Dashboard
            </a>
            <form action="{{ route('admin.logout') }}" method="post" class="admin-user-dropdown__form" role="none">
                @csrf
                <button type="submit" class="admin-user-dropdown__item admin-user-dropdown__item--danger" role="menuitem">
                    <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Logout
                </button>
            </form>
        </div>
    </div>
@endif
