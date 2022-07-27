@extends('web.layout.main')

@section('site_title', 'Login | 4teamfantasy')

@section('custom_header')
@endsection

@section('main_content')
    <section class="auth bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 p-5 px-md-3 auth_inner_left">
                    <div>
                        <a href="{{ route('site.home') }}"><img src="{{ asset('web_assets/images/logo.png') }}" alt="Logo"
                                width="100"></a>
                    </div>
                    <div class="action">
                        <a class="btn mb-3 active" href="{{ route('site.register') }}">CREATE NEW ACCOUNT</a>
                        <a class="btn" href="{{ route('site.login') }}">EXISTING ACCOUNT</a>
                    </div>
                    <div>
                        <img src="{{ asset('web_assets/images/icon121.png') }}" alt="Image" class="w-100">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 p-5">
                    <h1 class="heading text-center mb-5">LOGIN</h1>


                    <form class="row g-3">
                        <div class="col-lg-6 mb-3">
                            <a href="{{ route('google.login') }}" class="btn social_login_btn form-control shadow-sm"><img
                                    class="me-3" width="35" src="{{ asset('web_assets/images/icon12.png') }}"
                                    alt="Google"> LOGIN WITH
                                GOOGLE</a>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <a href="{{ route('facebook.login') }}" class="btn social_login_btn form-control shadow-sm"><img
                                    class="me-3" width="35" src="{{ asset('web_assets/images/icon13.png') }}"
                                    alt="Facebook"> LOGIN WITH
                                FACEBOOK</a>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="login_email" class="form-label">Email Address / Cell No.<sup>*</sup></label>
                            <input type="email" name="email" class="form-control shadow-sm mb-2" id="login_email"
                                autocomplete="off">
                            <div class="form-text">Add country code before cell no. E.g. 91xxxxxxxxxx</div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="login_password" class="form-label">Password<sup>*</sup></label>
                            <input type="password" name="password" class="form-control shadow-sm" id="login_password"
                                autocomplete="off">
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                                <label class="form-check-label" for="invalidCheck">
                                    Keep me logged in
                                </label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <button type="submit" class="btn mb-3 form-control active" id="loginBtn">LOGIN</button>
                            <small><a href="{{ route('site.forgot.password') }}">Forgotten your password?</a></small>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        $('#loginBtn').on('click', function(e) {
            e.preventDefault();

            $('#loginBtn').text('Please wait...');
            $('#loginBtn').attr('disabled', true);

            let email = $('#login_email').val();
            let password = $('#login_password').val();

            if (email == '') {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Email is required',
                });
                $('#loginBtn').text('LOGIN');
                $('#loginBtn').attr('disabled', false);
            } else if (password == '') {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: 'Password is required',
                });
                $('#loginBtn').text('LOGIN');
                $('#loginBtn').attr('disabled', false);
            } else {
                $.ajax({
                    url: "{{ route('site.login') }}",
                    type: "POST",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'email': email,
                        'password': password
                    },
                    success: function(data) {
                        if (data.status == 0) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: data.message,
                            });
                            $('#loginBtn').text('LOGIN');
                            $('#loginBtn').attr('disabled', false);
                        } else {
                            window.location.href = data.url
                        }
                    },
                    error:function(xhr, status, error){
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: error,
                        });
                        $('#loginBtn').text('LOGIN');
                        $('#loginBtn').attr('disabled', false);
                    }
                })
            }
        });
    </script>
@endsection
