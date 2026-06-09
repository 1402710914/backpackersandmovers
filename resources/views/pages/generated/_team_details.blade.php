@extends('layouts.roavio', ['title' => 'Team Details'])

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
            <div class="breadcrumb-wrapper-4 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
                <div class="container">
                    <div class="breadcrumb-top-items">
                        <div class="page-heading">
                            <div class="breadcrumb-sub-title">
                            <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                Team Details
                            </h1>
                        </div>
                        <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li class="style-2 style-3">
                            Team Details
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

            <!-- Team-Detailsr Section Start -->
            <section class="team-details-section fix section-padding">
                    <div class="container">
                        <div class="team-details-wrapper">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-5">
                                    <div class="team-details-image">
                                        <img src="{{ asset('assets/img/inner-page/details.html') }}" alt="team-img">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="team-details-content">
                                        <div class="details-info">
                                            <h3>David Ahmed</h3>
                                            <span>Software Engineer</span>
                                        </div>
                                        <p class="mt-3">
                                            Mauris sapien neque, placerat ut dolor nec, egestas tincidunt felis. Sed in ornare quam, finibus dui aliquam justo duis eros quam, semper at libero sed, vehicula the  consequat arcu. In ornare, enim at egestas bibendum, ligula ante congue arcu, sed ornare sem nulla is nec magna. Morbi faucibus.
                                        </p>
                                        <div class="progress-area mt-4">
                                            <div class="progress-wrap">
                                                <div class="pro-items">
                                                    <div class="pro-head">
                                                        <h6 class="title">
                                                            tour package 
                                                        </h6>
                                                        <span class="point">
                                                        90%
                                                        </span>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-wow-duration=".9s" role="progressbar" style="width: 90%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="pro-items">
                                                    <div class="pro-head">
                                                        <h6 class="title">
                                                            Travel
                                                        </h6>
                                                        <span class="point">
                                                            95%
                                                        </span>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar" data-wow-duration=".9s" role="progressbar" style="width: 85%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="social-icon">
                                            <span>Social Media:</span>
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-single-history pt-5">
                                <div class="title">
                                    <h3>Education Background</h3>
                                </div>
                                <h5 class="pt-5">Diploma in Web Design <span>2012 - 2014</span></h5>
                                <p class="mt-3">
                                    Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's in the ou standard dummy text ever since the 1500s, when an unknown printer took.Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's in the abouti standard dummy
                                </p>
                                <h5 class="pt-5">Degree in UI/UX Design <span>2015 - 2016 </span></h5>
                                <p class="mt-3">
                                    Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's in the ou standard dummy text ever since the 1500s, when an unknown printer took.Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's in the abouti standard dummy
                                </p>
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
