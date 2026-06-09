@extends('layouts.roavio', ['title' => $destination->name])

@section('content')
<div class="breadcrumb-wrapper-2 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $destination->name }}</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('destinations.index') }}">Destinations</a></li>
                <li class="style-2">{{ $destination->name }}</li>
            </ul>
        </div>
    </div>
</div>

<section class="about-section-2 section-padding fix">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <img src="{{ $destination->featuredImageUrl() }}" class="w-100 rounded-2" alt="">
            </div>
            <div class="col-lg-6">
                <h2>{{ $destination->country ? $destination->country.' — ' : '' }}{{ $destination->name }}</h2>
                <p class="mt-3">{!! nl2br(e($destination->description ?? $destination->excerpt ?? '')) !!}</p>
                <a href="{{ route('tours.index') }}" class="theme-btn mt-2">View related tours</a>
            </div>
        </div>
    </div>
</section>
@endsection
