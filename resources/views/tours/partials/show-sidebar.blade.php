@php
    $whatsappMessage = rawurlencode('Hi, I would like to enquire about: '.$tour->title.' — '.route('tours.show', $tour->slug));
    $tourTypeLabel = $tour->isStudentGroupTour() ? 'School & college program' : 'Group tour';
    $enquirySubject = 'Enquiry: '.$tour->title;
@endphp

<aside class="tour-sidebar position-sticky">
    <div class="tour-sidebar__card">
        <div class="tour-sidebar__head">
            @if ($tour->is_featured)
                <span class="tour-sidebar__badge">Featured program</span>
            @endif
            <p class="tour-sidebar__label">Starting from</p>
            <p class="tour-sidebar__price">{{ $tour->formattedPrice() }}</p>
            <p class="tour-sidebar__note">{{ $tour->priceNote() }}</p>
            @if ($tour->category)
                <a href="{{ route('tours.category', $tour->category->slug) }}" class="tour-sidebar__category-link">
                    <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
                    {{ $tour->category->name }}
                </a>
            @endif
        </div>

        <div class="tour-sidebar__facts">
            <div class="tour-sidebar__fact">
                <span class="tour-sidebar__fact-icon"><i class="fa-regular fa-clock" aria-hidden="true"></i></span>
                <span class="tour-sidebar__fact-text">
                    <strong>{{ (int) $tour->duration_days }} day{{ (int) $tour->duration_days === 1 ? '' : 's' }}</strong>
                    <small>Duration</small>
                </span>
            </div>
            <div class="tour-sidebar__fact">
                <span class="tour-sidebar__fact-icon"><i class="fa-regular fa-location-dot" aria-hidden="true"></i></span>
                <span class="tour-sidebar__fact-text">
                    <strong>{{ $tour->destination?->name ?? tour_pickup_locations_label() }}</strong>
                    <small>Pickup region</small>
                </span>
            </div>
            <div class="tour-sidebar__fact tour-sidebar__fact--wide">
                <span class="tour-sidebar__fact-icon"><i class="fa-solid fa-bus" aria-hidden="true"></i></span>
                <span class="tour-sidebar__fact-text">
                    <strong>{{ $tour->pickupLocationsLabel() }}</strong>
                    <small>Pickup cities only</small>
                </span>
            </div>
            @if ($tour->group_size)
                <div class="tour-sidebar__fact">
                    <span class="tour-sidebar__fact-icon"><i class="fa-regular fa-users" aria-hidden="true"></i></span>
                    <span class="tour-sidebar__fact-text">
                        <strong>Up to {{ $tour->group_size }} members</strong>
                        <small>Group size</small>
                    </span>
                </div>
            @endif
        </div>

        <div class="tour-sidebar__trust">
            <div class="tour-sidebar__trust-item">
                <strong>300+</strong>
                <span>Programs done</span>
            </div>
            <div class="tour-sidebar__trust-item">
                <strong>100%</strong>
                <span>Supervised trips</span>
            </div>
            <div class="tour-sidebar__trust-item">
                <strong>2</strong>
                <span>Pickup cities</span>
            </div>
        </div>

        <div class="tour-sidebar__section">
            <h5 class="tour-sidebar__section-title">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                Good to know
            </h5>
            <ul class="tour-sidebar__checklist">
                <li>{{ $tourTypeLabel }} for student groups</li>
                <li>Experienced leaders on every outing</li>
                <li>Pickup &amp; drop from {{ $tour->pickupLocationsLabel() }} only</li>
                <li>Flexible dates — enquire for your school batch</li>
                @if ($tour->hasItinerarySection())
                    <li>Full day-wise itinerary on this page</li>
                @endif
                @if ($tour->hasFaqSection())
                    <li>Common questions answered below</li>
                @endif
            </ul>
        </div>

        <div id="tour-enquiry" class="tour-sidebar__section tour-sidebar__section--enquiry">
            <h5 class="tour-sidebar__section-title">
                <i class="fa-regular fa-envelope" aria-hidden="true"></i>
                Send an enquiry
            </h5>
            <p class="tour-sidebar__section-intro">Ask about dates, group size, or custom plans. We reply by email or phone.</p>

            <form action="{{ route('contact.submit') }}" method="post" class="tour-sidebar__form">
                @csrf
                <input type="hidden" name="subject" value="{{ $enquirySubject }}">
                <div class="mb-3">
                    <label class="form-label" for="enquiry_name">Your name</label>
                    <input type="text" id="enquiry_name" name="name" class="form-control" value="{{ old('subject') === $enquirySubject ? old('name') : (auth()->user()->name ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="enquiry_email">Email</label>
                    <input type="email" id="enquiry_email" name="email" class="form-control" value="{{ old('subject') === $enquirySubject ? old('email') : (auth()->user()->email ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="enquiry_phone">Phone</label>
                    <input type="text" id="enquiry_phone" name="phone" class="form-control" value="{{ old('subject') === $enquirySubject ? old('phone') : '' }}" placeholder="Optional">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="enquiry_message">Your question</label>
                    <textarea id="enquiry_message" name="message" class="form-control" rows="3" placeholder="School name, preferred dates, group size…" required>{{ old('subject') === $enquirySubject ? old('message') : '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-outline-secondary w-100 mb-0">
                    <i class="fa-regular fa-paper-plane" aria-hidden="true"></i>
                    Send enquiry
                </button>
            </form>
        </div>

        <div id="tour-booking" class="tour-sidebar__section tour-sidebar__section--booking">
            <h5 class="tour-sidebar__section-title">
                <i class="fa-regular fa-calendar-check" aria-hidden="true"></i>
                Book this tour
            </h5>
            <p class="tour-sidebar__section-intro">Choose your date and group size, add to cart, then checkout to confirm your booking.</p>

            <form action="{{ route('cart.store') }}" method="post" class="tour-sidebar__form">
                @csrf
                <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                <div class="mb-3">
                    <label class="form-label" for="cart_travel_date">Preferred travel date</label>
                    <input type="date" id="cart_travel_date" name="travel_date" class="form-control" value="{{ old('travel_date') }}" min="{{ now()->toDateString() }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="cart_travelers">Number of members</label>
                    <input type="number" id="cart_travelers" name="travelers" class="form-control" min="1" max="50" value="{{ old('travelers', 1) }}" required>
                </div>
                <button type="submit" class="theme-btn w-100 border-0 mb-0">
                    <i class="fa-solid fa-cart-plus" aria-hidden="true"></i>
                    Add to cart &amp; continue
                </button>
            </form>
        </div>

        <div class="tour-sidebar__actions">
            <a href="https://wa.me/918788883003?text={{ $whatsappMessage }}" class="tour-sidebar__btn tour-sidebar__btn--whatsapp" target="_blank" rel="noopener noreferrer">
                <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                Chat on WhatsApp
            </a>
        </div>

        @if ($hasNav)
            <div class="tour-sidebar__section tour-sidebar__section--nav">
                <h5 class="tour-sidebar__section-title">On this page</h5>
                <div class="tour-sidebar__nav">
                    @if ($tour->hasGallerySection())
                        <a href="#tour-gallery">Gallery</a>
                    @endif
                    @if ($tour->hasDescriptionSection())
                        <a href="#tour-description">Description</a>
                    @endif
                    @if ($tour->hasAboutSection())
                        <a href="#tour-about">About</a>
                    @endif
                    @if ($tour->hasItinerarySection())
                        <a href="#tour-itinerary">Itinerary</a>
                    @endif
                    @if ($tour->hasAttractionsSection())
                        <a href="#tour-attractions">Attractions</a>
                    @endif
                    @if ($tour->hasOffersSection())
                        <a href="#tour-offers">Pricing</a>
                    @endif
                    @if ($tour->hasFaqSection())
                        <a href="#tour-faq">FAQ</a>
                    @endif
                    <a href="#tour-enquiry">Enquiry</a>
                    <a href="#tour-booking">Booking</a>
                </div>
            </div>
        @endif

        @if ($tour->category)
            <div class="tour-sidebar__footer-link">
                <a href="{{ route('tours.category', $tour->category->slug) }}">
                    View more {{ $tour->category->name }} tours
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        @endif
    </div>
</aside>
