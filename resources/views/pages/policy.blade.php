@extends('layouts.roavio', ['title' => 'Policies'])

@section('content')
<div class="breadcrumb-wrapper-2 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Terms &amp; Privacy</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="style-2">Policies</li>
            </ul>
        </div>
    </div>
</div>

<section class="about-section-2 section-padding fix">
    <div class="container">
        <div class="section-title mb-4">
            <h2 class="text-anim">Policies</h2>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <p>This page outlines how {{ config('app.name') }} collects information, handles bookings, and communicates with you. Update this text with your legal policies before going live.</p>
                <h4 class="mt-4">Bookings &amp; cancellations</h4>
                <p>Describe deposit requirements, change fees, refund windows, and partner operator rules.</p>
                <h4 class="mt-4">Privacy</h4>
                <p>Explain what personal data you store (name, email, travel dates), how long you keep it, and user rights.</p>
                <h4 class="mt-4">Marketing emails</h4>
                <p>If you send newsletters, link your unsubscribe process and third-party tools.</p>
            </div>
        </div>
    </div>
</section>
@endsection
