@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')

    <!-- banner -->
    <section class="mil-banner mil-dark-bg">
        <div class="mi-invert-fix">
            <div class="mil-animation-frame">
                <div class="mil-animation mil-position-1 mil-scale" data-value-1="7" data-value-2="1.6">
                </div>
                <div class="mil-animation mil-position-2 mil-scale" data-value-1="4" data-value-2="1"></div>
                <div class="mil-animation mil-position-3 mil-scale" data-value-1="1.2" data-value-2=".1">
                </div>
            </div>

            <div class="mil-gradient"></div>

            <div class="container">
                <div class="mil-banner-content mil-up">

                    <h1 class="mil-muted mil-mb-60">Designing <span class="mil-thin">a Better</span><br>
                        World <span class="mil-thin">Today</span></h1>
                    <div class="row">
                        <div class="col-md-7 col-lg-5">

                            <p class="mil-light-soft mil-mb-60">Welcome to our world of endless imagination
                                and boundless creativity. Together, let's embark on a remarkable journey
                                where dreams become tangible realities.</p>

                        </div>
                    </div>

                    <a href="{{ route('services') }}" class="mil-button mil-arrow-place mil-btn-space">
                        <span>What we do</span>
                    </a>

                    <a href="{{ route('portfolio') }}" class="mil-link mil-muted mil-arrow-place">
                        <span>View works</span>
                    </a>

                    <div class="mil-circle-text">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 300 300" enable-background="new 0 0 300 300" xml:space="preserve"
                            class="mil-ct-svg mil-rotate" data-value="360">
                            <defs>
                                <path id="circlePath" d="M 150, 150 m -60, 0 a 60,60 0 0,1 120,0 a 60,60 0 0,1 -120,0 " />
                            </defs>
                            <circle cx="150" cy="100" r="75" fill="none" />
                            <g>
                                <use xlink:href="#circlePath" fill="none" />
                                <text style="letter-spacing: 6.5px">
                                    <!-- circle text -->
                                    <textPath xlink:href="#circlePath">Scroll down - Scroll down -
                                    </textPath>
                                </text>
                            </g>
                        </svg>
                        <a href="#about" class="mil-button mil-arrow-place mil-icon-button mil-arrow-down"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- about -->
    <section id="about">
        <div class="container mil-p-120-30">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5">

                    <div class="mil-mb-90">
                        <h2 class="mil-up mil-mb-60">Discover <br>Our <span class="mil-thin">Studio</span>
                        </h2>
                        <p class="mil-up mil-mb-30">At our design studio, we are a collective of talented
                            individuals ignited by our unwavering passion for transforming ideas into
                            reality. With a harmonious blend of diverse backgrounds and a vast array of
                            skill sets, we join forces to create compelling solutions for our esteemed
                            clients.</p>

                        <p class="mil-up mil-mb-60">Collaboration is at the heart of what we do. Our team
                            thrives on the synergy that arises when unique perspectives converge, fostering
                            an environment of boundless creativity. By harnessing our collective expertise,
                            we produce extraordinary results that consistently surpass expectations.</p>

                        <div class="mil-about-quote">
                            <div class="mil-avatar mil-up">
                                <img src="{{ asset('assets/img/faces/customers/2.jpg') }}" alt="Founder">
                            </div>
                            <h6 class="mil-quote mil-up">Passionately Creating <span class="mil-thin">Design
                                    Wonders:</span> Unleashing <span class="mil-thin">Boundless
                                    Creativity</span></h6>
                        </div>
                    </div>

                </div>
                <div class="col-lg-5">

                    <div class="mil-about-photo mil-mb-90">
                        <div class="mil-lines-place"></div>
                        <div class="mil-up mil-img-frame" style="padding-bottom: 160%;">
                            <img src="{{ asset('assets/img/photo/1.jpg') }}" alt="img" class="mil-scale" data-value-1="1"
                                data-value-2="1.2">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- about end -->

    <!-- services -->
    <section class="mil-dark-bg">
        <div class="mi-invert-fix">
            <div class="mil-animation-frame">
                <div class="mil-animation mil-position-1 mil-scale" data-value-1="2.4" data-value-2="1.4"
                    style="top: 300px; right: -100px"></div>
                <div class="mil-animation mil-position-2 mil-scale" data-value-1="2" data-value-2="1" style="left: 150px">
                </div>
            </div>
            <div class="container mil-p-120-0">
                <div class="mil-mb-120">
                    <div class="row">
                        <div class="col-lg-10">
                            <span class="mil-suptitle mil-light-soft mil-suptitle-right mil-up">Professionals
                                focused on helping your brand<br> grow and move forward.</span>
                        </div>
                    </div>
                    <div class="mil-complex-text justify-content-center mil-up mil-mb-15">
                        <span class="mil-text-image"><img src="{{ asset('assets/img/photo/2.jpg') }}" alt="team"></span>
                        <h2 class="mil-h1 mil-muted mil-center">Unique <span class="mil-thin">Ideas</span>
                        </h2>
                    </div>
                    <div class="mil-complex-text justify-content-center mil-up">
                        <h2 class="mil-h1 mil-muted mil-center">For Your <span class="mil-thin">Business.</span>
                        </h2>
                        <a href="{{ route('services') }}" class="mil-services-button mil-button mil-arrow-place"><span>What
                                we
                                do</span></a>
                    </div>
                </div>
                <div class="row mil-services-grid m-0">
                    @foreach ($serviceCategories as $category)
                        <div class="col-md-6 col-lg-3 mil-services-grid-item p-0">
                            <a href="{{ route('services') }}" class="mil-service-card-sm mil-up">
                                <h5 class="mil-muted mil-mb-30">{{ $category->name }}</h5>
                                <p class="mil-light-soft mil-mb-30">{{ $category->description }}</p>
                                <div class="mil-button mil-icon-button-sm mil-arrow-place"></div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- services end -->

    <!-- team -->
    <section>
        <div class="container mil-p-120-30">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 col-xl-4">

                    <div class="mil-mb-90">
                        <h2 class="mil-up mil-mb-60">Meet <br>Our Team</h2>
                        <p class="mil-up mil-mb-30">We are talented individuals who are passionate about
                            bringing ideas to life. With a diverse range of backgrounds and skill sets, we
                            collaborate to produce effective solutions for our clients.</p>

                        <p class="mil-up mil-mb-60">Together, our creative team is committed to delivering
                            impactful work that exceeds expectations.</p>

                        <h4 class="mil-up"><span class="mil-thin">We</span> delivering <br><span
                                class="mil-thin">exceptional</span> results.</h4>
                    </div>

                </div>
                <div class="col-lg-6">

                    <div class="mil-team-list">
                        <div class="mil-lines-place"></div>

                        <div class="row mil-mb-60">
                            <div class="col-sm-6">

                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="{{ asset('assets/img/faces/1.jpg') }}" alt="Team member">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="home-2.html">Anna
                                                    Oldman</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Art Director</p>
                                            <ul class="mil-social-icons mil-center">
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="{{ asset('assets/img/faces/3.jpg') }}" alt="Team member">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="home-2.html">Oscar
                                                    Freeman</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Frontend Dev</p>
                                            <ul class="mil-social-icons mil-center">
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-6">

                                <p class="mil-mobile-hidden mil-text-sm mil-mb-30" style="height: 30px;">
                                    <span class="mil-accent">*</span> The founders of our agency
                                </p>

                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="{{ asset('assets/img/faces/2.jpg') }}" alt="Team member">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="home-2.html">Emma
                                                    Newman</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">Founder</p>
                                            <ul class="mil-social-icons mil-center">
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-github"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="mil-team-card mil-up mil-mb-30">
                                    <img src="{{ asset('assets/img/faces/4.jpg') }}" alt="Team member">
                                    <div class="mil-description">
                                        <div class="mil-secrc-text">
                                            <h5 class="mil-muted mil-mb-5"><a href="home-2.html">Lisa
                                                    Trueman</a></h5>
                                            <p class="mil-link mil-light-soft mil-mb-10">UI/UX Designer</p>
                                            <ul class="mil-social-icons mil-center">
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="#." target="_blank" class="social-icon"> <i
                                                            class="fab fa-github"></i></a></li>
                                            </ul>
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
    <!-- team end -->

    <!-- reviews -->
    <section class="mil-soft-bg">
        <div class="container mil-p-120-120">
            <div class="row">
                <div class="col-lg-10">
                    <span class="mil-suptitle mil-suptitle-right mil-suptitle-dark mil-up">Customer reviews
                        are a valuable source <br>of information for both businesses and consumers.</span>
                </div>
            </div>
            <h2 class="mil-center mil-up mil-mb-60">Customer <span class="mil-thin">Voices:</span> <br>Hear
                What <span class="mil-thin">They Say!</span></h2>
            <div class="mil-revi-pagination mil-up mil-mb-60"></div>
            <div class="row mil-relative justify-content-center">
                <div class="col-lg-8">
                    <div class="mil-slider-nav mil-soft mil-reviews-nav mil-up">
                        <div class="mil-slider-arrow mil-prev mil-revi-prev mil-arrow-place"></div>
                        <div class="mil-slider-arrow mil-revi-next mil-arrow-place"></div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="mil-quote-icon mil-up">
                        <path
                            d="M 13.5 10 A 8.5 8.5 0 0 0 13.5 27 A 8.5 8.5 0 0 0 18.291016 25.519531 C 17.422273 29.222843 15.877848 31.803343 14.357422 33.589844 C 12.068414 36.279429 9.9433594 37.107422 9.9433594 37.107422 A 1.50015 1.50015 0 1 0 11.056641 39.892578 C 11.056641 39.892578 13.931586 38.720571 16.642578 35.535156 C 19.35357 32.349741 22 27.072581 22 19 A 1.50015 1.50015 0 0 0 21.984375 18.78125 A 8.5 8.5 0 0 0 13.5 10 z M 34.5 10 A 8.5 8.5 0 0 0 34.5 27 A 8.5 8.5 0 0 0 39.291016 25.519531 C 38.422273 29.222843 36.877848 31.803343 35.357422 33.589844 C 33.068414 36.279429 30.943359 37.107422 30.943359 37.107422 A 1.50015 1.50015 0 1 0 32.056641 39.892578 C 32.056641 39.892578 34.931586 38.720571 37.642578 35.535156 C 40.35357 32.349741 43 27.072581 43 19 A 1.50015 1.50015 0 0 0 42.984375 18.78125 A 8.5 8.5 0 0 0 34.5 10 z"
                            fill="#000000" />
                    </svg>
                    <div class="swiper-container mil-reviews-slider">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                @include('components.testimonial-slide', ['testimonial' => $testimonial, 'index' => $loop->iteration])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- reviews end -->

    <!-- partners -->
    <div class="mil-soft-bg">
        <div class="container mil-p-0-120">
            <div class="swiper-container mil-infinite-show mil-up">
                <div class="swiper-wrapper">
                    @foreach ($collaborations as $collaboration)
                        <div class="swiper-slide">
                            <a href="#." class="mil-partner-frame" style="width: 60px;"><img
                                    src="{{ $collaboration->logo_url }}" alt="logo"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- partners end -->

    <script>
        var testimonials = @json($testimonials);
    </script>
@endsection