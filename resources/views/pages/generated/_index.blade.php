@extends('layouts.roavio', ['title' => 'Home'])

@section('content')
<!-- Hero Section Start -->
                <section class="hero-section-1 fix">
                    <div class="swiper-dot-3">
                        <div class="dot"></div>
                    </div>
                    <div class="swiper hero-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="hero-1">
                                    <div class="hero-bg bg-cover" style="background-image: url('{{ asset('assets/img/home-1/hero/hero-bg.jpg') }}');">
                                </div> 
                                    <div class="container-fluid">
                                        <div class="row g-4 justify-content-between align-items-end">
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="hero-content">
                                                    <h1 data-animation="fadeInUp" data-delay="1.3s">
                                                        Turning your
                                                        travel dreams
                                                        into reality
                                                    </h1>
                                                    <p data-animation="fadeInUp" data-delay="1.3s">
                                                        Unleash your inner explorer with us! At ROAVIO, we craft unforgettable adventures tailored
                                                    </p>
                                                    <a href="{{ route('destinations.index') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.3s">Explore Destinations</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="counter-item" data-animation="fadeInUp" data-delay="1.3s">
                                                    <div class="content">
                                                        <h2><span class="count">500</span>+</h2>
                                                        <p>Explore 500+ Destinations</p>
                                                    </div>
                                                    <div class="content">
                                                        <h2><span class="count">10</span>+</h2>
                                                        <p>Years of experience</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="hero-1">
                                    <div class="hero-bg bg-cover" style="background-image: url('{{ asset('assets/img/home-1/hero/hero-bg-2.jpg') }}');">
                                </div> 
                                    <div class="container-fluid">
                                        <div class="row g-4 justify-content-between align-items-end">
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="hero-content">
                                                    <h1 data-animation="fadeInUp" data-delay="1.3s">
                                                        Turning your
                                                        travel dreams
                                                        into reality
                                                    </h1>
                                                    <p data-animation="fadeInUp" data-delay="1.3s">
                                                        Unleash your inner explorer with us! At ROAVIO, we craft unforgettable adventures tailored
                                                    </p>
                                                    <a href="{{ route('destinations.index') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.3s">Explore Destinations</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="counter-item" data-animation="fadeInUp" data-delay="1.3s">
                                                    <div class="content">
                                                        <h2><span class="count">500</span>+</h2>
                                                        <p>Explore 500+ Destinations</p>
                                                    </div>
                                                    <div class="content">
                                                        <h2><span class="count">10</span>+</h2>
                                                        <p>Years of experience</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="swiper-slide">
                                <div class="hero-1">
                                    <div class="hero-bg bg-cover" style="background-image: url('{{ asset('assets/img/home-1/hero/hero-bg-3.jpg') }}');">
                                </div> 
                                    <div class="container-fluid">
                                        <div class="row g-4 justify-content-between align-items-end">
                                            <div class="col-xl-4 col-lg-6">
                                                <div class="hero-content">
                                                    <h1 data-animation="fadeInUp" data-delay="1.3s">
                                                        Turning your
                                                        travel dreams
                                                        into reality
                                                    </h1>
                                                    <p data-animation="fadeInUp" data-delay="1.3s">
                                                        Unleash your inner explorer with us! At ROAVIO, we craft unforgettable adventures tailored
                                                    </p>
                                                    <a href="{{ route('destinations.index') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.3s">Explore Destinations</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <div class="counter-item" data-animation="fadeInUp" data-delay="1.3s">
                                                    <div class="content">
                                                        <h2><span class="count">500</span>+</h2>
                                                        <p>Explore 500+ Destinations</p>
                                                    </div>
                                                    <div class="content">
                                                        <h2><span class="count">10</span>+</h2>
                                                        <p>Years of experience</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Contact-From Section Start -->
                <div class="contact-from-section header-bg wow fadeInUp" data-wow-delay=".3s">
                    <div class="right-shape d-none d-xxl-block">
                        <img src="{{ asset('assets/img/home-1/tree.png') }}" alt="img">
                    </div>
                    <div class="container-fluid">
                    <div class="contact-from-wrapper">
                        <div class="contact-content">
                                <h2><span class="count">10</span>m+</h2>
                                <h6>Trusted clients / happy clients</h6>
                                <div class="grop-image">
                                    <img src="{{ asset('assets/img/home-1/group.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="contact-right">
                                <h3>Find adventure that suits your needs</h3>
                                <p>We provide more than <span class="count">800</span><b>+</b> travel destination</p>
                                <div class="box-item">
                                    <div class="form-clt">
                                            <div class="form">
                                            <select class="single-select w-100">
                                                <option>Where to go</option>
                                                <option>Travel destinations</option>
                                                <option>Local places</option>
                                                <option>Adventure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-clt">
                                            <div class="form">
                                            <select class="single-select w-100">
                                                <option>Where to go</option>
                                                <option>Travel destinations</option>
                                                <option>Local places</option>
                                                <option>Adventure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-clt">
                                            <div class="form">
                                            <select class="single-select w-100">
                                                <option>Travel type</option>
                                                <option>Travel destinations</option>
                                                <option>Local places</option>
                                                <option>Adventure</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-clt">
                                        <button class="theme-btn" type="submit">
                                            Find Tours
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
                
                <!-- Tour Section Start -->
                <section class="tour-section section-padding pt-0 fix">
                    <div class="container custom-container">
                        <div class="row g-1">
                        <div class="col-xl-5">
                                <div class="row g-1">
                                    <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="tour-card-item">
                                            <div class="tour-image">
                                                <img src="{{ asset('assets/img/home-1/tour/tour-1.jpg') }}" alt="img">
                                                <span>50+ tours</span>
                                                <div class="tour-content">
                                                    <h3>
                                                        <a href="{{ route('tours.index') }}">Bird's Eye Of Island</a>
                                                    </h3>
                                                    <p>Bol, Croatia</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tour-card-item wow fadeInRight" data-wow-delay=".3s">
                                            <div class="tour-image style-3">
                                                <img src="{{ asset('assets/img/home-1/tour/tour-2.jpg') }}" alt="img">
                                                <span>50+ tours</span>
                                                <div class="tour-content">
                                                    <h3>
                                                        <a href="{{ route('tours.index') }}">Climbing Waterfalls</a>
                                                    </h3>
                                                    <p>Bol, Croatia</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tour-card-item mt-1 wow fadeInRight" data-wow-delay=".5s">
                                            <div class="tour-image style-3">
                                                <img src="{{ asset('assets/img/home-1/tour/tour-3.jpg') }}" alt="img">
                                                <span>50+ tours</span>
                                                <div class="tour-content">
                                                    <h3>
                                                        <a href="{{ route('tours.index') }}">Whitewater Rafting</a>
                                                    </h3>
                                                    <p>Whitewater Rafting</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                            <div class="row g-1">
                                <div class="col-xl-8 col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="tour-card-item">
                                        <div class="tour-image style-2">
                                            <img src="{{ asset('assets/img/home-1/tour/tour-4.jpg') }}" alt="img">
                                            <span>50+ tours</span>
                                            <div class="tour-content">
                                                <h3>
                                                    <a href="{{ route('tours.index') }}">Birds Eye View of Kerkyra</a>
                                                </h3>
                                                <p>Kerkira, Greece</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="tour-card-item wow fadeInRight" data-wow-delay=".3s">
                                        <div class="tour-image style-3">
                                            <img src="{{ asset('assets/img/home-1/tour/tour-5.jpg') }}" alt="img">
                                            <span>50+ tours</span>
                                            <div class="tour-content style-4">
                                                <h3>
                                                    <a href="{{ route('tours.index') }}">Red Multi-storey Building</a>
                                                </h3>
                                                <p>Bangkok, Thailand</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tour-card-item mt-1 wow fadeInRight" data-wow-delay=".5s">
                                        <div class="tour-image style-3">
                                            <img src="{{ asset('assets/img/home-1/tour/tour-6.jpg') }}" alt="img">
                                            <span>50+ tours</span>
                                            <div class="tour-content style-5">
                                                <h3>
                                                    <a href="{{ route('tours.index') }}">Sitting on the edge</a>
                                                </h3>
                                                <p>São Paulo, Brazil</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- About Section Start -->
                <section class="about-section section-right fix">
                <div class="container">
                    <div class="about-wrapper">
                        <div class="row g-4">
                            <div class="col-xl-5 col-lg-4">
                                <div class="about-left-item">
                                    <div class="section-title mb-0">
                                        <h2 class="text-anim">
                                            Passionate about <br> your adventures <br> with Roavio
                                        </h2>
                                    </div>
                                    <h6 class="wow fadeInUp" data-wow-delay=".5s">We are started with 2005s, <span class="count">20</span><b>+</b>years of experience</h6>
                                    <div class="about-image wow img-custom-anim-left">
                                        <img src="{{ asset('assets/img/home-1/about/01.jpg') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-8">
                                <div class="about-right-item">
                                    <div class="about-image-item">
                                        <div class="about-image-2 wow img-custom-anim-left">
                                            <img src="{{ asset('assets/img/home-1/about/02.jpg') }}" alt="img">
                                        </div>
                                        <div class="about-box wow img-custom-anim-right">
                                            <div class="icon">
                                                <i class="flaticon-travel"></i>
                                            </div>
                                            <h5>Trusted & Secure</h5>
                                            <p>
                                                Your safety and trust are our top priorities.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <p class="wow fadeInUp" data-wow-delay=".3s">
                                            We believe travel is more than just a trip—it’s an experience that shapes your life. Our mission is to create unforgettable journeys that combine adventure, comfort, and authentic cultural encounters.
                                        </p>
                                        <div class="list-item wow fadeInUp" data-wow-delay=".5s">
                                            <ul class="list">
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Destination Search & Filters
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Online Booking System
                                                </li>
                                            </ul>
                                            <ul class="list">
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Blog & Travel Guides
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Live Chat Support
                                                </li>
                                            </ul>
                                            <ul class="list">
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Pricing & Discounts
                                                </li>
                                                <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Reviews & Ratings
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('about') }}" class="theme-btn wow fadeInUp" data-wow-delay=".3s">Learn More Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>

                <!-- Tour-place Section Start -->
                <section class="tour-place-section section-padding fix">
                    <div class="container custom-container-2">
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
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Relinking Beach in Nusa panada island, Bali, Indonesia
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Bali, Indonesia
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-9.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Scenic Kayaking Setup Along <br> Duero River, Soria
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Soria, Castilla
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-10.jpg') }}" alt="img">
                                        <span>13% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Camel safaris along desert dunes near roads and small villages
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Giza, Egypt
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-11.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Tourists Visits the Aqueduct in Segovia Spain
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Segovia, CL, Spain
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-12.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Train on Nine Arches Bridge in <br> Sri Lanka
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Ella, Sri Lanka
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-13.jpg') }}" alt="img">
                                        <span>8% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                            White buildings with blue <br> accents near the Atlantic shore.
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                            Galle, Sri Lanka
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-14.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                            Man Sitting on Rocks next to <br> Creek in Mountains
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                            Nepal
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-15.jpg') }}" alt="img">
                                        <span>23% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                            Aerial Photography of Cinque <br> Terre in Italy
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                            Liguria, Italy
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Benefit-Tour Section Start -->
                <section class="benefit-tour-section section-padding fix header-bg">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-white text-anim">How to Benefit Our Tours</h2>
                            <p class="text-white wow fadeInUp" data-wow-delay=".5s">Make the most of your travel experience with our carefully <br>
                            curated tours designed to offer convenience
                        </p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay=".3s">
                                <div class="benefit-tour-item">
                                    <div class="icon">
                                        <i class="flaticon-traveling"></i>
                                    </div>
                                    <div class="content">
                                        <h5>
                                            <a href="{{ route('tours.index') }}">Expert Travel Guide</a>
                                        </h5>
                                        <p>
                                            Travel professionals who help destinations, accommodations,
                                            and activities tailored.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-4 col-md-6 wow img-custom-anim-top">
                                <div class="benefit-tour-image">
                                    <img src="{{ asset('assets/img/home-1/tour/tour-7.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInRight" data-wow-delay=".5s">
                                <div class="benefit-tour-item">
                                    <div class="icon">
                                        <i class="flaticon-roadmap"></i>
                                    </div>
                                    <div class="content">
                                        <h5>
                                            <a href="{{ route('tours.index') }}">Custom Tour Plan</a>
                                        </h5>
                                        <p>
                                            Enjoy trips designed around your preferences, whether you want a relaxing beach holiday
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="benefit-tour-item">
                                    <div class="icon">
                                        <i class="flaticon-mouse"></i>
                                    </div>
                                    <div class="content">
                                        <h5>
                                            <a href="{{ route('tours.index') }}">Hassle-Free Booking</a>
                                        </h5>
                                        <p>
                                            Save time and effort with a single platform to book flights, hotels, activities, transportation
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="benefit-tour-item">
                                    <div class="icon">
                                        <i class="flaticon-promotion"></i>
                                    </div>
                                    <div class="content">
                                        <h5>
                                            <a href="{{ route('tours.index') }}">Deals & Discounts</a>
                                        </h5>
                                        <p>
                                            Save time and effort with a single platform to book flights, hotels, activities, transportation
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="benefit-tour-item">
                                    <div class="icon">
                                    <i class="flaticon-tourist"></i>
                                    </div>
                                    <div class="content">
                                        <h5>
                                            <a href="{{ route('tours.index') }}">Local Guides Authentic</a>
                                        </h5>
                                        <p>
                                            Immerse yourself local culture with trusted guides who provide
                                            insider tips and hidden
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="benefit-tour-item">
                                    <div class="icon">
                                        <i class="flaticon-insurance"></i>
                                    </div>
                                    <div class="content">
                                        <h5>
                                            <a href="{{ route('tours.index') }}">Travel Insurance</a>
                                        </h5>
                                        <p>
                                            Stay protected with insurance options and on-ground support for a worry-free experience.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Adventure Section Start -->
                <section class="adventure-section section-padding fix">
                    <div class="container">
                        <div class="adventure-wrapper">
                            <div class="row g-4">
                                <div class="col-xl-8">
                                    <div class="row g-4">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="section-title mb-0">
                                                <h2 class="text-anim">Special Offers Sort
                                                    Time Adventures
                                                </h2>
                                            </div>
                                            <p class="text wow fadeInUp" data-wow-delay=".5s">
                                                Don’t miss out our exclusive special deals, designed make your dream vacation more affordable than ever.
                                            </p>
                                            <div class="adventure-image wow img-custom-anim-left">
                                                <img src="{{ asset('assets/img/home-1/adventure/01.jpg') }}" alt="img">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="adventure-image wow img-custom-anim-top">
                                                <img src="{{ asset('assets/img/home-1/adventure/02.jpg') }}" alt="img">
                                            </div>
                                            <div class="adventure-box wow img-custom-anim-bottom">
                                                <h3>
                                                    <a href="{{ route('tours.index') }}">
                                                        18+ years of experience
                                                        in travel services
                                                    </a>
                                                </h3>
                                                <div class="info-item">
                                                    <img src="{{ asset('assets/img/home-1/adventure/client.png') }}" alt="img">
                                                    <div class="content">
                                                        <h5>Mickel z Ponkoz</h5>
                                                        <span>Travel guide</span>
                                                    </div>
                                                </div>
                                                <div class="shape">
                                                    <img src="{{ asset('assets/img/home-1/adventure/shape.png') }}" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="adventure-thumb wow img-custom-anim-right">
                                        <img src="{{ asset('assets/img/home-1/adventure/03.jpg') }}" alt="img">
                                        <div class="adventure-content">
                                            <h6>23% Discount</h6>
                                            <h3>
                                                <a href="{{ route('tours.index') }}">Hotel & Resort</a>
                                            </h3>
                                            <div class="booking-item">
                                                <div class="content">
                                                    <h4>$1500</h4>
                                                    <span>per night 4 star rating</span>
                                                </div>
                                                <a href="{{ route('tours.index') }}" class="theme-btn">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Feature Section Start -->
                <section class="feature-section section-padding fix pt-0">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">All-in-one Travel Assistance</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Crafting journeys, creating memories plan smarter, travel better</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="feature-item">
                                    <div class="feature-icon-item">
                                        <div class="icon">
                                            <i class="flaticon-traveling-1"></i>
                                        </div>
                                        <h4>
                                            Flight Booking & Reservation
                                        </h4>
                                    </div>
                                    <p>
                                        Take the stress to travel with our seamless flight booking and reservation services.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="feature-item">
                                    <div class="feature-icon-item">
                                        <div class="icon">
                                            <i class="flaticon-hot-air-balloon"></i>
                                        </div>
                                        <h4>
                                            Hotel & Resort Accommodation
                                        </h4>
                                    </div>
                                    <p>
                                    Enjoy a perfect stay with our carefully selected hotels and resorts.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="feature-item">
                                    <div class="feature-icon-item">
                                        <div class="icon style-2">
                                            <i class="flaticon-passport"></i>
                                        </div>
                                        <h4>
                                            Visa & Travel <br> Assistance
                                        </h4>
                                    </div>
                                    <p>
                                        Travel confidently with our comprehensive Visa & Travel Assistance services.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="feature-item">
                                    <div class="feature-icon-item">
                                        <div class="icon style-2">
                                            <i class="flaticon-tent"></i>
                                        </div>
                                        <h4>
                                            Customized & <br> Private Tours
                                        </h4>
                                    </div>
                                    <p>
                                        We design itineraries that match your interests, schedule, and budget.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Counter Section Start -->
                <section class="counter-section section-padding fix bg-cover" style="background-image: url('{{ asset('assets/img/home-1/bg.png') }}');">
                    <div class="container">
                        <div class="counter-wrapper">
                            <div class="section-title text-center mb-0">
                                <h2 class="text-white text-anim">Unlimited Travel Experience</h2>
                                <p class="text-white wow fadeInUp" data-wow-delay=".5s">Crafting journeys, creating memories plan smarter, travel better</p>
                            </div>
                            <div class="row">
                                <div class="counter-main-item">
                                    <div class="counter-item wow fadeInUp" data-wow-delay=".3s">
                                        <div class="icon">
                                            <i class="flaticon-costumer"></i>
                                        </div>
                                        <div class="content">
                                            <h3><span class="count">30</span>k+</h3>
                                            <p>Total worldwide satisfied clients</p>
                                        </div>
                                    </div>
                                    <div class="counter-item wow fadeInUp" data-wow-delay=".5s">
                                        <div class="icon">
                                            <i class="flaticon-suitcase"></i>
                                        </div>
                                        <div class="content">
                                            <h3><span class="count">500</span>+</h3>
                                            <p>World tours available in toun</p>
                                        </div>
                                    </div>
                                    <div class="counter-item wow fadeInUp" data-wow-delay=".7s">
                                        <div class="icon">
                                            <i class="flaticon-excursion"></i>
                                        </div>
                                        <div class="content">
                                            <h3><span class="count">20</span>+</h3>
                                            <p>Professional local tour guides</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <!-- Activities Section Start -->
            <section class="activities-section section-padding fix">
                <div class="container custom-container">
                    <div class="activities-wrapper row g-4 g-xl-2 row-cols-xl-5 row-cols-lg-4 row-cols-md-2 row-cols-1">
                        <div class="col activities-card-item wow fadeInUp">
                            <div class="activities-image">
                                <img src="{{ asset('assets/img/home-1/activiti/01.jpg') }}" alt="img">
                            </div>
                            <div class="activities-content">
                                <h4>
                                    <a href="{{ route('destinations.index') }}">Snorkeling & Scuba Diving</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col activities-card-item wow fadeInUp" data-wow-delay=".2s">
                            <div class="activities-image">
                                <img src="{{ asset('assets/img/home-1/activiti/02.jpg') }}" alt="img">
                            </div>
                            <div class="activities-content">
                                <h4>
                                    <a href="{{ route('destinations.index') }}">Desert Safari & Camel Rides</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col activities-card-item wow fadeInUp" data-wow-delay=".4s">
                            <div class="activities-image">
                                <img src="{{ asset('assets/img/home-1/activiti/03.jpg') }}" alt="img">
                            </div>
                            <div class="activities-content">
                                <h4>
                                    <a href="{{ route('destinations.index') }}">Hiking & Nature Trails</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col activities-card-item wow fadeInUp" data-wow-delay=".6s">
                            <div class="activities-image">
                                <img src="{{ asset('assets/img/home-1/activiti/04.jpg') }}" alt="img">
                            </div>
                            <div class="activities-content">
                                <h4>
                                    <a href="{{ route('destinations.index') }}">Cultural Heritage Tours</a>
                                </h4>
                            </div>
                        </div>
                        <div class="col activities-card-item wow fadeInUp" data-wow-delay=".8s">
                            <div class="activities-image">
                                <img src="{{ asset('assets/img/home-1/activiti/05.jpg') }}" alt="img">
                            </div>
                            <div class="activities-content">
                                <h4>
                                    <a href="{{ route('destinations.index') }}">Wildlife Safaris</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonial Section Start -->
            <section class="testimonial-section section-padding fix bg-cover" style="background-image: url('{{ asset('assets/img/home-1/testimonial/bg.jpg') }}');">
                <div class="container">
                    <div class="section-title text-center">
                        <h2 class="text-white text-anim">100k+ Customer Say Us</h2>
                        <p class="text-white wow fadeInUp" data-wow-delay=".5s">Join over 100,000 satisfied travelers who have experienced</p>
                    </div>
                    <div class="testimonial-wrapper">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <div class="swiper testimonial-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="content">
                                                    <div class="icon">
                                                        <i class="flaticon-left-quote"></i>
                                                    </div>
                                                    <p>
                                                        "Booking with this agency was
                                                        the best decision for our Bali trip!
                                                        from flights to accommodations!"
                                                    </p>
                                                    <div class="client-image">
                                                        <img src="{{ asset('assets/img/home-1/testimonial/client.png') }}" alt="img">
                                                    </div>
                                                    <h4>Michael Thompson</h4>
                                                    <span>World traveler</span>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="content">
                                                    <div class="icon">
                                                    <i class="flaticon-left-quote"></i>
                                                    </div>
                                                    <p>
                                                        "Booking with this agency was
                                                        the best decision for our Bali trip!
                                                        from flights to accommodations!"
                                                    </p>
                                                    <div class="client-image">
                                                        <img src="{{ asset('assets/img/home-1/testimonial/client.png') }}" alt="img">
                                                    </div>
                                                    <h4>Michael Thompson</h4>
                                                    <span>World traveler</span>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="content">
                                                    <div class="icon">
                                                        <i class="flaticon-left-quote"></i>
                                                    </div>
                                                    <p>
                                                        "Booking with this agency was
                                                        the best decision for our Bali trip!
                                                        from flights to accommodations!"
                                                    </p>
                                                    <div class="client-image">
                                                        <img src="{{ asset('assets/img/home-1/testimonial/client.png') }}" alt="img">
                                                    </div>
                                                    <h4>Michael Thompson</h4>
                                                    <span>World traveler</span>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="content">
                                                    <div class="icon">
                                                        <i class="flaticon-left-quote"></i>
                                                    </div>
                                                    <p>
                                                        "Booking with this agency was
                                                        the best decision for our Bali trip!
                                                        from flights to accommodations!"
                                                    </p>
                                                    <div class="client-image">
                                                        <img src="{{ asset('assets/img/home-1/testimonial/client.png') }}" alt="img">
                                                    </div>
                                                    <h4>Michael Thompson</h4>
                                                    <span>World traveler</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-dot">
                                        <div class="dot2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="testimonial-right-item">
                                <div class="row g-2">
                                    <div class="col-xl-7 col-md-6 wow img-custom-anim-left">
                                        <div class="testimonial-image">
                                            <img src="{{ asset('assets/img/home-1/testimonial/01.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-md-6 wow img-custom-anim-right">
                                        <div class="testimonial-image">
                                            <img src="{{ asset('assets/img/home-1/testimonial/02.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-md-6 wow img-custom-anim-left">
                                        <div class="testimonial-image">
                                            <img src="{{ asset('assets/img/home-1/testimonial/03.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-md-6 wow img-custom-anim-right">
                                        <div class="testimonial-image">
                                            <img src="{{ asset('assets/img/home-1/testimonial/04.jpg') }}" alt="img">
                                            <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup">
                                                <i class="fa-duotone fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- News Section Start -->
            <section class="news-section section-padding fix">
                    <div class="container custom-container-2">
                        <div class="section-title text-center">
                            <h2 class="text-anim">
                            Read Our Latest News & Blog
                            </h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Crafting journeys, creating memories plan smarter, travel better</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="news-card-items">
                                    <div class="news-image">
                                        <img src="{{ asset('assets/img/home-1/news/news-1.jpg') }}" alt="img">
                                        <span>18 August</span>
                                    </div>
                                    <div class="news-content">
                                        <span>Tours & travel</span>
                                        <h3>
                                            <a href="{{ route('blog.index') }}">
                                                Highlight trending destinations and why they’re worth exploring.
                                            </a>
                                        </h3>
                                        <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="news-card-items">
                                    <div class="news-image">
                                        <img src="{{ asset('assets/img/home-1/news/news-2.jpg') }}" alt="img">
                                        <span>20 August</span>
                                    </div>
                                    <div class="news-content">
                                        <span>Tours & travel</span>
                                        <h3>
                                            <a href="{{ route('blog.index') }}">
                                            Tips on itinerary planning, booking, and travel hacks.
                                            </a>
                                        </h3>
                                        <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="news-card-items">
                                    <div class="news-image">
                                        <img src="{{ asset('assets/img/home-1/news/news-3.jpg') }}" alt="img">
                                        <span>23 August</span>
                                    </div>
                                    <div class="news-content">
                                        <span>Tours & travel</span>
                                        <h3>
                                            <a href="{{ route('blog.index') }}">
                                            Focus on destinations suitable for families with kids.
                                            </a>
                                        </h3>
                                        <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="news-card-items">
                                    <div class="news-image">
                                        <img src="{{ asset('assets/img/home-1/news/news-4.jpg') }}" alt="img">
                                        <span>24 August</span>
                                    </div>
                                    <div class="news-content">
                                        <span>Tours & travel</span>
                                        <h3>
                                            <a href="{{ route('blog.index') }}">
                                            Guide to enjoying luxury stays and experiences without overspending.
                                            </a>
                                        </h3>
                                        <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>

            <!-- Brand Section Start -->
            <section class="brand-section section-padding fix">
                <div class="container custom-container-2">
                    <div class="brand-wrapper">
                        <h6>Relied upon by top-performing teams worldwide</h6>
                        <div class="swiper brand-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="{{ asset('assets/img/home-1/brand/01.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="{{ asset('assets/img/home-1/brand/02.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="{{ asset('assets/img/home-1/brand/03.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="{{ asset('assets/img/home-1/brand/04.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="{{ asset('assets/img/home-1/brand/05.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="{{ asset('assets/img/home-1/brand/06.png') }}" alt="img">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="brand-image text-center">
                                        <img src="{{ asset('assets/img/home-1/brand/07.png') }}" alt="img">
                                    </div>
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
                                                Adventure is Calling – Are You Ready?
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
