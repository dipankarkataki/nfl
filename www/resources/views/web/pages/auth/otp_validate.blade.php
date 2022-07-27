@extends('web.layout.main')

@section('site_title', 'OTP Validation | 4teamfantasy')

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
                    OTP VALIDATION
                </h1>

                <p class="mb-0 text-center fw-bold font_roboto">PLEASE ENTER THE ONE TIME PASSWORD TO VERIFY YOUR ACCOUNT</p>
                <p class="text-center fw-bold font_roboto">A CODE HAS BEEN SENT TO XXXXXX
                    @if (Session::has('phone'))
                        {{ substr(Session('phone'), -4) }}
                    @endif
                </p>
                <form id="otpForm">
                    @csrf
                    <div class="mb-5 otp_box">
                        <input type="number" pattern="[0-9]*" min="0" max="9" value=""
                            class="form-control otp_digit shadow-sm" name="otp_digit_1" id="otp_digit_1" maxlength="1"
                            required>
                        <input type="number" pattern="[0-9]*" min="0" max="9" value=""
                            class="form-control otp_digit shadow-sm" name="otp_digit_2" id="otp_digit_2" maxlength="1"
                            required>
                        <input type="number" pattern="[0-9]*" min="0" max="9" value=""
                            class="form-control otp_digit shadow-sm" name="otp_digit_3" id="otp_digit_3" maxlength="1"
                            required>
                        <input type="number" pattern="[0-9]*" min="0" max="9" value=""
                            class="form-control otp_digit shadow-sm" name="otp_digit_4" id="otp_digit_4" maxlength="1"
                            required>
                        <input type="number" pattern="[0-9]*" min="0" max="9" value=""
                            class="form-control otp_digit shadow-sm" name="otp_digit_5" id="otp_digit_5" maxlength="1"
                            required>
                        <input type="number" pattern="[0-9]*" min="0" max="9" value=""
                            class="form-control otp_digit shadow-sm" name="otp_digit_6" id="otp_digit_6" maxlength="1"
                            required>
                    </div>

                    <button type="submit" class="btn mb-3 form-control shadow-none active">VALIDATE</button>
                </form>
                <div class="resend_otp_box">
                    <small>Didn't get the code</small>
                    <form id="resendOTP">
                        @csrf
                        <button type="submit"
                            style="background: none; color: green; font-size: 15px; font-weight: 500;">Resend</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script src="{{ asset('web_assets/js/otp-validation.js') }}"></script>
    <script>
        ("use strict");

        $("#otpForm").on("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            $.ajax({
                url: "{{ route('site.otp.validate') }}",
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
                                window.location.href =
                                    "{{ route('site.select.level') }}";
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


        $('#resendOTP').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('site.otp.resend') }}",
                type: "POST",
                processData: false,
                contentType: false,
                data: formData,
                success: function(data) {
                    if (data.status == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Great",
                            text: data.message,
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: data.message,
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
