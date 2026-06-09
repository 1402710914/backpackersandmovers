{{-- Static theme sections (from original home) — between tours and blog --}}

@include('partials.home-about-section')

{{-- How to Benefit Our Tours --}}
<section class="benefit-tour-section section-padding fix header-bg">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="text-white text-anim">How to Benefit Our Tours</h2>
            <p class="text-white wow fadeInUp" data-wow-delay=".5s">Programs designed for schools and colleges—safe, educational, <br> and adventure-filled experiences beyond the classroom</p>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay=".3s">
                <div class="benefit-tour-item">
                    <div class="icon"><i class="flaticon-traveling"></i></div>
                    <div class="content">
                        <h5><a href="{{ route('tours.index') }}">Expert Travel Guide</a></h5>
                        <p>Travel professionals who help destinations, accommodations, and activities tailored.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4 col-md-6 wow img-custom-anim-top">
                <div class="benefit-tour-image">
                    <img src="{{ asset('assets/img/home-1/tour/tour-7.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInRight" data-wow-delay=".5s">
                <div class="benefit-tour-item">
                    <div class="icon"><i class="flaticon-roadmap"></i></div>
                    <div class="content">
                        <h5><a href="{{ route('tours.index') }}">Custom Tour Plan</a></h5>
                        <p>Enjoy trips designed around your preferences, whether you want a relaxing beach holiday</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="benefit-tour-item">
                    <div class="icon"><i class="flaticon-mouse"></i></div>
                    <div class="content">
                        <h5><a href="{{ route('tours.index') }}">Hassle-Free Booking</a></h5>
                        <p>Save time and effort with a single platform to book flights, hotels, activities, transportation</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="benefit-tour-item">
                    <div class="icon"><i class="flaticon-promotion"></i></div>
                    <div class="content">
                        <h5><a href="{{ route('tours.index') }}">Deals &amp; Discounts</a></h5>
                        <p>Save time and effort with a single platform to book flights, hotels, activities, transportation</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="benefit-tour-item">
                    <div class="icon"><i class="flaticon-tourist"></i></div>
                    <div class="content">
                        <h5><a href="{{ route('tours.index') }}">Local Guides Authentic</a></h5>
                        <p>Immerse yourself local culture with trusted guides who provide insider tips and hidden</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                <div class="benefit-tour-item">
                    <div class="icon"><i class="flaticon-insurance"></i></div>
                    <div class="content">
                        <h5><a href="{{ route('tours.index') }}">Travel Insurance</a></h5>
                        <p>Stay protected with insurance options and on-ground support for a worry-free experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Special Offers / Time Adventures --}}
<section class="adventure-section section-padding fix">
    <div class="container">
        <div class="adventure-wrapper">
            <div class="row g-4">
                <div class="col-xl-8">
                    <div class="row g-4">
                        <div class="col-xl-6 col-lg-6">
                            <div class="section-title mb-0">
                                <h2 class="text-anim">Special Offers Sort<br>Time Adventures</h2>
                            </div>
                            <p class="text wow fadeInUp" data-wow-delay=".5s">Don’t miss out our exclusive special deals, designed make your dream vacation more affordable than ever.</p>
                            <div class="adventure-image wow img-custom-anim-left">
                                <img src="{{ asset('assets/img/home-1/adventure/01.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="adventure-image wow img-custom-anim-top">
                                <img src="{{ asset('assets/img/home-1/adventure/02.jpg') }}" alt="">
                            </div>
                            <div class="adventure-box wow img-custom-anim-bottom">
                                <h3>
                                    <a href="{{ route('tours.index') }}">18+ years of experience in travel services</a>
                                </h3>
                                <div class="info-item">
                                    <img src="{{ asset('assets/img/home-1/adventure/client.png') }}" alt="">
                                    <div class="content">
                                        <h5>Mickel z Ponkoz</h5>
                                        <span>Travel guide</span>
                                    </div>
                                </div>
                                <div class="shape">
                                    <img src="{{ asset('assets/img/home-1/adventure/shape.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="adventure-thumb wow img-custom-anim-right">
                        <img src="{{ asset('assets/img/home-1/adventure/03.jpg') }}" alt="">
                        <div class="adventure-content">
                            <h6>23% Discount</h6>
                            <h3><a href="{{ route('tours.index') }}">Hotel &amp; Resort</a></h3>
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

{{-- All-in-one Travel Assistance --}}
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
                        <div class="icon"><i class="flaticon-traveling-1"></i></div>
                        <h4>Flight Booking &amp; Reservation</h4>
                    </div>
                    <p>Take the stress to travel with our seamless flight booking and reservation services.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="feature-item">
                    <div class="feature-icon-item">
                        <div class="icon"><i class="flaticon-hot-air-balloon"></i></div>
                        <h4>Hotel &amp; Resort Accommodation</h4>
                    </div>
                    <p>Enjoy a perfect stay with our carefully selected hotels and resorts.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                <div class="feature-item">
                    <div class="feature-icon-item">
                        <div class="icon style-2"><i class="flaticon-passport"></i></div>
                        <h4>Visa &amp; Travel <br> Assistance</h4>
                    </div>
                    <p>Travel confidently with our comprehensive Visa &amp; Travel Assistance services.</p>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                <div class="feature-item">
                    <div class="feature-icon-item">
                        <div class="icon style-2"><i class="flaticon-tent"></i></div>
                        <h4>Customized &amp; <br> Private Tours</h4>
                    </div>
                    <p>We design itineraries that match your interests, schedule, and budget.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Counters --}}
<section class="counter-section section-padding fix bg-cover" style="background-image: url('{{ asset('assets/img/home-1/bg.png') }}');">
    <div class="container">
        <div class="counter-wrapper">
            <div class="section-title text-center mb-0">
                <h2 class="text-white text-anim">Our Journey in Numbers</h2>
                <p class="text-white wow fadeInUp" data-wow-delay=".5s">Meaningful learning experiences with the highest standards of student safety and coordination</p>
            </div>
            <div class="row">
                <div class="counter-main-item">
                    <div class="counter-item wow fadeInUp" data-wow-delay=".3s">
                        <div class="icon"><i class="flaticon-costumer"></i></div>
                        <div class="content">
                            <h3><span class="count">300</span>+</h3>
                            <p>Successful treks completed</p>
                        </div>
                    </div>
                    <div class="counter-item wow fadeInUp" data-wow-delay=".5s">
                        <div class="icon"><i class="flaticon-suitcase"></i></div>
                        <div class="content">
                            <h3><span class="count">30</span>k+</h3>
                            <p>Happy students served</p>
                        </div>
                    </div>
                    <div class="counter-item wow fadeInUp" data-wow-delay=".7s">
                        <div class="icon"><i class="flaticon-excursion"></i></div>
                        <div class="content">
                            <h3><span class="count">70</span>+</h3>
                            <p>Educational &amp; adventure destinations</p>
                        </div>
                    </div>
                    <div class="counter-item wow fadeInUp" data-wow-delay=".9s">
                        <div class="icon"><i class="flaticon-insurance"></i></div>
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

@include('partials.home-trek-prep')

{{-- Activities strip --}}
<section class="activities-section section-padding fix">
    <div class="container custom-container">
        <div class="activities-wrapper row g-4 g-xl-2 row-cols-xl-5 row-cols-lg-4 row-cols-md-2 row-cols-1">
            <div class="col activities-card-item wow fadeInUp">
                <div class="activities-image"><img src="{{ asset('assets/img/home-1/activiti/01.jpg') }}" alt=""></div>
                <div class="activities-content"><h4><a href="{{ route('tours.category', 'educational-one-day-outing') }}">One-Day School Outings</a></h4></div>
            </div>
            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".2s">
                <div class="activities-image"><img src="{{ asset('assets/img/home-1/activiti/02.jpg') }}" alt=""></div>
                <div class="activities-content"><h4><a href="{{ route('tours.category', 'educational-field-visit') }}">Educational Field Visits</a></h4></div>
            </div>
            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".4s">
                <div class="activities-image"><img src="{{ asset('assets/img/home-1/activiti/03.jpg') }}" alt=""></div>
                <div class="activities-content"><h4><a href="{{ route('tours.category', 'one-day-trek') }}">Treks &amp; Weekend Camps</a></h4></div>
            </div>
            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".6s">
                <div class="activities-image"><img src="{{ asset('assets/img/home-1/activiti/04.jpg') }}" alt=""></div>
                <div class="activities-content"><h4><a href="{{ route('tours.category', 'agri-tourism') }}">Agri Tourism</a></h4></div>
            </div>
            <div class="col activities-card-item wow fadeInUp" data-wow-delay=".8s">
                <div class="activities-image"><img src="{{ asset('assets/img/home-1/activiti/05.jpg') }}" alt=""></div>
                <div class="activities-content"><h4><a href="{{ route('tours.category', 'one-night-camping') }}">One Night Camping</a></h4></div>
            </div>
        </div>
    </div>
</section>

{{-- 100k+ Customer Say Us --}}
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
                                @foreach (range(1, 4) as $ti)
                                    <div class="swiper-slide">
                                        <div class="content">
                                            <div class="icon"><i class="flaticon-left-quote"></i></div>
                                            <p>"Booking with this agency was the best decision for our Bali trip! from flights to accommodations!"</p>
                                            <div class="client-image">
                                                <img src="{{ asset('assets/img/home-1/testimonial/client.png') }}" alt="">
                                            </div>
                                            <h4>Michael Thompson</h4>
                                            <span>World traveler</span>
                                        </div>
                                    </div>
                                @endforeach
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
                                <div class="testimonial-image"><img src="{{ asset('assets/img/home-1/testimonial/01.jpg') }}" alt=""></div>
                            </div>
                            <div class="col-xl-5 col-md-6 wow img-custom-anim-right">
                                <div class="testimonial-image"><img src="{{ asset('assets/img/home-1/testimonial/02.jpg') }}" alt=""></div>
                            </div>
                            <div class="col-xl-5 col-md-6 wow img-custom-anim-left">
                                <div class="testimonial-image"><img src="{{ asset('assets/img/home-1/testimonial/03.jpg') }}" alt=""></div>
                            </div>
                            <div class="col-xl-7 col-md-6 wow img-custom-anim-right">
                                <div class="testimonial-image">
                                    <img src="{{ asset('assets/img/home-1/testimonial/04.jpg') }}" alt="">
                                    <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup"><i class="fa-duotone fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
