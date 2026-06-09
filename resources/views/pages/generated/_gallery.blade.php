@extends('layouts.roavio', ['title' => 'Gallery'])

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
                <div class="breadcrumb-wrapper-3 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
                    <div class="container">
                        <div class="page-heading">
                            <div class="breadcrumb-sub-title">
                                <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                Gallery
                                </h1>
                            </div>
                            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="style-2 style-3">
                                Gallery
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>

                <!-- gallery Section Start -->
                <section class="gallery-section section-padding fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">
                            Explore Our Photo Gallery
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Crafting journeys, creating memories plan smarter, travel better</p>
                        </div>
                    </div>
                    <div class="swiper gallery-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/01.jpg') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/02.jpg') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/03.html') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/04.jpg') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/05.html') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper gallery-slider-2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/06.jpg') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/07.jpg') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/08.html') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-image">
                                    <img src="{{ asset('assets/img/inner-page/gallery/09.html') }}" alt="img">
                                    <div class="gallery-content">
                                        <h4>
                                            <a href="{{ route('tours.index') }}">Brown Concrete Building</a>
                                        </h4>
                                        <p>Tour & Travel</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Contact Section Start -->
                <section class="contact-section section-padding pb-0">
                        <div class="container">
                            <div class="contact-wrapper">
                                <div class="row g-4 align-items-end">
                                    <div class="col-lg-6">
                                        <div class="contact-image">
                                            <img data-speed=".8" src="{{ asset('assets/img/home-1/Image.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-content">
                                            <div class="logo-image">
                                                <a href="{{ route('home') }}"><img class="site-brand-logo-header" src="{{ logo_url() }}" alt="{{ config('app.name') }}"></a>
                                            </div>
                                            <div class="section-title mb-0">
                                                <h2 class="sec-title text-white text-anim">
                                                    Adventure Is Calling – Are You Ready?
                                                </h2>
                                            </div>
                                            <p class="text wow fadeInUp" data-wow-delay=".3s">
                                            Get ready to embark on unforgettable journeys with us. whether you’re seeking thrilling adventures, relaxing escapes
                                            </p>
                                            <a href="{{ route('tours.index') }}" class="theme-btn">Explore Our Tours</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
@endsection
