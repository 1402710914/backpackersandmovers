@extends('layouts.roavio', ['title' => 'Contact'])

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
                <div class="breadcrumb-wrapper-3 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
                    <div class="container">
                        <div class="page-heading">
                            <div class="breadcrumb-sub-title">
                                <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                Contact
                                </h1>
                            </div>
                            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="style-2 style-3">
                                Contact
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>

                <!-- Conatct-Us Section Start -->
                <section class="conatct-us-section-3 section-padding fix">
                    <div class="container">
                        <div class="contact-us-wrapper-3">
                            <div class="row g-4">
                                <div class="col-xl-5 col-lg-6">
                                    <div class="contact-us-content">
                                        <div class="section-title mb-0">
                                            <h2 class="text-anim">
                                                Start Your Adventure
                                                Contact Us Today
                                            </h2>
                                        </div>
                                        <p class="text">
                                            Have questions or ready to plan your next adventure? Our travel experts are here to guide you every step of the way.
                                        </p>
                                        <div class="contact-us-item">
                                            <div class="content">
                                                <h5>
                                                    <i class="fa-solid fa-envelope"></i>
                                                    Email us
                                                </h5>
                                                <h6>
                                                    <a href="https://html.webtend.net/cdn-cgi/l/email-protection#64171114140b1610160b05120d0b240309050d084a070b09"><span class="__cf_email__" data-cfemail="1764626767786563657876617e7857707a767e7b3974787a">[email&#160;protected]</span></a>
                                                </h6>
                                                <h6>
                                                    <a href="https://html.webtend.net/cdn-cgi/l/email-protection#3c4b4b4b124e535d4a55530e080b125f5351">www.roavio247.com</a>
                                                </h6>
                                            </div>
                                            <div class="content">
                                                <h5>
                                                    <i class="fa-solid fa-phone"></i>
                                                    Call Us
                                                </h5>
                                                <h6>
                                                    <a href="tel:+11234567890">+1 123456 7890</a>
                                                </h6>
                                                <h6>
                                                    Available 24/7 hours
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="contact-us-item mb-0">
                                            <div class="content">
                                                <h5>
                                                    <i class="fas fa-alarm-clock"></i>
                                                    Working Hours
                                                </h5>
                                                <h6>
                                                    Sunday to Friday <br> 08:00 AM – 06:00 PM
                                                </h6>
                                            </div>
                                            <div class="content">
                                                <h5>
                                                    <i class="fa-solid fa-earth-americas"></i>
                                                    USA Office
                                                </h5>
                                                <h6>
                                                    20 Cooper Square, New <br>
                                                    York, NY 10003, USA
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-6">
                                    <div class="contact-box">
                                        <form action="{{ route('contact.submit') }}" id="contact-form1" method="POST" class="contact-form-items">
                                            @csrf
                                            <div class="row g-4">
                                                <div class="col-lg-6">
                                                    <div class="form-clt">
                                                        <span>Full Name</span>
                                                        <input type="text" name="name" id="name331" placeholder="Full Name" value="{{ old('name') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-clt">
                                                        <span>Phone</span>
                                                        <input type="text" name="phone" id="name22" placeholder="Phone Number" value="{{ old('phone') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-clt">
                                                        <span>Email Address</span>
                                                        <input type="email" name="email" id="email11" placeholder="Your email" value="{{ old('email') }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-clt">
                                                        <span>Subject</span>
                                                        <input type="text" name="subject" id="name24" placeholder="Subject" value="{{ old('subject') }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-clt">
                                                        <span>Comments</span>
                                                        <textarea name="message" id="message1" placeholder="Type your message" required>{{ old('message') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <button type="submit" class="theme-btn">
                                                Send Your Message
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Map Section Start -->
                <div class="map-section section-padding fix pt-0">
                    <div class="container">
                        <div class="map-items">
                            <div class="googpemap">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
      
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
                                                    Adventure is calling – Are You Ready?
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
