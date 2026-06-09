{{-- Things to carry & trek guidelines — student treks --}}
<section class="trek-prep-section section-padding fix header-bg">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="text-white text-anim">Prepare for your trek</h2>
            <p class="text-white wow fadeInUp" data-wow-delay=".5s">What to pack and how to stay safe on every Backpackers and Movers trek</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="trek-prep-panel trek-prep-panel--carry h-100">
                    <div class="trek-prep-panel__head">
                        <span class="trek-prep-panel__icon" aria-hidden="true"><i class="fa-solid fa-backpack"></i></span>
                        <h3>Things to carry</h3>
                    </div>
                    <ul class="trek-prep-list">
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Trekking shoes for comfort and better grip</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Torch with an extra battery <strong class="trek-tag trek-tag--required">Compulsory</strong></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>2-litre water bottle <strong class="trek-tag trek-tag--required">Compulsory</strong></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Proper backpack <em>(no side bags or jholas)</em></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Dry fruits and Glucon-D <strong class="trek-tag trek-tag--optional">Optional</strong></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Personal medicine <em>(first aid kit provided by us)</em></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Warm clothes, bedsheet, and blanket</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Extra pair of clothes &amp; napkins <strong class="trek-tag trek-tag--optional">Optional</strong></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Valid identity proof</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Full sleeves &amp; full track pants <em>(protection from thorns, insects &amp; prickles)</em></span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Please avoid gold and other costly ornaments</span>
                        </li>
                        <li>
                            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                            <span>Crocs or flip-flops <strong class="trek-tag trek-tag--optional">Optional</strong> <em>(after the trek ends)</em></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="trek-prep-panel trek-prep-panel--guide h-100">
                    <div class="trek-prep-panel__head">
                        <span class="trek-prep-panel__icon" aria-hidden="true"><i class="fa-solid fa-person-hiking"></i></span>
                        <h3>Trek guidelines</h3>
                        <p class="trek-prep-panel__sub mb-0">For a safe and smooth experience</p>
                    </div>
                    <ul class="trek-prep-list trek-prep-list--numbered">
                        <li>Stay with your assigned group — do not trek alone.</li>
                        <li>Follow trek leader instructions at all times.</li>
                        <li>Trails may be slippery or uneven — walk carefully.</li>
                        <li>We take short breaks at marked checkpoints.</li>
                        <li>Arrive at your pickup point on time ({{ tour_pickup_locations_label() }} only).</li>
                        <li>Alcohol, smoking, and substance use are not allowed.</li>
                        <li>Respect local villagers and the environment.</li>
                        <li>Limited toilet access at base villages — plan accordingly.</li>
                        <li>Carry your own snacks for long gaps between meals.</li>
                        <li>Stay hydrated — carry enough water throughout the trek.</li>
                    </ul>
                </div>
                </div>
        </div>
        <p class="text-center mt-4 mb-0 wow fadeInUp" data-wow-delay=".5s">
            <a href="{{ route('contact') }}" class="theme-btn">Questions before your trek? Contact us</a>
        </p>
    </div>
</section>

@push('styles')
<style>
.trek-prep-section .trek-prep-panel {
    background: #fff;
    border-radius: 14px;
    padding: 1.5rem 1.5rem 1.35rem;
    border: 1px solid #ebebeb;
    box-shadow: 0 8px 28px rgba(0, 0, 0, 0.05);
}
.trek-prep-section .trek-prep-panel__head {
    margin-bottom: 1.15rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #eee;
}
.trek-prep-section .trek-prep-panel__head h3 {
    margin: 0.5rem 0 0;
    font-size: 1.35rem;
    font-weight: 700;
}
.trek-prep-section .trek-prep-panel__sub {
    font-size: 0.9rem;
    color: #666;
    margin-top: 0.25rem;
}
.trek-prep-section .trek-prep-panel__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 2.75rem;
    height: 2.75rem;
    border-radius: 10px;
    background: var(--theme, #DA9B21);
    color: #fff;
    font-size: 1.15rem;
}
.trek-prep-section .trek-prep-panel--guide .trek-prep-panel__icon {
    background: #2d5a3d;
}
.trek-prep-section .trek-prep-list {
    list-style: none;
    margin: 0;
    padding: 0;
}
.trek-prep-section .trek-prep-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.65rem;
    margin-bottom: 0.65rem;
    font-size: 0.9375rem;
    line-height: 1.5;
    color: #444;
}
.trek-prep-section .trek-prep-list li:last-child {
    margin-bottom: 0;
}
.trek-prep-section .trek-prep-list li i.fa-circle-check {
    color: var(--theme, #DA9B21);
    margin-top: 0.2rem;
    flex-shrink: 0;
}
.trek-prep-section .trek-prep-list--numbered {
    counter-reset: trek-guide;
}
.trek-prep-section .trek-prep-list--numbered li {
    counter-increment: trek-guide;
    padding-left: 0.15rem;
}
.trek-prep-section .trek-prep-list--numbered li::before {
    content: counter(trek-guide);
    flex-shrink: 0;
    width: 1.65rem;
    height: 1.65rem;
    border-radius: 50%;
    background: #eef5f0;
    color: #2d5a3d;
    font-size: 0.8rem;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-top: 0.05rem;
}
.trek-prep-section .trek-tag {
    display: inline-block;
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    padding: 0.12rem 0.45rem;
    border-radius: 4px;
    margin-left: 0.25rem;
    vertical-align: middle;
}
.trek-prep-section .trek-tag--required {
    background: #fde8e8;
    color: #b42318;
}
.trek-prep-section .trek-tag--optional {
    background: #eef4ff;
    color: #175cd3;
}
@media (max-width: 991.98px) {
    .trek-prep-section .trek-prep-panel {
        margin-bottom: 0;
    }
}
</style>
@endpush
