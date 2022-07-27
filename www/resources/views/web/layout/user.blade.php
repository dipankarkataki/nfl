<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{ asset('web_assets/images/logo.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.1.3/css/bootstrap.min.css') }}">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('web_assets/css/user.css') }}">

    <title>@yield('site_title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('custom_header')
</head>

<body>
    {{-- Sidebar --}}
    @include('web.includes.user.sidebar')

    <section class="main bg-light" id="main">
        {{-- Navbar --}}
        @include('web.includes.user.navbar')

        @yield('main_content')
    </section>

    <script src="{{ asset('vendor/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function toggleMenu() {
            const toggleMenuIcon = document.getElementById('toggle');
            const sidebar = document.getElementById('sidebar');
            const main = document.getElementById('main');


            toggleMenuIcon.classList.toggle("change");
            sidebar.classList.toggle("active");
            main.classList.toggle("active");
        }
    </script>
    @yield('custom_js')
</body>

</html>
