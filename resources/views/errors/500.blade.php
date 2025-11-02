@extends('layouts.app')

@section('title')
    500
@endsection

@section('content')
    <!-- 404 -->
    <div class="mil-404-banner mil-dark-bg">
        <div class="mil-animation-frame">
            <div class="mil-animation mil-position-4 mil-scale" data-value-1="9" data-value-2="1.4" style="right: 40%;">
            </div>
        </div>
        <div class="mi-invert-fix mil-up">
            <div class="container">
                <div class="mil-404-frame">

                    <div class="mil-scale-frame">

                        <h1 class="mil-404" data-text="404">500</h1>

                    </div>

                    <h4 class="mil-404-text mil-dark mil-mb-60">Oops! Something went wrong :(</h4>
                    <a href="{{ route('home') }}" class="mil-button mil-arrow-place">
                        <span>Back to homepage</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!-- 404 end -->
@endsection