@extends('layouts.roavio', ['title' => 'About Us'])

@section('content')
<!-- Hero Section Start -->
                <div class="breadcrumb-wrapper-2 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-1.html') }}');">
                    <div class="container">
                        <div class="page-heading">
                            <div class="breadcrumb-sub-title">
                                <h1 class="wow fadeInUp" data-wow-delay=".3s">About Us</h1>
                            </div>
                            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="style-2">
                            About Us
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>

                <!-- About Section-2 Start -->
                <section class="about-section-2 section-padding fix">
                    <div class="container">
                        <div class="about-wrapper-2 style-2">
                            <div class="row g-4">
                                <div class="col-lg-7">
                                    <div class="about-content">
                                        <div class="section-title mb-0">
                                            <h2 class="text-anim">
                                                Student-Focused Travel &amp; Trek Experiences
                                            </h2>
                                        </div>
                                        <p class="text wow fadeInUp" data-wow-delay=".5s">
                                            We are a student-focused travel and trek organizing team dedicated to creating safe, educational, and enriching outdoor experiences for schools and colleges. Our programs combine learning, adventure, discipline, and fun, helping students grow beyond classroom boundaries.
                                        </p>
                                        <p class="text wow fadeInUp" data-wow-delay=".6s">
                                            With a strong focus on student safety, experienced leadership, and well-planned itineraries, we organize one-day outings, educational field visits, treks, and weekend camps that build confidence, teamwork, leadership, and respect for nature. We work closely with schools and colleges to deliver customized programs that suit academic goals, budget, and student age groups.
                                        </p>
                                        <p class="text wow fadeInUp mb-3" data-wow-delay=".7s">
                                            <em>Yours sincerely,</em><br>
                                            <strong>Backpackers and Movers</strong><br>
                                            Educational Tours and Travels
                                        </p>
                                        <div class="about-item">
                                            <div class="about-image wow img-custom-anim-left">
                                                <img src="{{ asset('assets/img/home-2/about/about-4.jpg') }}" alt="img">
                                            </div>
                                            <div class="right-content wow fadeInUp" data-wow-delay=".3s">
                                                <ul class="nav">
                                                    <li class="nav-item">
                                                        <a href="#Course" data-bs-toggle="tab" class="nav-link active">
                                                        Our Mission
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#Curriculum" data-bs-toggle="tab" class="nav-link">
                                                        Our Vision
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                <div id="Course" class="tab-pane fade show active">
                                                        <div class="content">
                                                            <p>
                                                                Our mission is to create meaningful learning experiences outdoors while maintaining the highest standards of student safety, discipline, and coordination on every program.
                                                            </p>
                                                            <ul class="list">
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Safe, educational outdoor experiences
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    One-day outings &amp; field visits
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Treks &amp; weekend camps for students
                                                                </li>
                                                            </ul>
                                                            <a href="{{ route('contact') }}" class="theme-btn">Plan a Program</a>
                                                        </div>
                                                    </div>
                                                    <div id="Curriculum" class="tab-pane fade">
                                                        <div class="content">
                                                            <p>
                                                                We partner with schools and colleges to design customized educational tours and adventure programs aligned with academic goals, budgets, and student age groups.
                                                            </p>
                                                            <ul class="list">
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Customized school &amp; college itineraries
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Experienced leadership on every trip
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Teamwork, leadership &amp; nature awareness
                                                                </li>
                                                            </ul>
                                                            <a href="{{ route('contact') }}" class="theme-btn">Plan a Program</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="about-image-item">
                                        <div class="about-image-2 wow img-custom-anim-top">
                                            <img src="{{ asset('assets/img/home-2/about/about-5.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Video Section-2 Start -->
                <div class="video-section-2 fix bg-cover" style="background-image: url('{{ asset('assets/img/home-2/video-bg.jpg') }}');">
                    <div class="container">
                        <div class="video-content">
                            <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup">
                                <i class="fa-duotone fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Counter Section Start -->
                <section class="counter-section-2 section-padding fix">
                    <div class="container">
                        <div class="counter-wrapper-2">
                            <div class="section-title text-center mb-0">
                                <h2 class="text-white text-anim">Our Journey in Numbers</h2>
                                <p class="text-white wow fadeInUp" data-wow-delay=".5s">Over the years, we have successfully organized hundreds of tours, treks, and camps with a strong focus on safety, discipline, and quality experiences.</p>
                            </div>
                            <div class="row">
                                <div class="counter-main-item-2">
                                    <div class="counter-item wow fadeInUp" data-wow-delay=".3s">
                                        <div class="icon">
                                            <i class="flaticon-costumer"></i>
                                        </div>
                                        <div class="content">
                                            <h3><span class="count">300</span>+</h3>
                                            <p>Successful treks completed</p>
                                        </div>
                                    </div>
                                    <div class="counter-item wow fadeInUp" data-wow-delay=".5s">
                                        <div class="icon">
                                            <i class="flaticon-suitcase"></i>
                                        </div>
                                        <div class="content">
                                            <h3><span class="count">30</span>k+</h3>
                                            <p>Happy students served</p>
                                        </div>
                                    </div>
                                    <div class="counter-item wow fadeInUp" data-wow-delay=".7s">
                                        <div class="icon">
                                            <i class="flaticon-excursion"></i>
                                        </div>
                                        <div class="content">
                                            <h3><span class="count">70</span>+</h3>
                                            <p>Educational &amp; adventure destinations</p>
                                        </div>
                                    </div>
                                    <div class="counter-item wow fadeInUp" data-wow-delay=".9s">
                                        <div class="icon">
                                            <i class="flaticon-insurance"></i>
                                        </div>
                                        <div class="content">
                                            <h3>Zero</h3>
                                            <p>Major safety incidents recorded</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Team Section-2 Start -->
                <div class="team-section section-padding fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">Meet Our Leadership Team</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Experienced guides and coordinators dedicated to safe, enriching student journeys</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-md-6 col-lg-3">
                                <div class="team-image-item">
                                    <div class="team-image">
                                        <img src="{{ asset('assets/img/home-2/team/01.jpg') }}" alt="img">
                                    </div>
                                    <div class="team-content">
                                        <h3><a href="{{ route('team.index') }}">Emma Williams</a></h3>
                                        <p>Senior Tour Guide</p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-3">
                                <div class="team-image-item">
                                    <div class="team-image">
                                        <img src="{{ asset('assets/img/home-2/team/02.jpg') }}" alt="img">
                                    </div>
                                    <div class="team-content">
                                        <h3><a href="{{ route('team.index') }}">James Anderson</a></h3>
                                        <p>Travel Specialist</p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-3">
                                <div class="team-image-item">
                                    <div class="team-image">
                                        <img src="{{ asset('assets/img/home-2/team/03.jpg') }}" alt="img">
                                    </div>
                                    <div class="team-content">
                                        <h3><a href="{{ route('team.index') }}">Sophia Martinez</a></h3>
                                        <p>Cultural Guide</p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-3">
                                <div class="team-image-item">
                                    <div class="team-image">
                                        <img src="{{ asset('assets/img/home-2/team/04.jpg') }}" alt="img">
                                    </div>
                                    <div class="team-content">
                                        <h3><a href="{{ route('team.index') }}">Ava Thompson</a></h3>
                                        <p>Holiday Planner</p>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Choose Section-2 Start -->
                <div class="choose-us-section section-padding fix bg-cover" style="background-image: url('{{ asset('assets/img/home-2/bg.jpg') }}');">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">Why Schools &amp; Colleges Choose Us</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Through every journey, we create meaningful learning experiences with the highest standards of student safety and coordination.</p>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="choose-us-box">
                                    <div class="icon">
                                        <i class="flaticon-travel-agency-1"></i>
                                    </div>
                                    <div class="choose-us-content">
                                        <h5>Student Safety First</h5>
                                        <p>Experienced leadership and disciplined coordination on every outing, trek, and camp.</p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="choose-us-box">
                                    <div class="icon">
                                    <i class="flaticon-price-tag"></i>
                                    </div>
                                    <div class="choose-us-content">
                                        <h5>Customized Programs</h5>
                                        <p>Itineraries tailored to your institution’s academic goals, budget, and age groups.</p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="choose-us-box">
                                    <div class="icon">
                                        <i class="flaticon-booking"></i>
                                    </div>
                                    <div class="choose-us-content">
                                        <h5>Educational Focus</h5>
                                        <p>Field visits and outdoor programs that combine learning, adventure, and fun.</p>   
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="choose-us-box">
                                    <div class="icon">
                                        <i class="flaticon-destination"></i>
                                    </div>
                                    <div class="choose-us-content">
                                        <h5>70+ Destinations</h5>
                                        <p>Educational and adventure destinations covered across our student travel programs.</p>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                        <a href="{{ route('tours.index') }}">One-Day School Outings</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".2s">
                                <div class="activities-image">
                                    <img src="{{ asset('assets/img/home-1/activiti/02.jpg') }}" alt="img">
                                </div>
                                <div class="activities-content">
                                    <h4>
                                        <a href="{{ route('tours.index') }}">Educational Field Visits</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".4s">
                                <div class="activities-image">
                                    <img src="{{ asset('assets/img/home-1/activiti/03.jpg') }}" alt="img">
                                </div>
                                <div class="activities-content">
                                    <h4>
                                        <a href="{{ route('tours.index') }}">Treks &amp; Weekend Camps</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".6s">
                                <div class="activities-image">
                                    <img src="{{ asset('assets/img/home-1/activiti/04.jpg') }}" alt="img">
                                </div>
                                <div class="activities-content">
                                    <h4>
                                        <a href="{{ route('tours.index') }}">Team Building Activities</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".8s">
                                <div class="activities-image">
                                    <img src="{{ asset('assets/img/home-1/activiti/05.jpg') }}" alt="img">
                                </div>
                                <div class="activities-content">
                                    <h4>
                                        <a href="{{ route('tours.index') }}">Nature &amp; Leadership Programs</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Testimonial Section Start -->
                <section class="testimonial-section style-2 section-padding fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">100k+ Customer Say Us</h2>
                            <p class="wow fadeInUp" data-wow-delay=".5s">Join over 100,000 satisfied travelers who have experienced</p>
                        </div>
                        <div class="testimonial-wrapper">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="testimonial-content style-2">
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
                                        <div class="swiper-dot style-2">
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
                                                    Plan Your Next Student Trip With Us
                                                </h2>
                                            </div>
                                            <p class="text wow fadeInUp" data-wow-delay=".3s">
                                            Partner with Backpackers and Movers for safe, educational, and adventure-filled programs designed for schools and colleges.
                                            </p>
                                            <a href="{{ route('contact') }}" class="theme-btn">Get in Touch</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
@endsection
