<!-- footer -->
<footer class="mil-dark-bg">
    <div class="mi-invert-fix">
        <div class="container mil-p-120-60">
            <div class="row justify-content-between">
                <div class="col-md-4 col-lg-4 mil-mb-30">
                    <div class="mil-up d-flex justify-content-center">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="TANVIGS MARN Logo" class="img-fluid"
                            style="max-width: 500px;">
                    </div>
                    <p class="mil-light-soft mil-up mil-mb-30 d-flex justify-content-center">Subscribe our newsletter:
                    </p>
                    <form class="mil-subscribe-form mil-up">
                        <input type="text" id="subscriberEmail" placeholder="Enter our email">
                        <button type="submit" class="mil-button mil-icon-button-sm mil-arrow-place"
                            id="subscribeBtn"></button>
                    </form>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="row justify-content-end">
                        <div class="col-md-6 col-lg-7">
                            <nav class="mil-footer-menu mil-mb-60">
                                <ul>
                                    <li class="mil-up {{ Route::is('home') ? 'mil-active' : '' }}">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="mil-up {{ Route::is('portfolio*') ? 'mil-active' : '' }}">
                                        <a href="{{ route('portfolio') }}">Portfolio</a>
                                    </li>
                                    <li class="mil-up {{ Route::is('services*') ? 'mil-active' : '' }}">
                                        <a href="{{ route('services') }}">Services</a>
                                    </li>
                                    <li class="mil-up {{ Route::is('contact*') ? 'mil-active' : '' }}">
                                        <a href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-6 col-lg-5">
                            <ul class="mil-menu-list mil-up mil-mb-60">
                                @foreach (latestActiveProjects() as $project)
                                    <li>
                                        <a href="{{ route('projectDetails', $project->slug) }}" class="mil-light-soft">
                                            {{ $project->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-between flex-sm-row-reverse">
                <div class="col-md-7 col-lg-6">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-lg-5 mil-mb-60">
                            <h6 class="mil-muted mil-up mil-mb-30">{{ generalSetting('more_configs.county') }}</h6>
                            <p class="mil-light-soft mil-up">{{ generalSetting('more_configs.address') }},
                                {{ generalSetting('more_configs.city') }},
                                <span class="mil-no-wrap">{{ generalSetting('more_configs.phone') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-6 mil-mb-60">
                    <div class="mil-vert-between">
                        <div class="mil-mb-30">
                            <ul class="mil-social-icons mil-up">
                                @if (generalSetting('social_network.x_twitter'))
                                    <li>
                                        <a href="{{ generalSetting('social_network.x_twitter') }}" target="_blank"
                                            class="social-icon">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (generalSetting('social_network.github'))
                                    <li>
                                        <a href="{{ generalSetting('social_network.github') }}" target="_blank"
                                            class="social-icon">
                                            <i class="fab fa-github"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (generalSetting('social_network.linkedin'))
                                    <li>
                                        <a href="{{ generalSetting('social_network.linkedin') }}" target="_blank"
                                            class="social-icon">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (generalSetting('social_network.instagram'))
                                    <li>
                                        <a href="{{ generalSetting('social_network.instagram') }}" target="_blank"
                                            class="social-icon">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <p class="mil-light-soft mil-up">
                            © Copyright {{ now()->year }} - Portfolio. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->