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
                    VERIFY OTP
                </h1>

                <p class="mb-5 text-center fw-bold font_roboto">PLEASE ENTER THE ONE TIME PASSWORD TO VERIFY YOUR ACCOUNT</p>
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

                    <button type="submit" class="btn mb-3 form-control shadow-nonevalidate-btn">VALIDATE</button>
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
            $('.validate-btn').text= 'Please wait....';
            $('.validate-btn').attr('disabled', true);
            $.ajax({
                url: "{{ route('site.forgot.password.validate.otp') }}",
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
                        $('.validate-btn').text = 'VALIDATE';
                        $('.validate-btn').attr('disabled', false);
                    } else if (data.status == 1) {
                        Swal.fire({
                            icon: "success",
                            title: "Great",
                            text: data.message,
                            confirmButtonText: "Next",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('site.forgot.password.reset') }}";
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
                    $('.validate-btn').text = 'VALIDATE';
                    $('.validate-btn').attr('disabled', false);
                },
            });
        });


        $('#resendOTP').on('submit', function(e) {
            e.preventDefault();

            window.location.href="{{route('site.forgot.password')}}";
        });
    </script>
@endsection
