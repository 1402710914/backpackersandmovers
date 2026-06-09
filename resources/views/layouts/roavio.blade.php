<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ $metaDescription ?? config('app.name').' — Travel & tours' }}">
    <title>{{ ($title ?? 'Home').' — '.config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ logo_url() }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/flacticon.css') }}">
    <link rel="stylesheet" href="{{ theme_asset('assets/css/main.css') }}">
    <style>
        .site-brand-logo-header { max-height: 52px; width: auto; display: block; }
        .site-brand-logo-offcanvas { max-height: 48px; width: auto; }
        .site-brand-logo-footer-wide {
            width: 180px;
            max-width: 100%;
            height: auto;
            display: block;
        }
        /* Section headings — contrast + SplitText layout */
        .header-bg .section-title h2,
        .header-bg .section-title h2.text-anim {
            color: #fff !important;
        }
        .header-bg .section-title p {
            color: rgba(255, 255, 255, 0.88);
        }
        .section-title h2.text-anim,
        .section-title h2.sec-title.text-anim {
            opacity: 1 !important;
            visibility: visible !important;
            line-height: 1.12;
            overflow: visible;
        }
        .section-title h2.text-anim .char {
            display: inline-block;
            vertical-align: top;
        }
        .section-title.text-center h2.text-anim {
            max-width: 100%;
        }
        @media (max-width: 767px) {
            .section-title h2.text-anim {
                font-size: clamp(1.5rem, 6vw, 2rem);
            }
        }
        /* Header user menu */
        .site-user-menu {
            position: relative;
            z-index: 120;
        }
        @media (max-width: 575px) {
            .site-user-menu__name {
                display: none;
            }
            .site-user-menu__trigger {
                padding: 0.3rem 0.45rem 0.3rem 0.3rem;
            }
        }
        .site-user-menu__trigger {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.35rem 0.65rem 0.35rem 0.35rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 999px;
            background: #fff;
            color: var(--header, #151515);
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1.2;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .site-user-menu__trigger:hover,
        .site-user-menu.show .site-user-menu__trigger,
        .site-user-menu:focus-within .site-user-menu__trigger {
            border-color: rgba(255, 107, 53, 0.45);
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.15);
        }
        .site-user-menu__avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
            border: 2px solid rgba(255, 107, 53, 0.25);
        }
        .site-user-menu__name {
            max-width: 9rem;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .site-user-menu__chevron {
            font-size: 0.65rem;
            opacity: 0.65;
            transition: transform 0.2s;
        }
        .site-user-menu.show .site-user-menu__chevron,
        .site-user-menu:focus-within .site-user-menu__chevron {
            transform: rotate(180deg);
        }
        .site-user-menu__dropdown {
            min-width: 11rem;
            padding: 0.35rem;
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            margin-top: 0.45rem !important;
        }
        .site-user-menu__trigger.dropdown-toggle::after {
            display: none;
        }
        .site-user-menu__item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            padding: 0.5rem 0.65rem;
            border: none;
            border-radius: 8px;
            background: transparent;
            color: #1a1a1a;
            font-size: 0.8125rem;
            font-weight: 600;
            text-decoration: none;
            text-align: left;
            cursor: pointer;
            transition: background 0.15s;
        }
        .site-user-menu__item:hover {
            background: rgba(255, 107, 53, 0.1);
            color: var(--theme, #DA9B21);
        }
        .site-user-menu__item--danger {
            color: #b42318;
        }
        .site-user-menu__item--danger:hover {
            background: #fef3f2;
            color: #8a1c12;
        }
        .site-user-menu__form {
            margin: 0;
            padding: 0.25rem 0 0;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
        }
        /* Guest Login/Register dropdown */
        .header-auth-dropdown {
            position: relative;
        }
        .header-auth-dropdown__toggle {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.5rem 0.9rem 0.5rem 1rem;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 999px;
            background: #fff;
            color: var(--header, #151515);
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1.2;
            white-space: nowrap;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .header-auth-dropdown__toggle:hover,
        .header-auth-dropdown.show .header-auth-dropdown__toggle {
            border-color: rgba(255, 107, 53, 0.45);
            box-shadow: 0 4px 12px rgba(255, 107, 53, 0.15);
            color: var(--header, #151515);
            background: #fff;
        }
        .header-auth-dropdown__toggle.dropdown-toggle::after {
            display: none !important;
        }
        .header-auth-dropdown__label {
            flex: 0 1 auto;
        }
        .header-auth-dropdown__chevron {
            flex-shrink: 0;
            margin-left: 0.1rem;
            font-size: 0.65rem;
            opacity: 0.65;
            line-height: 1;
            transition: transform 0.2s;
        }
        .header-auth-dropdown.show .header-auth-dropdown__chevron {
            transform: rotate(180deg);
        }
        /* Slightly wider content area (default Bootstrap: 1140px / 1290px) */
        @media (min-width: 1200px) {
            .container {
                max-width: 1240px;
            }
        }
        @media (min-width: 1400px) {
            .container {
                max-width: 1480px;
            }
        }
        .tour-pickup-notice {
            display: flex;
            align-items: flex-start;
            gap: 0.65rem;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            background: rgba(218, 155, 33, 0.12);
            border: 1px solid rgba(218, 155, 33, 0.35);
            color: #444;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        .tour-pickup-notice--compact {
            padding: 0.5rem 0.85rem;
            font-size: 0.875rem;
            margin-bottom: 0;
        }
        .tour-pickup-notice i {
            color: var(--theme, #DA9B21);
            margin-top: 0.2rem;
            flex-shrink: 0;
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="mouseCursor cursor-outer"></div>
<div class="mouseCursor cursor-inner"></div>

<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('home') }}">
                            <img class="site-brand-logo-offcanvas" src="{{ logo_url() }}" alt="{{ config('app.name') }}">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button type="button" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <p class="text d-none d-xl-block">
                    Backpackers and Movers — educational tours, treks, and student travel programs for schools and colleges.
                </p>
                <div class="mobile-menu fix mb-3"></div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<div class="header-top-section">
    <div class="container-fluid">
        <div class="header-top-wrapper">
            <p>{{ site_setting('header_welcome_prefix', 'Welcome to') }} <span>{{ site_setting('header_welcome_brand', 'Backpackers and Movers') }}</span></p>
            <p class="mb-0">{{ site_setting('header_pickup_line', 'Tour pickup: Pune & Mumbai only') }}</p>
        </div>
    </div>
</div>

<header id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="header-left">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="header-logo">
                            <img class="site-brand-logo-header" src="{{ logo_url() }}" alt="{{ config('app.name') }}">
                        </a>
                    </div>
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                        <a href="{{ route('about') }}">About</a>
                                    </li>
                                    <li class="has-dropdown {{ request()->routeIs('tours.*') ? 'active' : '' }}">
                                        <a href="{{ route('tours.index') }}">Tours <i class="fa-solid fa-chevron-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('tours.index') }}">All tours</a></li>
                                            @foreach ($navTourCategories ?? [] as $navCat)
                                                <li>
                                                    <a href="{{ route('tours.category', $navCat->slug) }}" class="{{ request()->routeIs('tours.category') && request()->route('category') === $navCat->slug ? 'active' : '' }}">
                                                        {{ $navCat->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">
                                        <a href="{{ route('blog.index') }}">Blogs</a>
                                    </li>
                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}">Contact us</a>
                                    </li>
                                    @guest
                                    <li class="has-dropdown d-xl-none">
                                        <a href="#">Login/Register <i class="fa-solid fa-chevron-down" aria-hidden="true"></i></a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        </ul>
                                    </li>
                                    @else
                                        <li class="d-xl-none">
                                            <a href="{{ Auth::user()->is_admin ? route('admin.dashboard', [], false) : route('dashboard', [], false) }}">Dashboard</a>
                                        </li>
                                        <li class="d-xl-none">
                                            <a href="#" class="site-mobile-logout">Logout</a>
                                        </li>
                                    @endguest
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center gap-2">
                    @guest
                        <div class="header-auth-dropdown dropdown d-none d-md-inline-block">
                            <button type="button" class="header-auth-dropdown__toggle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="header-auth-dropdown__label">Login/Register</span>
                                <i class="fa-solid fa-chevron-down header-auth-dropdown__chevron" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            </ul>
                        </div>
                    @else
                        @include('partials.header-user-menu')
                    @endguest
                    <a href="{{ route('contact') }}" class="theme-btn">Book Now</a>
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@if (session('status'))
    <div class="container mt-3">
        <div class="alert alert-success mb-0">{{ session('status') }}</div>
    </div>
@endif
@if (session('warning'))
    <div class="container mt-3">
        <div class="alert alert-warning mb-0">{{ session('warning') }}</div>
    </div>
@endif
@if ($errors->any())
    <div class="container mt-3">
        <div class="alert alert-danger mb-0">
            <ul class="mb-0 ps-3">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    </div>
@endif

<div id="smooth-wrapper">
    <div id="smooth-content">
        @yield('content')
        @include('partials.roavio-footer')
    </div>
</div>

<script src="{{ theme_asset('assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/viewport.jquery.js') }}"></script>
<script src="{{ theme_asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/gsap.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/ScrollSmoother.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/split-type.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/SplitText.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jquery.waypoints.js') }}"></script>
<script src="{{ theme_asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/swiper-bundle.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/wow.min.js') }}"></script>
<script src="{{ theme_asset('assets/js/main.js') }}"></script>
<script>
    (function () {
        document.querySelectorAll('.site-mobile-logout').forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var form = document.getElementById('siteMobileLogoutForm');
                if (form) form.submit();
            });
        });
    })();
</script>
@auth
    <form id="siteMobileLogoutForm" action="{{ route('logout', [], false) }}" method="post" class="d-none">@csrf</form>
@endauth
@stack('scripts')
</body>
</html>
