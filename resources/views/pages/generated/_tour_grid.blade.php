@extends('layouts.roavio', ['title' => 'Tours'])

@section('content')
<!-- Breadcrumb Section Start -->
            <div class="breadcrumb-wrapper-2 style-tour-page bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-4.jpg') }}');">
                <div class="container">
                    <div class="page-heading">
                        <div class="breadcrumb-sub-title">
                            <h1 class="wow fadeInUp" data-wow-delay=".3s">Tour Grid</h1>
                        </div>
                        <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="style-2">
                            Tour Grid
                            </li>
                        </ul>
                        <div class="from-box wow fadeInUp" data-wow-delay=".3s">
                            <h3>Find adventure that suits your needs</h3>
                            <div class="box-item-2">
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

            <!-- Tour Grid Section Start -->
            <section class="tour-grid-section section-padding fix">
                <div class="container">
                    <div class="section-title text-center">
                        <h2 class="text-anim">Uncover Unique Tours Places</h2>
                        <p class="wow fadeInUp" data-wow-delay=".5s">One site <span class="count">30,500</span><b>+</b> most popular experience you’ll remember</p>
                    </div>
                    <div class="box-item-5">
                        <div class="form-clt">
                                <div class="form">
                                <select class="single-select w-100">
                                    <option>Filter by price</option>
                                    <option>0</option>
                                    <option>5,000</option>
                                    <option>10,000</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-clt">
                                <div class="form">
                                <select class="single-select w-100">
                                    <option>Tour Types</option>
                                    <option>Travel destinations</option>
                                    <option>Local places</option>
                                    <option>Adventure</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-clt">
                                <div class="form">
                                <select class="single-select w-100">
                                    <option>Destinations</option>
                                    <option>Singapore</option>
                                    <option>Thailand</option>
                                    <option>Maldives</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-clt">
                                <div class="form">
                                <select class="single-select w-100">
                                    <option>Language</option>
                                    <option>Bangla</option>
                                    <option>English</option>
                                    <option>Hindi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-clt">
                                <div class="form">
                                <select class="single-select w-100">
                                    <option>Durations</option>
                                    <option>1 Day</option>
                                    <option>2 Day</option>
                                    <option>3 Day</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".8s">
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
                        <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                            <div class="tour-place-item">
                                <div class="tour-place-image">
                                    <img src="{{ asset('assets/img/home-1/tour/tour-16.jpg') }}" alt="img">
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
                    <div class="page-nav-wrap text-center">
                        <ul>
                            <li><a class="page-numbers active" href="#"><i class="fa-solid fa-chevron-left"></i></a></li>
                            <li><a class="page-numbers" href="#">1</a></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="page-numbers style-2" href="#"><i class="fa-solid fa-chevron-right"></i></a></li>
                        </ul>
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
