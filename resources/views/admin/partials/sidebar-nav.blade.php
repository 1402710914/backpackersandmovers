@php
    $active = fn (string $pattern): bool => request()->routeIs($pattern);
@endphp

<div class="admin-brand">
    <a href="{{ route('admin.dashboard') }}" class="admin-brand-logo-link d-inline-block">
        <img src="{{ logo_url() }}" alt="{{ config('app.name') }}" class="admin-sidebar-logo">
    </a>
</div>

<nav class="admin-nav" aria-label="Admin">
    <div class="admin-nav-section">Overview</div>
    <a class="admin-nav-link {{ $active('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-chart-pie" aria-hidden="true"></i> Dashboard
    </a>

    <div class="admin-nav-section">Tours &amp; programs</div>
    <a class="admin-nav-link {{ request()->routeIs(['admin.categories.index', 'admin.categories.edit']) && request('type') === 'tour' ? 'active' : '' }}" href="{{ route('admin.categories.index', ['type' => 'tour']) }}">
        <i class="fa-solid fa-tags" aria-hidden="true"></i> Tour categories
    </a>
    <a class="admin-nav-link {{ request()->routeIs(['admin.tours.index', 'admin.tours.edit']) ? 'active' : '' }}" href="{{ route('admin.tours.index') }}">
        <i class="fa-solid fa-suitcase-rolling" aria-hidden="true"></i> All tours
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.tours.create') ? 'active' : '' }}" href="{{ route('admin.tours.create') }}">
        <i class="fa-solid fa-circle-plus" aria-hidden="true"></i> Add tour
    </a>

    <div class="admin-nav-section">Team &amp; blog</div>
    <a class="admin-nav-link {{ request()->routeIs(['admin.team-members.index', 'admin.team-members.edit']) ? 'active' : '' }}" href="{{ route('admin.team-members.index') }}">
        <i class="fa-solid fa-people-group" aria-hidden="true"></i> Team
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.team-members.create') ? 'active' : '' }}" href="{{ route('admin.team-members.create') }}">
        <i class="fa-solid fa-user-plus" aria-hidden="true"></i> Add team member
    </a>
    <a class="admin-nav-link {{ request()->routeIs(['admin.blog-posts.index', 'admin.blog-posts.edit']) ? 'active' : '' }}" href="{{ route('admin.blog-posts.index') }}">
        <i class="fa-solid fa-newspaper" aria-hidden="true"></i> Blog posts
    </a>
    <a class="admin-nav-link {{ request()->routeIs('admin.blog-posts.create') ? 'active' : '' }}" href="{{ route('admin.blog-posts.create') }}">
        <i class="fa-solid fa-pen-to-square" aria-hidden="true"></i> New blog post
    </a>
    <a class="admin-nav-link {{ $active('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
        <i class="fa-solid fa-tags" aria-hidden="true"></i> Blog categories
    </a>

    <div class="admin-nav-section">Site</div>
    <a class="admin-nav-link {{ $active('admin.settings.header*') ? 'active' : '' }}" href="{{ route('admin.settings.header') }}">
        <i class="fa-solid fa-bars" aria-hidden="true"></i> Header bar
    </a>
    <a class="admin-nav-link {{ $active('admin.settings.homepage*') ? 'active' : '' }}" href="{{ route('admin.settings.homepage') }}">
        <i class="fa-solid fa-house" aria-hidden="true"></i> Homepage sections
    </a>

    <div class="admin-nav-section">Marketing</div>
    <a class="admin-nav-link {{ $active('admin.notifications.*') ? 'active' : '' }}" href="{{ route('admin.notifications.index') }}">
        <i class="fa-solid fa-bullhorn" aria-hidden="true"></i> Notifications
    </a>
    <a class="admin-nav-link {{ $active('admin.mail.*') ? 'active' : '' }}" href="{{ route('admin.mail.index') }}">
        <i class="fa-solid fa-envelope-open-text" aria-hidden="true"></i> Email tool
    </a>

    <div class="admin-nav-section">Customers &amp; sales</div>
    <a class="admin-nav-link {{ $active('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
        <i class="fa-solid fa-users" aria-hidden="true"></i> Users
    </a>
    <a class="admin-nav-link {{ $active('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}">
        <i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Bookings
    </a>
    <a class="admin-nav-link {{ $active('admin.messages.*') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
        <i class="fa-solid fa-inbox" aria-hidden="true"></i> Messages
    </a>
</nav>

<div class="admin-sidebar-foot">
    <form action="{{ route('admin.logout') }}" method="post">
        @csrf
        <button type="submit" class="admin-btn-logout">
            <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i> Log out
        </button>
    </form>
</div>
