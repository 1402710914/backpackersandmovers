@extends('layouts.roavio', ['title' => 'Tour Details'])

@section('content')
<!-- Hero Section Start -->
                <div class="breadcrumb-wrapper fix">
                    <div class="container">
                        <div class="page-heading style-2">
                            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                            <li>
                                <a href="{{ route('home') }}">
                                    Home
                                </a>
                            </li>
                            <li class="style-2 style-3">
                            Tour Details
                            </li>
                        </ul>
                        <div class="breadcrumb-sub-title">
                                <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                    Relinking Beach in Nusa panada <br>
                                    island, Bali, Indonesia
                                </h1>
                            </div>
                            <ul class="list">
                                <li>
                                    <i class="fa-regular fa-location-dot"></i>
                                    Bali, Indonesia
                                </li>
                                <li>
                                    <i class="fa-regular fa-clock"></i>
                                    1 - 3 days
                                </li>
                                <li>
                                    <i class="fa-regular fa-users"></i>
                                    3 persons
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- tour-details Section Start -->
                <section class="tour-details-section section-padding pt-0 fix">
                        <div class="container">
                            <div class="tour-details-wrappers">
                                <div class="row g-2">
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="details-image">
                                            <img src="{{ asset('assets/img/inner-page/tour-details/details-1.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6">
                                        <div class="details-image">
                                            <img src="{{ asset('assets/img/inner-page/tour-details/details-2.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="details-image">
                                            <img src="{{ asset('assets/img/inner-page/tour-details/details-3.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-4 col-md-6">
                                        <div class="details-image">
                                            <img src="{{ asset('assets/img/inner-page/tour-details/details-4.html') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="details-image">
                                            <img src="{{ asset('assets/img/inner-page/tour-details/details-5.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6">
                                        <div class="details-image">
                                            <img src="{{ asset('assets/img/inner-page/tour-details/details-6.jpg') }}" alt="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="tour-details-content">
                                    <div class="row g-4">
                                        <div class="col-lg-8 col-12">
                                            <div class="tour-left-content">
                                                <h3>Tours Overview</h3>
                                                <p class="mt-3 mb-3">
                                                    Bali, often called “The Island of Gods”, is one of the world’s most captivating travel destinations. Located in Indonesia, this tropical paradise is famous for its pristine beaches, lush rice terraces, vibrant nightlife, and deeply spiritual culture. Whether you’re seeking adventure, relaxation, or cultural immersion, Bali offers an experience like no other.
                                                </p>
                                                <p class="mb-5">
                                                    Visitors can unwind on stunning beaches like Kuta, Seminyak, and Nusa Dua, or escape to bud for peaceful retreat surrounded by rice fields, art galleries, and yoga centers. Adventure seekers can explore volcano hikes at Mount Batur, diving in crystal-clear waters, or surfing world-class waves. Bali is also rich in tradition, with thousands of temples, colorful ceremonies, and warm hospitality from locals.
                                                </p>
                                                <div class="row g-4 mb-5">
                                                    <div class="col-lg-6">
                                                        <div class="list-item">
                                                            <h3>Included and Excluded</h3>
                                                            <ul class="list">
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Pick and Drop Services
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    1 Meal Per Day
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Cruise Dinner & Music Event
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                    Visit 7 Best Places in the City
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                Bottled Water on Buses
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-check"></i>
                                                                Transportation Luxury Tour Bus
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="list-item">
                                                            <h3>Excluded</h3>
                                                            <ul class="list">
                                                                <li>
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                    Gratuities
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                    Hotel pickup and drop-off
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                    Lunch, Food & Drinks
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                    Optional upgrade to a glass
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                Additional Services
                                                                </li>
                                                                <li>
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                Insurance
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>Top Highlights</h3>
                                                <p class="mt-3">
                                                    Bali is more than just a tropical destination—it’s a paradise filled with unforgettable experiences. from its sacred temples perched on dramatic cliffs to golden beaches that stretch for miles, every corner of the island offers something unique.
                                                </p>
                                                <ul class="list-2">
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Explore iconic sites like Tanah Lot, Uluwatu, and Besakih Temple.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Relax on Kuta, Seminyak, Nusa Dua, and Jimbaran Bay.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Discover rice terraces, art markets, yoga retreats, and monkey forests.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Hike an active volcano for breathtaking sunrise views.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                        Experience beach clubs, rooftop bars, and live music in Seminyak and Canggu.
                                                    </li>
                                                    <li>
                                                        <i class="fa-solid fa-check"></i>
                                                    Visit Tegenungan, Gitgit, and Sekumpul waterfalls for adventure and serenity.
                                                    </li>
                                                </ul>
                                                <h3>Itinerary</h3>
                                                <div class="accordion-two" id="faq-accordion-two">
                                                    <div class="accordion-item">
                                                        <h5 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoOne" aria-expanded="false" aria-controls="collapseTwoOne">
                                                                Day 1 - Arrive at campground
                                                            </button>
                                                        </h5>
                                                        <div id="collapseTwoOne" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                                            <div class="accordion-body">
                                                                <p>
                                                                    The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h5 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoTwo" aria-expanded="false" aria-controls="collapseTwoTwo">
                                                                Day 2 - Wake up early and embark on a day hike
                                                            </button>
                                                        </h5>
                                                        <div id="collapseTwoTwo" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                                            <div class="accordion-body">
                                                                <p>
                                                                    The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h5 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoThree" aria-expanded="false" aria-controls="collapseTwoThree">
                                                                Day 3 - Join a guided ranger-led nature walk
                                                            </button>
                                                        </h5>
                                                        <div id="collapseTwoThree" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                                            <div class="accordion-body">
                                                                <p>
                                                                    The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h5 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoFour" aria-expanded="false" aria-controls="collapseTwoFour">
                                                                Day 4 - Take a break from hiking
                                                            </button>
                                                        </h5>
                                                        <div id="collapseTwoFour" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                                            <div class="accordion-body">
                                                                <p>
                                                                    The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <h5 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoFive" aria-expanded="false" aria-controls="collapseTwoFive">
                                                                Day 5 - Pack a lunch and embark on a longer hike
                                                            </button>
                                                        </h5>
                                                        <div id="collapseTwoFive" class="accordion-collapse collapse" data-bs-parent="#faq-accordion-two">
                                                            <div class="accordion-body">
                                                                <p>
                                                                    The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>Frequently Asked Questions</h3>
                                                <div class="accordion-one mt-25 mb-60" id="faq-accordion">
                                                <div class="accordion-item">
                                                    <h5 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                            01_How do I book a tour or travel package?
                                                        </button>
                                                    </h5>
                                                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                        <div class="accordion-body">
                                                            <p>
                                                                The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h5 class="accordion-header">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                            02_What is included in the travel package?
                                                        </button>
                                                    </h5>
                                                    <div id="collapseTwo" class="accordion-collapse collapse show" data-bs-parent="#faq-accordion">
                                                        <div class="accordion-body">
                                                            <p>The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h5 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            03_What is your cancellation and refund policy?
                                                        </button>
                                                    </h5>
                                                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                        <div class="accordion-body">
                                                            <p>
                                                                The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h5 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                            04_Can I customize my tour or travel package?
                                                        </button>
                                                    </h5>
                                                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                        <div class="accordion-body">
                                                            <p>
                                                                The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h5 class="accordion-header">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                            05_What documents do I need to travel?
                                                        </button>
                                                    </h5>
                                                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#faq-accordion">
                                                        <div class="accordion-body">
                                                            <p>
                                                                The early start ensures you can fully immerse yourself in the tranquility of nature before the world fully awakens. As the morning light filters through the trees, you'll experience the crisp, fresh air and the peaceful sounds of the forest. The trail ahead offers both a physical challenge promise of breathtaking.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h3>Maps</h3>
                                                <div class="map-items">
                                                    <div class="googpemap">
                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                    </div>
                                                </div>
                                                <h3>Clients Reviews</h3>
                                                <div class="courses-reviews-box-items">
                                                    <div class="courses-reviews-box">
                                                        <div class="reviews-box">
                                                            <h2><span class="count">4.8</span></h2>
                                                            <p>856 Reviews</p>
                                                            <div class="star">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="reviews-ratting-right">
                                                            <div class="reviews-ratting-item">
                                                                <span>Services</span>
                                                                <div class="progress">
                                                                    <div class="progress-value style-two"></div>
                                                                </div>
                                                                <div class="star">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="reviews-ratting-item">
                                                                <span>Guides</span>
                                                                <div class="progress">
                                                                    <div class="progress-value style-three"></div>
                                                                </div>
                                                                <div class="star">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="reviews-ratting-item">
                                                            <span>Price</span>
                                                                <div class="progress">
                                                                    <div class="progress-value style-three"></div>
                                                                </div>
                                                                <div class="star">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="reviews-ratting-item">
                                                                <span>Safety</span>
                                                                <div class="progress">
                                                                    <div class="progress-value style-four"></div>
                                                                </div>
                                                                <div class="star">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="reviews-ratting-item">
                                                                <span>Foods</span>
                                                                <div class="progress">
                                                                    <div class="progress-value style-five"></div>
                                                                </div>
                                                                <div class="star">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>Add Reviews</h3>
                                                <div class="contact-box">
                                                    <h4>Leave Feedback</h4>
                                                    <form action="https://html.webtend.net/roavio/contact.php" id="contact-form1" method="POST" class="contact-form-items">
                                                        <div class="row g-4">
                                                            <div class="col-lg-6">
                                                                <div class="form-clt">
                                                                    <span>Name</span>
                                                                    <input type="text" name="name" id="name331" placeholder="Full Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-clt">
                                                                    <span>Phone</span>
                                                                    <input type="text" name="name" id="name22" placeholder="Phone Number">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-clt">
                                                                    <span>Email</span>
                                                                    <input type="text" name="name" id="email11" placeholder="Your email">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-clt">
                                                                    <span>Comments</span>
                                                                    <textarea name="message" id="message1" placeholder="Type your message"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <button type="submit" class="theme-btn">
                                                                Send Your Reviews
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12">
                                            <div class="tour-details-side">
                                                <div class="tour-details-sidebar sticky-style">
                                                <div class="tour-sidebar-items">
                                                    <h3>Tour Booking</h3>
                                                    <ul class="form-list">
                                                        <li>
                                                            From Date:
                                                            <div class="form-clt">
                                                                <div class="date mb-25">
                                                                    <input type="date">
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            Time:
                                                            <div class="form-clt d-flex gap-3">
                                                                <label class="checkbox-single">
                                                                    <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                                                        <span class="checkbox-area d-center">
                                                                            <input type="checkbox">
                                                                            <span class="checkmark d-center"></span>
                                                                        </span>
                                                                        <span class="text-color">
                                                                            12:00
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                                <label class="checkbox-single">
                                                                    <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                                                        <span class="checkbox-area d-center">
                                                                            <input type="checkbox">
                                                                            <span class="checkmark d-center"></span>
                                                                        </span>
                                                                        <span class="text-color">
                                                                            10:00
                                                                        </span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="tickets-list">
                                                        <p>Tickets</p>
                                                        <ul>
                                                            <li>
                                                                18+ Years: <b>$168</b>
                                                                <div class="form-clt">
                                                                    <div class="form">
                                                                        <select class="single-select w-100">
                                                                            <option> 01</option>
                                                                            <option> 02</option>
                                                                            <option> 03</option>
                                                                            <option> 04</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                18- Years: <b>$100</b>
                                                                <div class="form-clt">
                                                                    <div class="form">
                                                                        <select class="single-select w-100">
                                                                            <option> 01</option>
                                                                            <option> 02</option>
                                                                            <option> 03</option>
                                                                            <option> 04</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="extra-items">
                                                        <p>Add Extra:</p>
                                                        <label class="checkbox-single d-flex justify-content-between align-items-center">
                                                            <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                                                <span class="checkbox-area d-center">
                                                                    <input type="checkbox">
                                                                    <span class="checkmark d-center"></span>
                                                                </span>
                                                                <span class="text-color">
                                                                    Add service per booking
                                                                </span>
                                                            </span>
                                                            <span class="text-color">$45</span>
                                                        </label>
                                                        <label class="checkbox-single d-flex justify-content-between align-items-center">
                                                            <span class="d-flex gap-xl-3 gap-2 align-items-center">
                                                                <span class="checkbox-area d-center">
                                                                    <input type="checkbox">
                                                                    <span class="checkmark d-center"></span>
                                                                </span>
                                                                <span class="text-color">
                                                                    Add service per personal
                                                                </span>
                                                            </span>
                                                            <span class="text-color">$35</span>
                                                        </label>
                                                    </div>
                                                    <ul class="total-list">
                                                        <li>
                                                            Total:
                                                        </li>
                                                        <li>
                                                            $80
                                                        </li>
                                                    </ul>
                                                    <button class="theme-btn" type="submit">
                                                        Book Now
                                                    </button>
                                                    <p class="text">Need some help?</p>
                                                </div>
                                                <div class="widget-contact">
                                                    <h3>Need Help?</h3>
                                                    <ul class="list-style-one">
                                                        <li><i class="far fa-envelope"></i> <a href="emilto:helpxample@gmail.com"><span class="__cf_email__" data-cfemail="deb6bbb2aea6bfb3aeb2bb9eb9b3bfb7b2f0bdb1b3">[email&#160;protected]</span></a></li>
                                                        <li><i class="far fa-phone-volume"></i> <a href="callto:+000(123)45688">+000 (123) 456 88</a></li>
                                                    </ul>
                                                </div>
                                                <div class="tour-sidebar-bg-image-items">
                                                <img src="{{ asset('assets/img/inner-page/tour-sidebar/sidebar-image.jpg') }}" alt="img">
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
                                </div>
                            </div>
                        </div>
                        </div>
                </section>

               <!-- Tour Grid Section Start -->
                <section class="tour-grid-section section-padding pt-0 fix">
                    <div class="container">
                        <div class="section-title text-center">
                            <h2 class="text-anim">Related Trips You Might Also Like</h2>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-8.jpg') }}" alt="img">
                                        <span>10% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Relinking Beach in Nusa panada island, Bali, Indonesia
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Bali, Indonesia
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-9.jpg') }}" alt="img">
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Scenic Kayaking Setup Along <br> Duero River, Soria
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Soria, Castilla
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                <div class="tour-place-item">
                                    <div class="tour-place-image">
                                        <img src="{{ asset('assets/img/home-1/tour/tour-10.jpg') }}" alt="img">
                                        <span>13% Off</span>
                                        <div class="icon">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                    </div>
                                    <div class="tour-place-content">
                                        <div class="rating-item">
                                            <div class="star">
                                                <span>Rating</span>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star-half-stroke"></i>
                                            </div>
                                            <h5><span>Tours Price</span>$49.00</h5>
                                        </div>
                                        <h3>
                                            <a href="{{ route('tours.index') }}">
                                                Camel safaris along desert dunes near roads and small villages
                                            </a>
                                        </h3>
                                        <ul class="tour-list">
                                            <li>
                                                <i class="fa-regular fa-location-dot"></i>
                                                Giza, Egypt
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-clock"></i>
                                            1 - 3 days
                                            </li>
                                            <li>
                                                <i class="fa-regular fa-users"></i>
                                            3 persons
                                            </li>
                                        </ul>
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
