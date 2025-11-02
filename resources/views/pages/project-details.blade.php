@extends('layouts.app')

@section('title')
    Project Details
@endsection

@section('content')

    <!-- banner -->
    <div class="mil-inner-banner">
        <div class="mil-banner-content mil-up">
            <div class="mil-animation-frame">
                <div class="mil-animation mil-position-4 mil-dark mil-scale" data-value-1="6" data-value-2="1.4">
                </div>
            </div>
            <div class="container">
                <ul class="mil-breadcrumbs mil-mb-60">
                    <li><a href="{{ route('home') }}">Homepage</a></li>
                    <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
                    <li><a href="{{ route('projectDetails', $project->slug) }}">Project</a></li>
                </ul>
                <h1 class="mil-mb-60">{!! styledTitle($project->title) !!}</h1>
                <a href="#project" class="mil-link mil-dark mil-arrow-place mil-down-arrow">
                    <span>Read more</span>
                </a>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- project -->
    <section>
        <div class="container mil-p-120-120" id="project">
            <div class="row justify-content-between mil-mb-120">
                <div class="col-lg-4">

                    <div class="mil-p-0-120">
                        <ul class="mil-service-list mil-dark mil-mb-60">
                            @if($project->client_name)
                                <li class="mil-up">Client: &nbsp;<span class="mil-dark">{{$project->client_name}}</span></li>
                            @endif
                            @if($project->date)
                                <li class="mil-up">Date: &nbsp;<span
                                        class="mil-dark">{{ \Carbon\Carbon::parse($project->date)->format('F Y') }}</span></li>
                            @endif
                            @if($project->author)
                                <li class="mil-up">Author: &nbsp;<span class="mil-dark">{{$project->author}}</span></li>
                            @endif
                        </ul>

                        <h5 class="mil-up mil-mb-30">
                            {{ implode(', ', $project->keywords ?? []) }}!
                        </h5>
                        @if($project->description)
                            <p class="mil-up mil-mb-60">{!! $project->description !!}</p>
                        @endif

                        <a data-no-swup href="{{ $project->url }}" target="_blank"
                            class="mil-link mil-dark mil-up  mil-arrow-place">
                            <span>Visit website</span>

                        </a>
                    </div>

                </div>
                <div class="col-lg-7">

                    @foreach($project->image_urls as $image)
                        <div class="mil-image-frame mil-horizontal mil-up mil-mb-30">
                            <img src="{{ $image }}" alt="{{ $project->title }}">
                            {{-- <a data-fancybox="gallery" data-no-swup href="{{ $image }}" class="mil-zoom-btn">
                                <img src="{{ asset('assets/img/icons/zoom.svg') }}" alt="zoom">
                            </a> --}}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mil-works-nav mil-up">
                @foreach (getAdjacentProjects($project) as $nav)
                    <a href="{{ $nav['route'] }}" class="mil-link mil-dark {{ $nav['extraClass'] }} {{ $nav['iconClass'] }}">
                        <span>{{ $nav['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    <!-- project end -->

    <!-- call to action -->
    <section class="mil-soft-bg">
        <div class="container mil-p-120-120">
            <div class="row">
                <div class="col-lg-10">

                    <span class="mil-suptitle mil-suptitle-right mil-suptitle-dark mil-up">Looking to make your
                        mark? We'll help you turn <br> your project into a success story.</span>

                </div>
            </div>
            <div class="mil-center">
                <h2 class="mil-up mil-mb-60">Ready to bring your <span class="mil-thin">ideas to</span> life?
                    <br> We're <span class="mil-thin">here to help</span>
                </h2>
                <div class="mil-up"><a href="{{ route('contact') }}" class="mil-button mil-arrow-place"><span>Contact
                            us</span></a></div>
            </div>
        </div>
    </section>
    <!-- call to action end -->
@endsection