@extends('web.layout.main')

@section('site_title', 'Register | 4teamfantasy')

@section('custom_header')
    <style>
        .navbar {
            display: none;
        }
    </style>
@endsection

@section('main_content')
    <section class="auth bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 p-5 auth_inner_left">
                    <div>
                        <a href="{{ route('site.home') }}"><img src="{{ asset('web_assets/images/logo.png') }}"
                                alt="Logo" width="100"></a>
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
                    <h1 class="heading text-center mb-5">JOIN THE LEAGUE</h1>


                    <form class="row g-3" id="registerForm">
                        @csrf
                        <div class="col-lg-6 mb-3">
                            <a href="{{ route('google.login') }}" class="btn social_login_btn form-control shadow-sm"><img
                                    class="me-3" width="35" src="{{ asset('web_assets/images/icon12.png') }}"
                                    alt="Google"> JOIN
                                WITH
                                GOOGLE</a>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <a href="{{ route('facebook.login') }}"
                                class="btn social_login_btn form-control shadow-sm"><img class="me-3" width="35"
                                    src="{{ asset('web_assets/images/icon13.png') }}" alt="Facebook"> JOIN
                                WITH
                                FACEBOOK</a>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="fname" class="form-label">First Name(*)</label>
                            <input type="text" class="form-control shadow-sm" id="fname" name="fname"
                                value="{{ $first_name ?? old('fname') }}" autocomplete="off" required>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="lname" class="form-label">Last Name(*)</label>
                            <input type="text" class="form-control shadow-sm" id="lname" name="lname"
                                value="{{ $last_name ?? old('lname') }}" autocomplete="off" required>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="email" class="form-label">Email Address(*)</label>
                            <input type="email" class="form-control shadow-sm" id="email" name="email"
                                value="{{ $email ?? old('email') }}" autocomplete="off" required>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="phone" class="form-label">Cell Phone Number(*)</label>
                            <div class="input-group mb-3">
                                <select name="countryCode" class="input-group-text shadow-sm country-code-input-box"
                                    id="countryCode" required>
                                    <option value="91">91</option>
                                </select>
                                <input type="text" class="form-control shadow-sm" id="phone" name="phone"
                                    autocomplete="off" maxlength="10" required>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label for="password" class="form-label">Password(*)</label>
                            <input type="password" class="form-control shadow-sm" id="password" name="password"
                                autocomplete="off" required>
                        </div>

                        <div class="col-lg-6 mb-5">
                            <label for="cpassword" class="form-label">Confirm Password(*)</label>
                            <input type="password" class="form-control shadow-sm" id="cpassword" name="cpassword"
                                autocomplete="off" required>
                        </div>

                        <small class="text-center">By tapping 'Register' you are agreeing to the <a href="#">Terms of
                                Service</a> and
                            <a href="#">Privacy Policy</a></small>
                        <button type="submit" class="btn mb-3 active">CREATE NEW ACCOUNT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        $('#countryCode').on('click', function() {
            let xhr = new XMLHttpRequest();

            xhr.onload = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let data = JSON.parse(xhr.responseText);
                    data.forEach(element => {
                        let option = $("<option />");
                        option.html(element.country_code);
                        option.val(element.country_code);
                        $('#countryCode').append(option);
                    });
                }
            }
            xhr.open('GET', 'country-code.json', true);
            xhr.send();

        });

        $('#registerForm').on('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                url: "{{ route('site.register') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.status == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: data.message,
                        });
                    } else if (data.status == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Great',
                            text: data['message'],
                            confirmButtonText: 'Next'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('site.otp.validate') }}";
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: error,
                    });
                }
            });
        });
    </script>
@endsection
