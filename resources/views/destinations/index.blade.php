@extends('layouts.roavio', ['title' => 'Destinations'])

@section('content')
<div class="breadcrumb-wrapper-2 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Destinations</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="style-2">Destinations</li>
            </ul>
        </div>
    </div>
</div>

<section class="destination-section-4 section-padding fix">
    <div class="container">
        <div class="destination-one-wrapper">
            <div class="row g-3">
                @forelse ($destinations as $destination)
                    @php
                        $fbImg = 'assets/img/home-2/destination/'.str_pad((string) (($loop->iteration - 1) % 6 + 1), 2, '0', STR_PAD_LEFT).'.jpg';
                    @endphp
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="destination-image-item">
                            <div class="destination-image">
                                <img src="{{ $destination->featuredImageUrl(asset($fbImg)) }}" alt="{{ $destination->name }}">
                                <div class="destination-content">
                                    <h3>
                                        <a href="{{ route('destinations.show', $destination->slug) }}">{{ $destination->name }}</a>
                                    </h3>
                                    <p>{{ $destination->country ?: \Illuminate\Support\Str::limit(strip_tags($destination->excerpt ?? ''), 90) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">No destinations yet.</div>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">{{ $destinations->links() }}</div>
    </div>
</section>
@endsection
