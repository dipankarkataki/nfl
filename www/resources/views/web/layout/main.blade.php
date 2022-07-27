<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('web_assets/images/logo.png') }}" type="image/x-icon">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.1.3/css/bootstrap.min.css') }}">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('web_assets/css/main.css') }}">

    <title>@yield('site_title')</title>

    @yield('custom_header')
</head>

<body>
    {{-- Navbar --}}
    @if (!Request::routeIs('site.register') && !Request::routeIs('site.login'))
        @include('web.includes.web.navbar')
    @endif

    {{-- Main --}}
    @yield('main_content')

    {{-- Footer --}}
    @if (!Request::routeIs('site.register') &&
        !Request::routeIs('site.login') &&
        !Request::routeIs('site.forgot.password') &&
        !Request::routeIs('site.otp.validate') &&
        !Request::routeIs('site.select.level'))
        @include('web.includes.web.footer')
    @endif

    <script src="{{ asset('vendor/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('custom_js')
</body>

</html>
