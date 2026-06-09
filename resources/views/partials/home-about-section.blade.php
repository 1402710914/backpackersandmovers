@once
    @push('styles')
        @include('partials.home-about-section-styles')
    @endpush
@endonce

<section class="home-about-section">
    <div class="container">
        <div class="row g-4 g-xl-5 align-items-center">
            <div class="col-lg-6 order-lg-1 order-2">
                <div class="home-about__visual wow fadeInLeft" data-wow-delay=".2s">
                    <div class="home-about__img-main">
                        <img src="{{ theme_asset('assets/img/home-1/about/01.jpg') }}" alt="Students on an educational trek with Backpackers and Movers" loading="lazy">
                    </div>
                    <div class="home-about__img-secondary wow fadeInUp" data-wow-delay=".4s">
                        <img src="{{ theme_asset('assets/img/home-1/about/02.jpg') }}" alt="School group outdoor program" loading="lazy">
                    </div>
                    <div class="home-about__float-card wow fadeInRight" data-wow-delay=".5s">
                        <div class="icon"><i class="flaticon-travel" aria-hidden="true"></i></div>
                        <h5>Student safety first</h5>
                        <p>Experienced leadership and disciplined coordination on every outing, trek, and camp.</p>
                    </div>
                    <div class="home-about__badge-count wow fadeInUp" data-wow-delay=".6s">
                        <strong><span class="count">300</span>+</strong>
                        <span>Successful programs for schools &amp; colleges</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 order-lg-2 order-1">
                <div class="home-about__content">
                    <span class="home-about__eyebrow wow fadeInUp" data-wow-delay=".2s">
                        <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                        Why schools choose us
                    </span>
                    <h2 class="home-about__title text-anim wow fadeInUp" data-wow-delay=".3s">
                        Safe &amp; enriching <em>student travel</em> with Backpackers and Movers
                    </h2>
                    <p class="home-about__lead wow fadeInUp" data-wow-delay=".4s">
                        We create safe, educational outdoor experiences for schools and colleges—combining learning, adventure, discipline, and fun beyond the classroom.
                    </p>

                    <div class="home-about__stats wow fadeInUp" data-wow-delay=".45s">
                        <div class="home-about__stat">
                            <strong><span class="count">300</span>+</strong>
                            <span>Programs completed</span>
                        </div>
                        <div class="home-about__stat">
                            <strong>70+</strong>
                            <span>Destinations covered</span>
                        </div>
                        <div class="home-about__stat">
                            <strong>2</strong>
                            <span>Pickup cities — {{ tour_pickup_locations_label() }}</span>
                        </div>
                        <div class="home-about__stat">
                            <strong>0</strong>
                            <span>Major safety incidents</span>
                        </div>
                    </div>

                    <div class="home-about__features wow fadeInUp" data-wow-delay=".5s">
                        <div class="home-about__feature">
                            <i class="fa-solid fa-bus" aria-hidden="true"></i>
                            One-day outings &amp; field visits
                        </div>
                        <div class="home-about__feature">
                            <i class="fa-solid fa-person-hiking" aria-hidden="true"></i>
                            Treks &amp; weekend camps
                        </div>
                        <div class="home-about__feature">
                            <i class="fa-solid fa-school" aria-hidden="true"></i>
                            Customized school programs
                        </div>
                        <div class="home-about__feature">
                            <i class="fa-solid fa-people-group" aria-hidden="true"></i>
                            Teamwork &amp; leadership focus
                        </div>
                        <div class="home-about__feature">
                            <i class="fa-solid fa-map-location-dot" aria-hidden="true"></i>
                            Maharashtra-wide coverage
                        </div>
                        <div class="home-about__feature">
                            <i class="fa-solid fa-user-shield" aria-hidden="true"></i>
                            Trained trek leaders on every trip
                        </div>
                    </div>

                    <div class="home-about__pickup wow fadeInUp" data-wow-delay=".55s" role="note">
                        <i class="fa-solid fa-bus" aria-hidden="true"></i>
                        <span>All tours depart from <strong>{{ tour_pickup_locations_label() }}</strong> only — convenient pickup for school groups in both cities.</span>
                    </div>

                    <div class="home-about__actions wow fadeInUp" data-wow-delay=".6s">
                        <a href="{{ route('about') }}" class="theme-btn">About us</a>
                        <a href="{{ route('tours.index') }}" class="theme-btn style-2">Explore tours</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
