@extends('layouts.roavio', ['title' => 'Contact'])

@section('content')
<div class="breadcrumb-wrapper-3 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Contact us</h1>
            </div>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="style-2 style-3">Contact</li>
            </ul>
        </div>
    </div>
</div>

<section class="conatct-us-section-3 section-padding fix">
    <div class="container">
        <div class="contact-us-wrapper-3">
            <div class="row g-4 align-items-start">
                <div class="col-xl-5 col-lg-6">
                    <div class="contact-us-content">
                        <div class="section-title mb-0">
                            <h2 class="text-anim">Plan a student trip with Backpackers and Movers</h2>
                        </div>
                        <p class="text mt-3 mb-4">
                            Reach us by phone, WhatsApp, or email to discuss one-day outings, field visits, treks, or weekend camps for your school or college. We will get back to you as soon as possible.
                        </p>
                        @include('tours.partials.pickup-notice', ['class' => 'mb-4'])
                        <div class="contact-us-item">
                            <div class="content">
                                <h5><i class="fa-solid fa-envelope" aria-hidden="true"></i> Email</h5>
                                <h6><a href="mailto:backpackersandmovers@gmail.com">backpackersandmovers@gmail.com</a></h6>
                            </div>
                            <div class="content">
                                <h5><i class="fa-brands fa-whatsapp" aria-hidden="true"></i> WhatsApp</h5>
                                <h6><a href="https://wa.me/918788883003" target="_blank" rel="noopener noreferrer">8788883003</a></h6>
                            </div>
                        </div>
                        <div class="contact-us-item mb-0">
                            <div class="content">
                                <h5><i class="fa-solid fa-phone" aria-hidden="true"></i> Contact</h5>
                                <h6 class="mb-1">James Jules — <a href="tel:+918788883003">8788883003</a></h6>
                                <h6 class="mb-1">Shivam Naik — <a href="tel:+918149570210">8149570210</a></h6>
                                <h6 class="mb-0">Shubham Naik — <a href="tel:+918149593316">8149593316</a></h6>
                            </div>
                            <div class="content">
                                <h5><i class="fa-solid fa-location-dot" aria-hidden="true"></i> Office address</h5>
                                <h6>Sherine Heights, Lane No. 4,<br>Madhuban Society, Old Sangvi,<br>Pune</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="contact-box shadow-sm rounded-3 overflow-hidden border border-light" style="background: #fff;">
                        <div class="p-4 p-lg-5">
                            <h3 class="h5 mb-4">Send a message</h3>
                            <form action="{{ route('contact.submit') }}" id="contact-page-form" method="post" class="contact-form-items mb-0" novalidate>
                                @csrf
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Full name</span>
                                            <input type="text" name="name" id="contact-name" placeholder="Your name" value="{{ old('name') }}" required autocomplete="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Phone</span>
                                            <input type="text" name="phone" id="contact-phone" placeholder="Optional" value="{{ old('phone') }}" autocomplete="tel">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Email</span>
                                            <input type="email" name="email" id="contact-email" placeholder="you@example.com" value="{{ old('email') }}" required autocomplete="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-clt">
                                            <span>Subject</span>
                                            <input type="text" name="subject" id="contact-subject" placeholder="Optional" value="{{ old('subject') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-clt">
                                            <span>Message</span>
                                            <textarea name="message" id="contact-message" placeholder="How can we help?" required rows="5">{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="theme-btn" id="contact-submit-btn">Send message</button>
                                        <div id="contact-form-alert" class="mt-3 d-none" role="status" aria-live="polite"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="map-section section-padding fix pt-0">
    <div class="container">
        <div class="map-items">
            <div class="googpemap rounded-3 overflow-hidden">
                <iframe title="Backpackers and Movers office location" src="https://maps.google.com/maps?q=Madhuban+Society+Old+Sangvi+Pune&t=&z=15&ie=UTF8&iwloc=&output=embed" style="border:0;height:380px;width:100%;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        var form = document.getElementById('contact-page-form');
        if (!form) return;
        var btn = document.getElementById('contact-submit-btn');
        var alertBox = document.getElementById('contact-form-alert');
        var token = document.querySelector('meta[name="csrf-token"]');
        if (!token) return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();
            alertBox.classList.remove('d-none', 'alert-success', 'alert-danger', 'alert-warning', 'py-2', 'mb-0', 'small', 'text-muted');
            alertBox.classList.add('small', 'text-muted');
            alertBox.textContent = 'Sending…';
            btn.disabled = true;

            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': token.getAttribute('content'),
                },
                body: new FormData(form),
            })
                .then(function (res) {
                    return res.json().then(function (data) {
                        return { res: res, data: data };
                    });
                })
                .then(function (o) {
                    btn.disabled = false;
                    alertBox.classList.remove('small', 'text-muted');

                    if (o.res.ok && o.data.success) {
                        alertBox.classList.add('alert', 'alert-success', 'py-2', 'mb-0');
                        alertBox.textContent = o.data.message;
                        form.reset();
                        return;
                    }

                    if (o.data.errors) {
                        var parts = [];
                        Object.keys(o.data.errors).forEach(function (k) {
                            (o.data.errors[k] || []).forEach(function (line) {
                                parts.push(line);
                            });
                        });
                        alertBox.classList.add('alert', 'alert-danger', 'py-2', 'mb-0');
                        alertBox.textContent = parts.length ? parts.join(' ') : (o.data.message || 'Please check the form.');
                        return;
                    }

                    alertBox.classList.add('alert', 'alert-danger', 'py-2', 'mb-0');
                    alertBox.textContent = o.data.message || 'Something went wrong. Please try again.';
                })
                .catch(function () {
                    btn.disabled = false;
                    alertBox.classList.remove('small', 'text-muted');
                    alertBox.classList.add('alert', 'alert-danger', 'py-2', 'mb-0');
                    alertBox.textContent = 'Network error. Please try again.';
                });
        });
    })();
</script>
@endpush
