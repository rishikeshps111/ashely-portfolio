<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts.style')

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logoIcon.png') }}">


</head>

<body>
    <!-- wrapper -->
    <div class="mil-wrapper" id="top">

        @include('includes.cursor')

        @include('includes.preloader')

        @include('includes.progress-bar')

        @include('layouts.header')

        @include('includes.curtain')

        @include('includes.frame')

        <!-- content -->
        <div class="mil-content">
            <div id="swupMain" class="mil-main-transition">

                @yield('content')

                @include('layouts.footer')

                @include('includes.hidden')

            </div>
        </div>
        <!-- content -->

    </div>
    <!-- wrapper end -->


    @include('includes.toast')

    @include('layouts.script')

</body>

</html>