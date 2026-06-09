@extends('layouts.roavio', ['title' => 'Destinations'])

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
                    <div class="breadcrumb-wrapper-4 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-3.html') }}');">
                        <div class="container">
                            <div class="breadcrumb-top-items">
                                <div class="page-heading">
                                <div class="breadcrumb-sub-title">
                                    <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                    Destinations
                                    </h1>
                                </div>
                                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                                <li>
                                    <a href="{{ route('home') }}">
                                        Home
                                    </a>
                                </li>
                                <li class="style-2 style-3">
                                    Destinations
                                </li>
                            </ul>
                            </div>
                            <div class="content style-2">
                            <div class="text">
                                <h2><span class="count">500</span>+</h2>
                                    <p>Explore 500+ Destinations</p>
                            </div>
                            <div class="text">
                                <h2><span class="count">10</span>+</h2>
                                    <p>Professional Team Member</p>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>

                <!-- Destination Section-4 Start -->
                <section class="destination-section-4 section-padding fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">Explore Popular Destinations</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">One site <span class="count">30,500</span><b>+</b> most popular experience you’ll remember</p>
                        </div>
                        <div class="destination-one-wrapper">
                            <div class="row g-3">
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/01.jpg') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">London</a>
                                                </h3>
                                                <p>United kingdom</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/02.jpg') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Australia</a>
                                                </h3>
                                                <p>Mausoleum</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/03.jpg') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Pagoda</a>
                                                </h3>
                                                <p>Japan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/04.jpg') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Rome, Italy</a>
                                                </h3>
                                                <p>Mausoleum</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/05.html') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Istanbul, Turkey</a>
                                                </h3>
                                                <p>Bosporus Strait</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/06.html') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Indonesia</a>
                                                </h3>
                                                <p>Waterfalls</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/07.jpg') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Santorini, Greece</a>
                                                </h3>
                                                <p>Canopy Tent</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/08.html') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Scotland</a>
                                                </h3>
                                                <p>Gray Cathedral</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-6">
                                    <div class="destination-image-item">
                                        <div class="destination-image">
                                            <img src="{{ asset('assets/img/inner-page/destination/09.jpg') }}" alt="img">
                                            <div class="destination-content">
                                                <h3>
                                                    <a href="{{ route('destinations.index') }}">Bern, BE, Switzerland</a>
                                                </h3>
                                                <p>Silver Vehicle</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Feature Section-2 Start -->
                <section class="feature-section-2 bg-cover" style="background-image: url('{{ asset('assets/img/home-2/feature-bg.jpg') }}');">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-9">
                                <div class="feature-bg-content">
                                    <h2 class="text-anim">
                                        Wildlife
                                        <img src="{{ asset('assets/img/home-2/client-image.png') }}" alt="img">
                                        Safaris
                                    </h2>
                                    <h2 class="text wow fadeInUp" data-wow-delay=".5s">Camping</h2>
                                    <div class="feature-bottom-content wow fadeInUp" data-wow-delay=".3s">
                                        <p>Experience the thrill of nature never
                                        before with our exclusive wildlife safaris.</p>
                                        <h3>$2000</h3>
                                        <a href="{{ route('destinations.index') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.3s">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

               <!-- Tour-place Section Start -->
                <section class="tour-place-section section-padding fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">Uncover Unique Tours Places</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">One site <span class="count">30,500</span><b>+</b> most popular experience you’ll remember</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-8.jpg') }}" alt="img">
                                        <span>10% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Relinking Beach in Nusa panada island, Bali, Indonesia
                                            </a>
                                        </h3>
                                        <p>
                                            Bali, Indonesia, often called the Island the Gods, is a paradise known for its....
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Bali, Indonesia
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-16.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Red Camper Van Among Tall Pine Trees Outdoors
                                            </a>
                                        </h3>
                                        <p>
                                            Escape into nature with the charm of a red camper van nestled among......
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Netherlands
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-17.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Scenic Kayaking Setup Along Duero River, Soria
                                            </a>
                                        </h3>
                                        <p>
                                            Soria, located in the region of Castilla y León, Spain, is a charming city......
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Soria, Castilla
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-18.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                            Tourists Visits the Aqueduct in Segovia Spain
                                            </a>
                                        </h3>
                                        <p>
                                            Bali, Indonesia, often called the Island the Gods, is a paradise known for its....
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Nepal
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-19.jpg') }}" alt="img">
                                        <span>10% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Camel safaris desert dunes near roads and small villages
                                            </a>
                                        </h3>
                                        <p>
                                            Embark on a magical camel safari across golden desert dunes, where.....
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Giza, Egypt
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-20.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Tourists Visits the Aqueduct in Segovia Spain
                                            </a>
                                        </h3>
                                        <p>
                                            Bali, Indonesia, often called the Island the Gods, is a paradise known for its....
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Segovia, Spain
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-21.html') }}" alt="img">
                                        <span>10% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Train on Nine Arches Bridge in Sri Lanka
                                            </a>
                                        </h3>
                                        <p>
                                        The iconic Nine Arches Bridge in Ella, Sri Lanka, is a breathtaking sight.....
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Sri Lanka
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-22.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content style-2">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>(4.8)</span>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <h5><span>Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                            Relinking Beach in Nusa panada island, Bali, Indonesia
                                            </a>
                                        </h3>
                                        <p>
                                        Bali, Indonesia, often called the Island the Gods, is a paradise known for its....
                                        </p>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                            Bali, Indonesia
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                        </ul>
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
