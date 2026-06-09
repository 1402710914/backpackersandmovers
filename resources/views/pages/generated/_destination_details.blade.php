@extends('layouts.roavio', ['title' => 'Destination'])

@section('content')
<!-- Hero Section Start -->
                <div class="breadcrumb-wrapper fix">
                    <div class="container">
                        <div class="page-heading style-2">
                            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="style-2 style-3">
                            Destination Details
                            </li>
                        </ul>
                        <div class="breadcrumb-sub-title">
                                <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                    Tower Bridge of London, <br>
                                    United Kingdom
                                </h1>
                            </div>
                            <div class="star-list">
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                    <span>(480+ Reviews)</span>
                                </div>
                                <span>
                                    <i class="fa-regular fa-location-dot"></i>
                                    London, United Kingdom
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- tour-details Section Start -->
                <section class="destination-details section-padding pt-0 fix">
                        <div class="container">
                            <div class="row g-2">
                                <div class="col-xl-3 col-md-6 col-lg-4">
                                    <div class="destination-details-image">
                                        <img src="{{ asset('assets/img/inner-page/destination-details/details-1.jpg') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-lg-4">
                                    <div class="destination-details-image">
                                        <img src="{{ asset('assets/img/inner-page/destination-details/details-2.jpg') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-lg-4">
                                    <div class="destination-details-image">
                                        <img src="{{ asset('assets/img/inner-page/destination-details/details-3.jpg') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6 col-lg-4">
                                    <div class="destination-details-image">
                                        <img src="{{ asset('assets/img/inner-page/destination-details/details-4.jpg') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-lg-4">
                                    <div class="destination-details-image">
                                        <img src="{{ asset('assets/img/inner-page/destination-details/details-5.jpg') }}" alt="img">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 col-lg-4">
                                    <div class="destination-details-image">
                                        <img src="{{ asset('assets/img/inner-page/destination-details/details-6.jpg') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="destination-details-wrapper">
                                <div class="row g-4">
                                    <div class="col-lg-8 col-12">
                                        <div class="destination-details-content">
                                            <h3>Overview</h3>
                                            <p class="mb-3 mt-3">
                                                The Tower Bridge of London is one of the city’s most iconic landmarks, blending Victorian engineering with timeless beauty. Spanning the River Thames, its twin towers and majestic bascules create a stunning backdrop for photos and river cruises alike. Visitors can walk across the high-level glass walkways for panoramic views.
                                            </p>
                                            <p class="mb-3">
                                                London’s skyline or watch as the bridge lifts to allow ships to pass beneath. A symbol of history and innovation, Tower Bridge is a must-visit destination that showcases the charm and grandeur of the United Kingdom’s capital.
                                            </p>
                                            <p class="mt-4">
                                                Standing proudly over the River Thames, Tower Bridge is a masterpiece of London’s heritage and innovation. Its striking twin towers and iconic drawbridge design make it one of the most recognizable sights in the world. Whether you stroll across its walkways, admire the city from above,
                                            </p>
                                            <div class="top-list">
                                                <h3>Top-highlight</h3>
                                                <ul class="list">
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Explore iconic sites like Tanah Lot, Uluwatu, and Besakih Temple.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Relax on Kuta, Seminyak, Nusa Dua, and Jimbaran Bay.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Discover rice terraces, art markets, yoga retreats, and monkey forests.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                    Hike an active volcano for breathtaking sunrise views.
                                                    </li>
                                                    <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Experience beach clubs, rooftop bars, and live music in Seminyak and Canggu.
                                                    </li>
                                                    <li>
                                                    <i class="fa-solid fa-check"></i>
                                                    Visit Tegenungan, Gitgit, and Sekumpul waterfalls for adventure and serenity.
                                                    </li>
                                                </ul>
                                                <div class="map-items">
                                                    <div class="googpemap">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="price-box-item">
                                            <h3>Tower bridge of London</h3>
                                            <div class="price-item">
                                                <div class="price">
                                                <h6>To Child</h6>
                                                <h2>$138</h2>
                                            </div>
                                            <div class="price style-2">
                                                <h6>To Adult</h6>
                                                <h2>$399</h2>
                                            </div>
                                            </div>
                                            <a href="{{ route('contact') }}" class="theme-btn">Learn More Us</a>
                                            <h6>Need some help? <a href="{{ route('contact') }}">Contact Us</a></h6>
                                        </div>
                                        <div class="best-tourist-box">
                                            <div class="top-content">
                                                <h6>Explore The World</h6>
                                                <h3>
                                                    Best Tourist Place
                                                </h3>
                                                <a href="{{ route('tours.index') }}" class="theme-btn">Explore Tours</a>
                                            </div>
                                            <div class="bottom-image">
                                                <img src="{{ asset('assets/img/inner-page/destination-details/tour-man.html') }}" alt="img">
                                                <div class="bg-shape">
                                                    <img src="{{ asset('assets/img/inner-page/destination-details/bg-shape.html') }}" alt="img">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>

                <!-- Popular-Destination Section-4 Start -->
                <section class="popular-destination-section-4 section-padding header-bg fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-white text-anim">Related Destinations</h2>
                            <p class="text-white wow fadeInUp" data-wow-delay=".5s">One site <span class="count">30,500</span><b>+</b> most popular experience you’ll remember</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="destination-radius-item style-2">
                                    <div class="destination-image">
                                        <img src="{{ asset('assets/img/inner-page/destination/10.html') }}" alt="img">
                                        <span>20 Tours</span>
                                    </div>
                                    <div class="destination-content">
                                        <h5>
                                            <a href="{{ route('destinations.index') }}">United kingdom</a>
                                        </h5>
                                        <p>London</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="destination-radius-item style-2">
                                    <div class="destination-image">
                                        <img src="{{ asset('assets/img/inner-page/destination/11.jpg') }}" alt="img">
                                        <span>18 Tours</span>
                                    </div>
                                    <div class="destination-content">
                                        <h5>
                                            <a href="{{ route('destinations.index') }}">Australia</a>
                                        </h5>
                                        <p>Mausoleum</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="destination-radius-item style-2">
                                    <div class="destination-image">
                                        <img src="{{ asset('assets/img/inner-page/destination/12.html') }}" alt="img">
                                        <span>20 Tours</span>
                                    </div>
                                    <div class="destination-content">
                                        <h5>
                                            <a href="{{ route('destinations.index') }}">Japan City</a>
                                        </h5>
                                        <p>Pagoda</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                                <div class="destination-radius-item style-2">
                                    <div class="destination-image">
                                        <img src="{{ asset('assets/img/inner-page/destination/13.html') }}" alt="img">
                                        <span>10 Tours</span>
                                    </div>
                                    <div class="destination-content">
                                        <h5>
                                            <a href="{{ route('destinations.index') }}">Canada</a>
                                        </h5>
                                        <p>Stonewall</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Travel-Section- Start -->
                <section class="travel-section section-padding header-bg fix">
                    <div class="container">
                        <div class="travel-wrapper">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="travel-content">
                                        <div class="section-title mb-0">
                                            <h2 class="text-white text-anim">All-In-One Travel Assistance</h2>
                                            <p class="text-white wow fadeInUp" data-wow-delay=".5s">Crafting journeys, creating memories plan smarter, travel better</p>
                                        </div>
                                        <div class="travel-item">
                                            <div class="icon-item">
                                                <div class="icon">
                                                    <i class="flaticon-traveling-1"></i>
                                                </div>
                                                <div class="content">
                                                    <h5>
                                                        Booking & Reservation
                                                    </h5>
                                                    <p>
                                                        Take the stress to travel with seamless flight booking reservation services.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="icon-item">
                                                <div class="icon">
                                                    <i class="flaticon-hot-air-balloon"></i>
                                                </div>
                                                <div class="content">
                                                    <h5>
                                                        Hotel & Accommodation
                                                    </h5>
                                                    <p>
                                                        Enjoy a perfect stay with our carefully selected hotels and resorts.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="travel-item">
                                            <div class="icon-item">
                                                <div class="icon">
                                                <i class="flaticon-passport"></i>
                                                </div>
                                                <div class="content">
                                                    <h5>
                                                        Visa & Travel Assistance
                                                    </h5>
                                                    <p>
                                                        Travel confidently with comprehensive Visa & Travel Assistance services.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="icon-item">
                                                <div class="icon">
                                                    <i class="flaticon-tent"></i>
                                                </div>
                                                <div class="content">
                                                    <h5>
                                                        Customizable Tours
                                                    </h5>
                                                    <p>
                                                        We design itineraries that match your interests, schedule, and budget.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="travel-image">
                                        <img src="{{ asset('assets/img/inner-page/destination/18.html') }}" alt="img">
                                        <div class="right-box">
                                            <h2><span class="count">150</span>+</h2>
                                            <p>by over 2500+ global satisfied clients</p>
                                            <div class="star-item">
                                                <img src="{{ asset('assets/img/home-2/feature/Image.png') }}" alt="img">
                                                <div class="star">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="discover-hotel-section section-padding fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">Discover The World's Class Top Hotel</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">One site <span class="count">30,500</span><b>+</b> most popular experience you’ll remember</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                <div class="top-hotel-item">
                                    <div class="hotel-image">
                                        <img src="{{ asset('assets/img/inner-page/hotel/01.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <span><i class="fa-solid fa-star"></i> (4.8)</span>
                                    </div>
                                    <div class="hotel-content">
                                        <span><i class="fa-regular fa-location-dot"></i> Ao Nang, Thailand</span>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                The brown bench near 
                                                swimming pool Hotel
                                            </a>
                                        </h3>
                                        <div class="list-item">
                                            <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/05.svg') }}" alt="">
                                                2 Bed room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/06.html') }}" alt="">
                                                1 kitchen
                                            </li>
                                        </ul>
                                        <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/07.svg') }}" alt="">
                                                2 Wash room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/08.svg') }}" alt="">
                                                Internet
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="button-item">
                                            <h4>$99<span>/per night</span></h4>
                                            <a href="{{ route('destinations.index') }}" class="theme-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                <div class="top-hotel-item">
                                    <div class="hotel-image">
                                        <img src="{{ asset('assets/img/inner-page/hotel/02.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <span><i class="fa-solid fa-star"></i> (4.8)</span>
                                    </div>
                                    <div class="hotel-content">
                                        <span><i class="fa-regular fa-location-dot"></i> Ao Nang, Thailand</span>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Green trees and body of 
                                                water Marriott Hotel
                                            </a>
                                        </h3>
                                        <div class="list-item">
                                            <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/05.svg') }}" alt="">
                                                2 Bed room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/06.html') }}" alt="">
                                                1 kitchen
                                            </li>
                                        </ul>
                                        <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/07.svg') }}" alt="">
                                                2 Wash room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/08.svg') }}" alt="">
                                                Internet
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="button-item">
                                            <h4>$56<span>/per night</span></h4>
                                            <a href="{{ route('destinations.index') }}" class="theme-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                <div class="top-hotel-item">
                                    <div class="hotel-image">
                                        <img src="{{ asset('assets/img/inner-page/hotel/03.html') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <span><i class="fa-solid fa-star"></i> (4.8)</span>
                                    </div>
                                    <div class="hotel-content">
                                        <span><i class="fa-regular fa-location-dot"></i> Ao Nang, Thailand</span>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                            Painted house surround
                                                with trees Hotel
                                            </a>
                                        </h3>
                                        <div class="list-item">
                                            <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/05.svg') }}" alt="">
                                                2 Bed room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/06.html') }}" alt="">
                                                1 kitchen
                                            </li>
                                        </ul>
                                        <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/07.svg') }}" alt="">
                                                2 Wash room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/08.svg') }}" alt="">
                                                Internet
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="button-item">
                                            <h4>$109<span>/per night</span></h4>
                                            <a href="{{ route('destinations.index') }}" class="theme-btn">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                <div class="top-hotel-item">
                                    <div class="hotel-image">
                                        <img src="{{ asset('assets/img/inner-page/hotel/04.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <span><i class="fa-solid fa-star"></i> (4.8)</span>
                                    </div>
                                    <div class="hotel-content">
                                        <span><i class="fa-regular fa-location-dot"></i> Ao Nang, Thailand</span>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                            House pool Jungle Pool 
                                                Indonesia Hotel
                                            </a>
                                        </h3>
                                        <div class="list-item">
                                            <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/05.svg') }}" alt="">
                                                2 Bed room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/06.html') }}" alt="">
                                                1 kitchen
                                            </li>
                                        </ul>
                                        <ul class="list">
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/07.svg') }}" alt="">
                                                2 Wash room
                                            </li>
                                            <li>
                                                <img src="{{ asset('assets/img/inner-page/icon/08.svg') }}" alt="">
                                                Internet
                                            </li>
                                        </ul>
                                        </div>
                                        <div class="button-item">
                                            <h4>$67<span>/per night</span></h4>
                                            <a href="{{ route('destinations.index') }}" class="theme-btn">Book Now</a>
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
