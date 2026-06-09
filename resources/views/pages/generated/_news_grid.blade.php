@extends('layouts.roavio', ['title' => 'Travel News'])

@section('content')
<!-- Breadcrumb Section Start -->
        <div class="breadcrumb-wrapper fix">
            <div class="container">
                <div class="page-heading">
                    <div class="breadcrumb-sub-title">
                        <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Grid</h1>
                    </div>
                    <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="style-2">
                       Blog Grid
                    </li>
                  </ul>
                </div>
            </div>
        </div>

                <!-- News Section Start -->
                <section class="news-section-2 section-padding pt-0 fix">
                        <div class="container">
                            <div class="row g-4">
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-5.jpg') }}" alt="img">
                                            <span>18 August</span>
                                        </div>
                                        <div class="news-content">
                                            <span>Tours & travel</span>
                                            <h3>
                                                <a href="{{ route('blog.index') }}">
                                                    Best Family-Friendly Travel Spots Around the World 
                                                </a>
                                            </h3>
                                            <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-6.jpg') }}" alt="img">
                                            <span>19 August</span>
                                        </div>
                                        <div class="news-content">
                                            <span>Tours & travel</span>
                                            <h3>
                                                <a href="{{ route('blog.index') }}">
                                                Eco-Friendly Travel How to Make
                                                    Your Trips Sustainable
                                                </a>
                                            </h3>
                                            <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-7.jpg') }}" alt="img">
                                            <span>20 August</span>
                                        </div>
                                        <div class="news-content">
                                            <span>Tours & travel</span>
                                            <h3>
                                                <a href="{{ route('blog.index') }}">
                                                World is a book, and those who do not travel read only one page.
                                                </a>
                                            </h3>
                                            <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-8.jpg') }}" alt="img">
                                            <span>21 August</span>
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-9.jpg') }}" alt="img">
                                            <span>22 August</span>
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-10.jpg') }}" alt="img">
                                            <span>23 August</span>
                                        </div>
                                        <div class="news-content">
                                            <span>Tours & travel</span>
                                            <h3>
                                                <a href="{{ route('blog.index') }}">
                                                Eco-Friendly Travel How to Make
                                                    Your Trips Sustainable
                                                </a>
                                            </h3>
                                            <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-11.jpg') }}" alt="img">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-12.jpg') }}" alt="img">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-13.html') }}" alt="img">
                                            <span>18 August</span>
                                        </div>
                                        <div class="news-content">
                                            <span>Tours & travel</span>
                                            <h3>
                                                <a href="{{ route('blog.index') }}">
                                                Eco-Friendly Travel How to Make
                                                    Your Trips Sustainable
                                                </a>
                                            </h3>
                                            <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-14.html') }}" alt="img">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-15.html') }}" alt="img">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="news-card-items mt-0">
                                        <div class="news-image">
                                            <img src="{{ asset('assets/img/home-1/news/news-16.jpg') }}" alt="img">
                                            <span>18 August</span>
                                        </div>
                                        <div class="news-content">
                                            <span>Tours & travel</span>
                                            <h3>
                                                <a href="{{ route('blog.index') }}">
                                                Eco-Friendly Travel How to Make
                                                Your Trips Sustainable
                                                </a>
                                            </h3>
                                            <a href="{{ route('blog.index') }}" class="link-btn">Read More <i class="fa-solid fa-chevron-right"></i></a>
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
