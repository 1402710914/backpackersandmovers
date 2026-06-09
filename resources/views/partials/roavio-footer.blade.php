<footer class="footer-section fix header-bg">
    <div class="container">
        <div class="footer-widget-wrapper">
            <div class="row g-4 justify-content-xl-between">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp">
                    <div class="single-footer-widget">
                        <div class="wid-title"><h4>Tour programs</h4></div>
                        <ul class="list-area">
                            @forelse ($footerTourCategories ?? [] as $cat)
                                <li>
                                    <a href="{{ route('tours.category', $cat->slug) }}"><i class="fa-solid fa-chevron-right"></i> {{ $cat->name }}</a>
                                </li>
                            @empty
                                <li><a href="{{ route('tours.index') }}"><i class="fa-solid fa-chevron-right"></i> All tours</a></li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="wid-title"><h4>Explore</h4></div>
                        <ul class="list-area">
                            <li><a href="{{ route('about') }}"><i class="fa-solid fa-chevron-right"></i> About</a></li>
                            <li><a href="{{ route('team.index') }}"><i class="fa-solid fa-chevron-right"></i> Team</a></li>
                            <li><a href="{{ route('blog.index') }}"><i class="fa-solid fa-chevron-right"></i> Blog</a></li>
                            <li><a href="{{ route('faq') }}"><i class="fa-solid fa-chevron-right"></i> FAQ</a></li>
                            <li><a href="{{ route('gallery') }}"><i class="fa-solid fa-chevron-right"></i> Gallery</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa-solid fa-chevron-right"></i> Contact</a></li>
                            <li><a href="{{ route('policy') }}"><i class="fa-solid fa-chevron-right"></i> Policies</a></li>
                            @auth
                                <li><a href="{{ route('dashboard') }}"><i class="fa-solid fa-chevron-right"></i> My account</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="wid-title"><h4>Get In Touch</h4></div>
                        <div class="contact-item">
                            <div class="icon"><i class="fa-solid fa-bus"></i></div>
                            <div class="content"><h6>Tour pickup: <strong>{{ tour_pickup_locations_label() }}</strong> only — all departures from these two cities.</h6></div>
                        </div>
                        <div class="contact-item">
                            <div class="icon"><i class="fa-regular fa-map-location-dot"></i></div>
                            <div class="content"><h6>Office: Sherine Heights, Lane No. 4,<br>Madhuban Society, Old Sangvi,<br>Pune</h6></div>
                        </div>
                        <div class="contact-item">
                            <div class="icon"><i class="fa-regular fa-envelope"></i></div>
                            <div class="content"><h6><a href="mailto:backpackersandmovers@gmail.com">backpackersandmovers@gmail.com</a></h6></div>
                        </div>
                        <div class="contact-item">
                            <div class="icon"><i class="fa-brands fa-whatsapp"></i></div>
                            <div class="content"><h6><a href="https://wa.me/918788883003" target="_blank" rel="noopener noreferrer">8788883003</a></h6></div>
                        </div>
                        <div class="contact-item mb-0">
                            <div class="icon"><i class="fa-regular fa-phone-volume"></i></div>
                            <div class="content">
                                <h6 class="mb-1">James Jules — <a href="tel:+918788883003">8788883003</a></h6>
                                <h6 class="mb-1">Shivam Naik — <a href="tel:+918149570210">8149570210</a></h6>
                                <h6 class="mb-0">Shubham Naik — <a href="tel:+918149593316">8149593316</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="wid-title"><h4>Subscribe Our Newsletter to get more offer &amp; Tips</h4></div>
                        <div class="newsletter-content">
                            <p>Stay connected &amp; never miss a deal! subscribe to our newsletter and get travel offers</p>
                            <form action="{{ route('newsletter.subscribe') }}" method="post">
                                @csrf
                                <div class="form-clt">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email">
                                    <button type="submit" class="theme-btn">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom style-1">
        <div class="container">
            <div class="footer-wrapper align-items-end align-items-xl-center">
                <a href="{{ route('home') }}" class="wow fadeInUp footer-bottom-brand d-inline-block text-center text-xl-start me-3 me-xl-0 mb-2 mb-xl-0" data-wow-delay=".3s" title="{{ config('app.name') }}">
                    <img src="{{ logo_url() }}" class="site-brand-logo-footer-wide" alt="{{ config('app.name') }}">
                </a>
                <div class="text-item wow fadeInUp flex-shrink-0" data-wow-delay=".5s">
                    <p class="mb-0">&copy; {{ date('Y') }} <span>{{ config('app.name') }},</span> All rights reserved</p>
                    <a href="#" class="icon back-to-top"><i class="fa-solid fa-chevron-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
