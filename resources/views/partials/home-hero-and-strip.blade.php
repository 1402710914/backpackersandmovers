@once
    @push('styles')
        <style>
            .hero-1 .hero-content h1 {
                font-size: 62px;
            }
            @media (max-width: 1899px) {
                .hero-1 .hero-content h1 { font-size: 56px; }
            }
            @media (max-width: 1399px) {
                .hero-1 .hero-content h1 { font-size: 50px; }
            }
            @media (max-width: 1199px) {
                .hero-1 .hero-content h1 { font-size: 46px; }
            }
            @media (max-width: 991px) {
                .hero-1 .hero-content h1 { font-size: 42px; }
            }
            @media (max-width: 767px) {
                .hero-1 .hero-content h1 { font-size: 28px; }
            }
            @media (max-width: 575px) {
                .hero-1 .hero-content h1 { font-size: 26px; }
            }
        </style>
    @endpush
@endonce

{{-- Homepage hero slider --}}
<section class="hero-section-1 fix">
    <div class="swiper-dot-3"><div class="dot"></div></div>
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            @foreach (['hero-bg.jpg', 'hero-bg-2.jpg', 'hero-bg-3.jpg'] as $heroImg)
                <div class="swiper-slide">
                    <div class="hero-1">
                        <div class="hero-bg bg-cover" style="background-image: url('{{ theme_asset('assets/img/home-1/hero/'.$heroImg) }}');"></div>
                        <div class="container-fluid">
                            <div class="row g-4 justify-content-center align-items-center">
                                <div class="col-xl-8 col-lg-10 col-12 text-center">
                                    <div class="hero-content">
                                        <h1 data-animation="fadeInUp" data-delay="1.3s">Safe, educational adventures for students</h1>
                                        <p data-animation="fadeInUp" data-delay="1.3s">Backpackers and Movers organizes treks, field visits, outings, and weekend camps for schools and colleges across India.</p>
                                        <a href="{{ route('about') }}" class="theme-btn" data-animation="fadeInUp" data-delay="1.3s">About Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
