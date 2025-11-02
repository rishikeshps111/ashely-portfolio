<!-- menu -->
<div class="mil-menu-frame">
    <!-- frame clone -->
    <div class="mil-frame-top">
        <a href="{{ route('home') }}" class="mil-logo">TM.</a>
        <div class="mil-menu-btn">
            <span></span>
        </div>
    </div>
    <!-- frame clone end -->
    <div class="container">
        <div class="mil-menu-content">
            <div class="row">
                <div class="col-xl-5">
                    <nav class="mil-main-menu" id="swupMenu">
                        <ul>
                            <li class="mil-has-children {{ Route::is('home') ? 'mil-active' : '' }}">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="mil-has-children {{ Route::is('portfolio*') ? 'mil-active' : '' }}">
                                <a href="{{ route('portfolio') }}">Portfolio</a>
                            </li>
                            <li class="mil-has-children {{ Route::is('services*') ? 'mil-active' : '' }}">
                                <a href="{{ route('services') }}">Services</a>
                            </li>
                            <li class="mil-has-children {{ Route::is('contact*') ? 'mil-active' : '' }}">
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>

                </div>
                <div class="col-xl-7">
                    <div class="mil-menu-right-frame">
                        <div class="mil-animation-in">
                            <div class="mil-animation-frame">
                                <div class="mil-animation mil-position-1 mil-scale" data-value-1="2" data-value-2="2">
                                </div>
                            </div>
                        </div>
                        <div class="mil-menu-right">
                            <div class="row">
                                <div class="col-lg-8 mil-mb-60">
                                    <h6 class="mil-muted mil-mb-30">Projects</h6>
                                    <ul class="mil-menu-list">
                                        @foreach (latestActiveProjects() as $project)
                                            <li>
                                                <a href="{{ route('projectDetails', $project->slug) }}"
                                                    class="mil-light-soft">
                                                    {{ $project->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-lg-4 mil-mb-60">
                                    <h6 class="mil-muted mil-mb-30">{{ generalSetting('more_configs.county') }}
                                    </h6>
                                    <p class="mil-light-soft mil-up">{{ generalSetting('more_configs.address') }},
                                        {{ generalSetting('more_configs.city') }}, <span
                                            class="mil-no-wrap">{{ generalSetting('more_configs.phone') }}</span>
                                    </p>

                                </div>
                            </div>
                            <div class="mil-divider mil-mb-60"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- menu -->