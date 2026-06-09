@extends('layouts.roavio', ['title' => 'Team'])

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
    <div class="breadcrumb-wrapper-4 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
        <div class="container">
            <div class="breadcrumb-top-items">
                <div class="page-heading">
                    <div class="breadcrumb-sub-title">
                    <h1 class="wow fadeInUp" data-wow-delay=".3s">
                        Team Member
                    </h1>
                </div>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li class="style-2 style-3">
                        Team Member
                </li>
                </ul>
            </div>
            <div class="content">
                <h2><span class="count">100</span>+</h2>
                <p>Professional Team Member</p>
            </div>
            </div>
        </div>
    </div>

    <!-- Tour-Dedicated Section Start -->
    <section class="tour-dedicated-section section-padding fix">
        <div class="container">
            <div class="tour-dedicated-wrapper">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="tour-dedicated-content">
                            <div class="section-title mb-0">
                                <h2 class="text-anim">
                                    Dedicated Travel Specialists
                                    Your Dream Tours Care
                                </h2>
                                <p class="text">
                                    We provide personalized guidance to ensure every journey is smooth, enjoyable, and unforgettable. From planning the perfect itinerary to offering 24/7 support, our trusted specialists are here to make your travel experience truly exceptional.
                                </p>
                                <div class="tour-dedicated-item">
                                    <div class="left-icon-item">
                                        <div class="icon-item">
                                            <div class="icon">
                                                <i class="flaticon-traveling"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Travel Specialists</h5>
                                                <p>
                                                    Our travel specialists bring years of expertise.
                                                </p>
                                            </div>
                                            <a href="{{ route('team.index') }}" class="theme-btn">Meet Our Team</a>
                                        </div>
                                            <div class="icon-item">
                                            <div class="icon">
                                                <i class="flaticon-destination"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Trusted & secure</h5>
                                                <p>
                                                    At our travel agency, your safety and trust priorities
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="thumb">
                                        <img src="{{ asset('assets/img/inner-page/tour-details/01.jpg') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="tour-image">
                            <img data-speed=".8" src="{{ asset('assets/img/inner-page/tour-details/02.jpg') }}" alt="img">
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

      <!-- Team Section Start -->
      <section class="team-single-section section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="text-anim">Meet Our Travel Guide</h2>
                <p class="wow fadeInUp" data-wow-delay=".5s">The leadership team guiding Togo’s success</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/01.jpg') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">Emma Williams</a></h3>
                            <p>Senior Tour Guide</p>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/02.jpg') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">James Anderson</a></h3>
                            <p>Travel Specialist</p>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/03.jpg') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">Sophia Martinez</a></h3>
                            <p>Cultural Guide</p>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/04.jpg') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">Ava Thompson</a></h3>
                            <p>Holiday Planner</p>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/05.html') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">Michael Anderson</a></h3>
                            <p>Holiday Planner</p>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/06.jpg') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">Christopher Hughes</a></h3>
                            <p>Holiday Planner</p>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/07.jpg') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">Matthew Johnson</a></h3>
                            <p>Holiday Planner</p>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="team-single-item">
                        <div class="team-image">
                            <img src="{{ asset('assets/img/home-2/team/08.jpg') }}" alt="img">
                            <div class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3><a href="{{ route('team.index') }}">Sarah Thompson</a></h3>
                            <p>Holiday Planner</p>   
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
