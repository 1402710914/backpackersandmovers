@extends('layouts.roavio', ['title' => 'FAQ'])

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
                <div class="breadcrumb-wrapper-3 fix bg-cover" style="background-image: url('{{ asset('assets/img/inner-page/breadcrumb/bg-2.jpg') }}');">
                    <div class="container">
                        <div class="page-heading">
                            <div class="breadcrumb-sub-title">
                                <h1 class="wow fadeInUp" data-wow-delay=".3s">
                                    FAQs
                                </h1>
                            </div>
                            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                                <li>
                                    <a href="{{ route('home') }}">
                                    Home
                                    </a>
                                </li>
                                <li class="style-2 style-3">
                                    FAQs
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Conatct-Us Section Start -->
                <section class="faq-section section-padding fix">
                    <div class="container">
                        <div class="faq-wrapper">
                            <div class="row g-4">
                                <div class="col-lg-8 col-12">
                                    <div class="faq-left-content">
                                        <div class="section-title mb-0">
                                            <h2 class="text-anim">
                                                Frequently Asked Questions?
                                            </h2>
                                        </div>
                                        <p class="text">
                                            We’ve gathered the information you need in one place you can save time and make
                                            confident decisions. And if you don’t see your question answered.
                                        </p>
                                        @include('tours.partials.pickup-notice', ['class' => 'mb-4'])
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item style-2 wow fadeInUp" data-wow-delay=".2s">
                                                <a href="#technical" data-bs-toggle="tab" class="nav-link active" aria-selected="false" role="tab" tabindex="-1">
                                                General
                                                </a>
                                            </li>
                                            <li class="nav-item wow fadeInUp" data-wow-delay=".4s">
                                                <a href="#work" data-bs-toggle="tab" class="nav-link" aria-selected="true" role="tab">
                                                Pricing Plan
                                                </a>
                                            </li>
                                            <li class="nav-item wow fadeInUp" data-wow-delay=".6s">
                                                <a href="#ambition" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                                Tour Package
                                                </a>
                                            </li>
                                            <li class="nav-item wow fadeInUp" data-wow-delay=".8s">
                                                <a href="#skill" data-bs-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">
                                                Privacy Policy
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="technical" class="tab-pane fade active show" role="tabpanel">
                                                <div class="faq-box-item">
                                                    <div class="faq-items-4">
                                                        <div class="accordion" id="technicalAccordion">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseOne" aria-expanded="false" aria-controls="technicalCollapseOne">
                                                                    1. How do I book a trip with your agency?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseOne" class="accordion-collapse collapse" aria-labelledby="technicalHeadingOne"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingTwo">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseTwo" aria-expanded="true" aria-controls="technicalCollapseTwo">
                                                                    2. Do you offer customized travel packages?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseTwo" class="accordion-collapse collapse show"
                                                                    aria-labelledby="technicalHeadingTwo" data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingThree">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseThree" aria-expanded="false"
                                                                        aria-controls="technicalCollapseThree">
                                                                    3. What payment methods do you accept?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseThree" class="accordion-collapse collapse"
                                                                    aria-labelledby="technicalHeadingThree" data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingFour">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseFour" aria-expanded="false"
                                                                        aria-controls="technicalCollapseFour">
                                                                    4. Can you assist with visas and travel documents?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseFour" class="accordion-collapse collapse" aria-labelledby="technicalHeadingFour"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingFive">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseFive" aria-expanded="false"
                                                                        aria-controls="technicalCollapseFive">
                                                                    5. What happens if I need to cancel or reschedule my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseFive" class="accordion-collapse collapse" aria-labelledby="technicalHeadingFive"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingSix">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseSix" aria-expanded="false"
                                                                        aria-controls="technicalCollapseSix">
                                                                    6. Do you provide travel insurance?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseSix" class="accordion-collapse collapse" aria-labelledby="technicalHeadingSix"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingSeven">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseSeven" aria-expanded="false"
                                                                        aria-controls="technicalCollapseSeven">
                                                                    7. Are your tours suitable for families and groups?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseSeven" class="accordion-collapse collapse" aria-labelledby="technicalHeadingSeven"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingEight">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseEight" aria-expanded="false"
                                                                        aria-controls="technicalCollapseEight">
                                                                    8. How can I contact you during my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseEight" class="accordion-collapse collapse" aria-labelledby="technicalHeadingEight"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingNine">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseNine" aria-expanded="false"
                                                                        aria-controls="technicalCollapseNine">
                                                                    9. How can I book a tour with you?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseNine" class="accordion-collapse collapse" aria-labelledby="technicalHeadingNine"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="technicalHeadingTen">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#technicalCollapseTen" aria-expanded="false"
                                                                        aria-controls="technicalCollapseTen">
                                                                    10. Can you help with visas and travel insurance?
                                                                    </button>
                                                                </h2>
                                                                <div id="technicalCollapseTen" class="accordion-collapse collapse" aria-labelledby="technicalHeadingTen"
                                                                    data-bs-parent="#technicalAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="work" class="tab-pane fade" role="tabpanel">
                                                <div class="faq-box-item">
                                                    <div class="faq-items-4">
                                                        <div class="accordion" id="workAccordion">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseOne" aria-expanded="false" aria-controls="workCollapseOne">
                                                                    1. How do I book a trip with your agency?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseOne" class="accordion-collapse collapse" aria-labelledby="workHeadingOne"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingTwo">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseTwo" aria-expanded="true" aria-controls="workCollapseTwo">
                                                                    2. Do you offer customized travel packages?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseTwo" class="accordion-collapse collapse show"
                                                                    aria-labelledby="workHeadingTwo" data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingThree">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseThree" aria-expanded="false"
                                                                        aria-controls="workCollapseThree">
                                                                    3. What payment methods do you accept?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseThree" class="accordion-collapse collapse"
                                                                    aria-labelledby="workHeadingThree" data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingFour">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseFour" aria-expanded="false"
                                                                        aria-controls="workCollapseFour">
                                                                    4. Can you assist with visas and travel documents?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseFour" class="accordion-collapse collapse" aria-labelledby="workHeadingFour"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingFive">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseFive" aria-expanded="false"
                                                                        aria-controls="workCollapseFive">
                                                                    5. What happens if I need to cancel or reschedule my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseFive" class="accordion-collapse collapse" aria-labelledby="workHeadingFive"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingSix">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseSix" aria-expanded="false"
                                                                        aria-controls="workCollapseSix">
                                                                    6. Do you provide travel insurance?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseSix" class="accordion-collapse collapse" aria-labelledby="workHeadingSix"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingSeven">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseSeven" aria-expanded="false"
                                                                        aria-controls="workCollapseSeven">
                                                                    7. Are your tours suitable for families and groups?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseSeven" class="accordion-collapse collapse" aria-labelledby="workHeadingSeven"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingEight">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseEight" aria-expanded="false"
                                                                        aria-controls="workCollapseEight">
                                                                    8. How can I contact you during my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseEight" class="accordion-collapse collapse" aria-labelledby="workHeadingEight"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingNine">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseNine" aria-expanded="false"
                                                                        aria-controls="workCollapseNine">
                                                                    9. How can I book a tour with you?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseNine" class="accordion-collapse collapse" aria-labelledby="workHeadingNine"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="workHeadingTen">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#workCollapseTen" aria-expanded="false"
                                                                        aria-controls="workCollapseTen">
                                                                    10. Can you help with visas and travel insurance?
                                                                    </button>
                                                                </h2>
                                                                <div id="workCollapseTen" class="accordion-collapse collapse" aria-labelledby="workHeadingTen"
                                                                    data-bs-parent="#workAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="ambition" class="tab-pane fade" role="tabpanel">
                                                <div class="faq-box-item">
                                                    <div class="faq-items-4">
                                                        <div class="accordion" id="ambitionAccordion">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseOne" aria-expanded="false" aria-controls="ambitionCollapseOne">
                                                                    1. How do I book a trip with your agency?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseOne" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingOne"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingTwo">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseTwo" aria-expanded="true" aria-controls="ambitionCollapseTwo">
                                                                    2. Do you offer customized travel packages?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseTwo" class="accordion-collapse collapse show"
                                                                    aria-labelledby="ambitionHeadingTwo" data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingThree">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseThree" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseThree">
                                                                    3. What payment methods do you accept?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseThree" class="accordion-collapse collapse"
                                                                    aria-labelledby="ambitionHeadingThree" data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingFour">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseFour" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseFour">
                                                                    4. Can you assist with visas and travel documents?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseFour" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingFour"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingFive">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseFive" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseFive">
                                                                    5. What happens if I need to cancel or reschedule my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseFive" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingFive"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingSix">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseSix" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseSix">
                                                                    6. Do you provide travel insurance?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseSix" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingSix"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingSeven">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseSeven" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseSeven">
                                                                    7. Are your tours suitable for families and groups?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseSeven" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingSeven"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingEight">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseEight" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseEight">
                                                                    8. How can I contact you during my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseEight" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingEight"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingNine">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseNine" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseNine">
                                                                    9. How can I book a tour with you?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseNine" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingNine"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="ambitionHeadingTen">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#ambitionCollapseTen" aria-expanded="false"
                                                                        aria-controls="ambitionCollapseTen">
                                                                    10. Can you help with visas and travel insurance?
                                                                    </button>
                                                                </h2>
                                                                <div id="ambitionCollapseTen" class="accordion-collapse collapse" aria-labelledby="ambitionHeadingTen"
                                                                    data-bs-parent="#ambitionAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="skill" class="tab-pane fade" role="tabpanel">
                                                <div class="faq-box-item">
                                                    <div class="faq-items-4">
                                                        <div class="accordion" id="skillAccordion">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingOne">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseOne" aria-expanded="false" aria-controls="skillCollapseOne">
                                                                    1. How do I book a trip with your agency?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseOne" class="accordion-collapse collapse" aria-labelledby="skillHeadingOne"
                                                                    data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingTwo">
                                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseTwo" aria-expanded="true" aria-controls="skillCollapseTwo">
                                                                    2. Do you offer customized travel packages?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseTwo" class="accordion-collapse collapse show"
                                                                    aria-labelledby="skillHeadingTwo" data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingThree">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseThree" aria-expanded="false"
                                                                        aria-controls="skillCollapseThree">
                                                                    3. What payment methods do you accept?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseThree" class="accordion-collapse collapse"
                                                                    aria-labelledby="skillHeadingThree" data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingFour">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseFour" aria-expanded="false"
                                                                        aria-controls="skillCollapseFour">
                                                                    4. Can you assist with visas and travel documents?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseFour" class="accordion-collapse collapse" aria-labelledby="skillHeadingFour"
                                                                    data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingFive">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseFive" aria-expanded="false"
                                                                        aria-controls="skillCollapseFive">
                                                                    5. What happens if I need to cancel or reschedule my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseFive" class="accordion-collapse collapse" aria-labelledby="skillHeadingFive"
                                                                    data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingSix">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseSix" aria-expanded="false"
                                                                        aria-controls="skillCollapseSix">
                                                                    6. Do you provide travel insurance?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseSix" class="accordion-collapse collapse" aria-labelledby="skillHeadingSix"
                                                                    data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingSeven">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseSeven" aria-expanded="false"
                                                                        aria-controls="skillCollapseSeven">
                                                                    7. Are your tours suitable for families and groups?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseSeven" class="accordion-collapse collapse" aria-labelledby="skillHeadingSeven"
                                                                    data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingEight">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseEight" aria-expanded="false"
                                                                        aria-controls="skillCollapseEight">
                                                                    8. How can I contact you during my trip?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseEight" class="accordion-collapse collapse" aria-labelledby="skillHeadingEight"
                                                                    data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="skillHeadingNine">
                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#skillCollapseNine" aria-expanded="false"
                                                                        aria-controls="skillCollapseNine">
                                                                    9. How can I book a tour with you?
                                                                    </button>
                                                                </h2>
                                                                <div id="skillCollapseNine" class="accordion-collapse collapse" aria-labelledby="skillHeadingNine" data-bs-parent="#skillAccordion">
                                                                    <div class="accordion-body">
                                                                        <p>
                                                                            Yes! We specialize in tailor-made tours. You can share your preferences—destinations, activities, and budget—and we’ll design a trip that suits your needs.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                                        <div class="faq-right">
                                                            <div class="faq-bg-image">
                                                                <img src="{{ asset('assets/img/home-1/news/news-19.jpg') }}" alt="img">
                                                                <div class="tour-bg-content">
                                                                    <span>xplore The World</span>
                                                                    <h3>
                                                                        <a href="{{ route('tours.index') }}">Best Tourist Place</a>
                                                                    </h3>
                                                                    <a href="{{ route('tours.index') }}" class="theme-btn">Explore Tours</a>
                                                                </div>
                                                            </div>
                                                            <div class="comment-box">
                                                                <h3>Have Any Questions?</h3>
                                                                <p>Don’t heisted to contact us</p>
                                                                <form action="#">
                                                                    <div class="row g-2">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-clt">
                                                                                <input type="text" name="name" id="name" placeholder="Name">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="form-clt">
                                                                                <input type="text" name="email" id="email6" placeholder="Email">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <div class="form-clt">
                                                                                <textarea name="message" id="message" placeholder="Write message"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12">
                                                                            <button type="submit" class="theme-btn">
                                                                            Submit
                                                                            </button>
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
