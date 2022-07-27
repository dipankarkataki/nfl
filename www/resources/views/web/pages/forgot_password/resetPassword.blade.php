@extends('web.layout.main')

@section('site_title', 'Reset Password | 4teamfantasy')

@section('custom_header')
    <style>
        .navbar_inner button {
            display: none;
        }
    </style>
@endsection

@section('main_content')
    <section class="auth bg-light">
        <div class="container h-100-vh flex-center">
            <div class="col-lg-5 col-md-7 mx-auto p-5">
                <h1 class="heading mb-5 text-center">
                    {{-- <a href="{{ route('site.register') }}">
                        <img src="{{ asset('web_assets/images/icon14.png') }}" alt="Logo">
                    </a> --}}
                    VERIFY OTP
                </h1>

                <p class="mb-5 text-center fw-bold font_roboto">PLEASE ENTER A NEW PASSWORD TO RESET THE ACCOUNT</p>
                <form id="resetPwdForm">
                    @csrf
                    <label for="">Password</label>
                    <div class="mb-3 otp_box">
                        <input type="password" class="form-control  shadow-sm mb-4" name="password" id="password" required>
                    </div>

                    <label for="">Confirm Password</label>
                    <div class="mb-5 otp_box">
                        <input type="password" class="form-control  shadow-sm" name="confirm_password" id="confirm_password" required>
                    </div>
                    <button type="submit" class="btn mb-3 form-control shadow-none active">RESET</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="{{ asset('web_assets/js/otp-validation.js') }}"></script>
    <script>
        ("use strict");

        $("#resetPwdForm").on("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                url: "{{ route('site.forgot.password.reset') }}",
                type: "POST",
                contentType: false,
                processData: false,
                data: formData,
                success: function(data) {
                    if (data.status == 0) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: data.message,
                        });
                    } else if (data.status == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Great",
                            text: data.message,
                            confirmButtonText: "Next",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('site.login') }}";
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: error,
                    });
                },
            });
        });
    </script>
@endsection
