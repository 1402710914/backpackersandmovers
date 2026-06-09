@extends('layouts.roavio', ['title' => 'Article'])

@section('content')
<!-- Hero Section Start -->
            <div class="breadcrumb-wrapper fix">
                <div class="container">
                    <div class="page-heading">
                        <div class="breadcrumb-sub-title">
                            <h1 class="wow fadeInUp" data-wow-delay=".3s">Blog Details</h1>
                        </div>
                        <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="{{ route('home') }}">
                                Home
                            </a>
                        </li>
                        <li class="style-2">
                        Blog Details
                        </li>
                    </ul>
                    </div>
                </div>
            </div>

            <!-- News Section Start -->
            <section class="news-details-section section-padding pt-0">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-8 col-12">
                                <div class="news-details-post">
                                    <ul class="list">
                                        <li>
                                            <a href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li class="style-2">Single blog</li>
                                    </ul>
                                    <h2>
                                        Best family-friendly travel spots around the world eco-friendly travel how to make your trips sustainable
                                    </h2>
                                    <ul class="list-items">
                                        <li class="list">
                                            Tours & travel
                                        </li>
                                        <li class="list">
                                            By Admin
                                        </li>
                                        <li class="list">
                                            20 August 2025
                                        </li>
                                        <li class="list">
                                            Comments (5)
                                        </li>
                                    </ul>
                                    <div class="news-details-content">
                                            <p>
                                                Make every moment of your journey unforgettable with our exciting range of tour activities. from breathtaking city sightseeing and cultural heritage tours to adrenaline-pumping adventures like hiking, snorkeling, and desert safaris, we have something for every traveler.
                                            </p>
                                            <div class="details-thumb">
                                                <img src="{{ asset('assets/img/inner-page/news-details/details-1.html') }}" alt="img">
                                            </div>
                                            <h3>Eco-Friendly Travel How to Make Your Trips Sustainable</h3>
                                            <p class="mt-2">
                                                Agency plays a pivotal role in crafting memorable experiences for travelers by offering wide range services tailored to individual preferences. Whether it's a family vacation, an adventure trip, or luxury getaway well-established travel agency can handle everything from flight bookings and accommodation to guided tours .
                                            </p>
                                            <p class="mt-4">
                                                We have something for every traveler. indulge in local cuisines, explore hidden gems, and enjoy unique experiences
                                                that go beyond the ordinary. whether you’re seeking relaxation or adventure, our curated activities ensure your trip is packed with memories that last a lifetime.
                                            </p>
                                            <div class="sideber">
                                                <div class="icon">
                                                    <i class="flaticon-quote"></i>
                                                </div>
                                                <div class="content">
                                                    <h5>
                                                        "In the world of tours and travel, every journey is an invitation to explore 
                                                        the unknown, connect with cultures, and create memories that last lifetime
                                                        It's not just about the destination,extraordinary adventures."
                                                    </h5>
                                                    <span>Kevin F. Glasscock</span>
                                                </div>
                                            </div>
                                            <div class="details-thumb">
                                                <img src="{{ asset('assets/img/inner-page/news-details/details-2.jpg') }}" alt="img">
                                            </div>
                                            <h3>Adventure Awaits Thrilling Activities for Bold Travelers</h3>
                                            <p class="mt-2">
                                                Stay connected and never miss a deal! subscribe to our newsletter and get exclusive travel offers, insider tips, and the latest destination trends delivered straight to your inbox. from budget-friendly deals to expert travel advice, we’ll help you plan the perfect trip every time. join our community of travelers today and start exploring smarter!
                                            </p>
                                            <div class="row tag-share-wrap">
                                                <div class="col-xl-8 col-lg-7">
                                                    <div class="tagcloud"> 
                                                        <span>Tags:</span>                                  
                                                        <a href="{{ route('blog.index') }}">Travel</a>
                                                        <a href="{{ route('blog.index') }}">Guide</a>
                                                        <a href="{{ route('blog.index') }}">Hiking</a>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-5">
                                                    <div class="social-share">
                                                        <span>Share</span>
                                                        <a href="#"><i class="fab fa-facebook-f"></i></a>  
                                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="client-info-box">
                                                <div class="client-image">
                                                    <img src="{{ asset('assets/img/inner-page/news-details/client-1.html') }}" alt="img">
                                                </div>
                                                <div class="info-content">
                                                    <h5>Richard M. Fudge</h5>
                                                    <span>Author</span>
                                                    <p>
                                                        "I’ve traveled with many agencies, but this one stands out! personalized approach and attention to detail made our honeymoon unforgettable.
                                                    </p>
                                                    <div class="social-icon">
                                                        <a href="#"><i class="fab fa-facebook-f"></i></a>  
                                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                                        <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <h4>Related post</h4>
                                            <div class="related-post-item">
                                                <div class="recent-item">
                                                    <div class="recent-thumb">
                                                        <img src="{{ asset('assets/img/inner-page/news-details/post-1.jpg') }}" alt="img">
                                                    </div>
                                                    <div class="recent-content">
                                                        <span>20 August 2025</span>
                                                        <h5>
                                                            <a href="{{ route('blog.index') }}">
                                                                Best Family-Friendly Travel <br> Spots Around the World
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="recent-item">
                                                <div class="recent-thumb">
                                                    <img src="{{ asset('assets/img/inner-page/news-details/post-2.jpg') }}" alt="img">
                                                </div>
                                                    <div class="recent-content">
                                                        <span>23 August 2025</span>
                                                        <h5>
                                                            <a href="{{ route('blog.index') }}">
                                                                Luxury Travel on a Budget <br> Secrets Revealed
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-area">
                                                <h3>Comments</h3>
                                                <div class="comment-item">
                                                    <div class="comment-image">
                                                        <img src="{{ asset('assets/img/inner-page/news-details/comment.html') }}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h6>Lonnie B. Horwitz</h6>
                                                        <span><i class="far fa-calendar-alt"></i> September 25 ,2025</span>
                                                        <p>
                                                            Tours and travels play a crucial role in enriching lives by offering unique experiences, cultural exchanges, and the joy of exploration.
                                                        </p>
                                                        <a class="read-more" href="#">Reply <i class="far fa-angle-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="comment-item style-2">
                                                    <div class="comment-image">
                                                        <img src="{{ asset('assets/img/inner-page/news-details/comment-2.jpg') }}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h6>Jaime B. Wilson</h6>
                                                        <span><i class="far fa-calendar-alt"></i> September 25 ,2025</span>
                                                        <p>
                                                            Tours and travels play a crucial role in enriching lives by offering unique experiences, cultural exchanges, and the joy of exploration.
                                                        </p>
                                                        <a class="read-more" href="#">Reply <i class="far fa-angle-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="comment-item">
                                                    <div class="comment-image">
                                                        <img src="{{ asset('assets/img/inner-page/news-details/comment-3.jpg') }}" alt="img">
                                                    </div>
                                                    <div class="content">
                                                        <h6>Michael A. Saladin</h6>
                                                        <span><i class="far fa-calendar-alt"></i> September 25 ,2025</span>
                                                        <p>
                                                            Tours and travels play a crucial role in enriching lives by offering unique experiences, cultural exchanges, and the joy of exploration.
                                                        </p>
                                                        <a class="read-more" href="#">Reply <i class="far fa-angle-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-form-wrap">
                                                <h4>Leave a comments</h4>
                                                <p>Your email address will not be published. Required fields are marked *</p>
                                                <form action="#">
                                                    <div class="row g-4">
                                                        <div class="col-lg-6">
                                                            <div class="form-clt">
                                                                <input type="text" name="name" id="name" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-clt">
                                                                <input type="text" name="email" id="email6" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-clt">
                                                                <textarea name="message" id="message" placeholder="Write comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                            Save my name, email, and website in this browser for the next time I comment.
                                                            </label>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <button type="submit" class="theme-btn">
                                                                Send your Comment
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="main-sideber sticky-style">
                                    <div class="single-sideber-widget">
                                        <div class="search-widget">
                                            <form action="#">
                                                <input type="text" placeholder="Search">
                                                <button type="submit"><i class="fa-regular fa-magnifying-glass"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="single-sideber-widget">
                                        <div class="widget-title">
                                            <h4>Categories</h4>
                                        </div>
                                        <ul>
                                            <li><a href="{{ route('blog.index') }}">Beach & Water Activities</a><span>(3)</span></li>
                                            <li><a href="{{ route('blog.index') }}">Wildlife & Safari Tours</a><span>(5)</span></li>
                                            <li><a href="{{ route('blog.index') }}">Trekking & Hiking</a><span>(8)</span></li>
                                            <li><a href="{{ route('blog.index') }}">Cruise & Boat Tours</a><span>(2)</span></li>
                                            <li><a href="{{ route('blog.index') }}">Shopping & Market Tours</a><span>(4)</span></li>
                                            <li><a href="{{ route('blog.index') }}">Nightlife & Entertainment</a><span>(6)</span></li>
                                        </ul>
                                    </div>
                                    <div class="single-sideber-widget">
                                        <div class="widget-title">
                                            <h4>Recent Post</h4>
                                        </div>
                                        <div class="recent-post-area">
                                            <div class="recent-items">
                                                <div class="recent-thumb">
                                                    <img src="{{ asset('assets/img/home-1/news/pp-1.jpg') }}" alt="img">
                                                </div>
                                                <div class="recent-content">
                                                    <span>20 August 2025</span>
                                                    <h5>
                                                        <a href="{{ route('blog.index') }}">
                                                            Best Family-Friendly Travel Spots Around the World
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="recent-items">
                                                <div class="recent-thumb">
                                                    <img src="{{ asset('assets/img/home-1/news/p-2.html') }}" alt="img">
                                                </div>
                                                <div class="recent-content">
                                                    <span>23 August 2025</span>
                                                    <h5>
                                                        <a href="{{ route('blog.index') }}">
                                                            Luxury Travel on a Budget Secrets Revealed
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="recent-items">
                                                <div class="recent-thumb">
                                                    <img src="{{ asset('assets/img/home-1/news/pp-3.jpg') }}" alt="img">
                                                </div>
                                                <div class="recent-content">
                                                    <span>24 August 2025</span>
                                                    <h5>
                                                        <a href="{{ route('blog.index') }}">
                                                        Ultimate Beach Destinations for Your Next Holiday
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-sideber-widget">
                                        <div class="widget-title">
                                            <h4>Recent Post</h4>
                                        </div>
                                        <div class="tagcloud">
                                            <a href="{{ route('blog.index') }}">Travel</a>     
                                            <a href="{{ route('blog.index') }}">Guide</a>
                                            <a href="{{ route('blog.index') }}">Hiking</a>
                                            <a href="{{ route('blog.index') }}">Boat</a>
                                            <a href="{{ route('blog.index') }}">Wildlife</a>
                                            <a href="{{ route('blog.index') }}">Beach</a>
                                            <a href="{{ route('blog.index') }}">Activities</a>     
                                            <a href="{{ route('blog.index') }}">City</a>
                                            <a href="{{ route('blog.index') }}">Road</a>
                                        </div>
                                    </div>
                                    <div class="tour-bg-image">
                                        <img src="{{ asset('assets/img/home-1/news/news-19.jpg') }}" alt="img">
                                        <div class="tour-bg-content">
                                            <span>xplore The World</span>
                                            <h3>
                                                <a href="{{ route('tours.index') }}">Best Tourist Place</a>
                                            </h3>
                                            <a href="{{ route('tours.index') }}" class="theme-btn">Explore Tours</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="page-nav-wrap">
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
