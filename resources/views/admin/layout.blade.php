<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin-panel.css') }}">
</head>
<body class="admin-body">
@php($u = auth()->user())
<div class="admin-shell" id="adminShell">
    <aside class="admin-sidebar" id="adminSidebar" aria-label="Primary">
        @include('admin.partials.sidebar-nav')
    </aside>
    <div class="admin-sidebar-backdrop" id="adminSidebarBackdrop" hidden aria-hidden="true"></div>

    <div class="admin-main">
        <header class="admin-topbar">
            <span class="d-lg-none fw-semibold text-muted">{{ config('app.name') }}</span>
            <div class="d-flex align-items-center gap-2 ms-lg-auto">
                <a class="admin-btn-site" href="{{ route('home') }}" target="_blank" rel="noopener noreferrer">
                    <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i> View website
                </a>
                @include('admin.partials.user-menu', ['u' => $u])
            </div>
        </header>

        <div class="admin-content">
            @if (session('status'))
                <div class="alert alert-success admin-alert shadow-sm">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger admin-alert shadow-sm">{{ session('error') }}</div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning admin-alert shadow-sm">{{ session('warning') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>

<button type="button" class="admin-menu-btn d-lg-none" id="adminMenuOpen" aria-label="Open menu">
    <i class="fa-solid fa-bars"></i>
</button>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script>
    (function () {
        var shell = document.getElementById('adminShell');
        var openBtn = document.getElementById('adminMenuOpen');
        var backdrop = document.getElementById('adminSidebarBackdrop');
        if (!shell || !openBtn || !backdrop) return;

        function setOpen(open) {
            shell.classList.toggle('admin-sidebar-open', open);
            backdrop.hidden = !open;
            backdrop.setAttribute('aria-hidden', open ? 'false' : 'true');
            openBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        }

        openBtn.addEventListener('click', function () {
            setOpen(!shell.classList.contains('admin-sidebar-open'));
        });
        backdrop.addEventListener('click', function () { setOpen(false); });
        window.addEventListener('resize', function () {
            if (window.matchMedia('(min-width: 992px)').matches) setOpen(false);
        });
    })();

    (function () {
        var menu = document.querySelector('.admin-user-menu');
        var btn = document.getElementById('adminUserMenuBtn');
        if (!menu || !btn) return;

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = menu.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });

        menu.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        document.addEventListener('click', function () {
            menu.classList.remove('is-open');
            btn.setAttribute('aria-expanded', 'false');
        });
    })();
</script>
@stack('scripts')
</body>
</html>
