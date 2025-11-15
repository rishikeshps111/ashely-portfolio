@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('content')

    <!-- banner -->
    <div class="mil-inner-banner mil-p-0-120">
        <div class="mil-banner-content mil-center mil-up">
            <div class="container">
                <ul class="mil-breadcrumbs mil-center mil-mb-60">
                    <li><a href="{{ route('home') }}">Homepage</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <h1 class="mil-mb-60">Get in touch!</h1>
                <a href="#contact" class="mil-link mil-dark mil-arrow-place mil-down-arrow">
                    <span>Send message</span>
                </a>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- map -->
    <div class="mil-map-frame mil-up">
        <div class="mil-map">
            @if(config('more_configs.map_url'))
                {!! config('more_configs.map_url') !!}
            @else
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62848.48922995193!2d76.30063100145833!3d10.096580343397882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080edf9cac58af%3A0x1d2e7149d0f37101!2sAluva%2C%20Kerala!5e0!3m2!1sen!2sin!4v1761872634835!5m2!1sen!2sin"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            @endif
        </div>
    </div>
    <!-- map end -->

    <!-- contact form -->
    <section id="contact">
        <div class="container mil-p-120-90">
            <h3 class="mil-center mil-up mil-mb-120">Let's <span class="mil-thin">Talk</span></h3>
            <form id="contactForm" class="row align-items-center">
                <div class="col-lg-6 mil-up">
                    <input type="text" id="contactName" name="name" placeholder="What's your name">
                    <span class="text-danger text-danger-error error-name"></span>
                </div>
                <div class="col-lg-6 mil-up">
                    <input type="email" id="contactEmail" name="email" placeholder="Your Email">
                    <span class="text-danger text-danger-error error-email"></span>
                </div>
                <div class="col-lg-12 mil-up">
                    <textarea id="contactMessage" name="message" placeholder="Tell us about our project"></textarea>
                    <span class="text-danger text-danger-error error-message"></span>
                </div>
                <div class="col-lg-8">
                    <p class="mil-up mil-mb-30">
                        <span class="mil-accent">*</span> We promise not to disclose your personal information to third
                        parties.
                    </p>
                </div>
                <div class="col-lg-4">
                    <div class="mil-adaptive-right mil-up mil-mb-30">
                        <button type="submit" class="mil-button mil-arrow-place">
                            <span>Send message</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- contact form end -->

@endsection