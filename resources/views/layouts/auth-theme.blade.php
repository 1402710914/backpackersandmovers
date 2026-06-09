<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Account' }} — {{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ logo_url() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        .site-brand-logo-auth {
            width: 200px;
            max-width: 100%;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body class="bg-light">
<div class="min-vh-100 d-flex flex-column justify-content-center py-5">
    <div class="container">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}"><img class="site-brand-logo-auth" src="{{ logo_url() }}" alt="{{ config('app.name') }}"></a>
        </div>
        @yield('content')
    </div>
</div>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
