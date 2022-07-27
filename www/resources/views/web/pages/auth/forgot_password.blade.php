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
            <div class="col-lg-5 col-md-8 mx-auto p-5">
                <h1 class="heading mb-5"><img src="{{ asset('web_assets/images/icon14.png') }}" alt="Logo"> FORGOT
                    PASSWORD
                </h1>
                <form>
                    <div class="mb-5">
                        <label for="old_email" class="form-label">Email Address</label>
                        <input type="email" class="form-control shadow-sm" id="old_email" autocomplete="off">
                    </div>

                    <button type="submit" class="btn mb-3 form-control active">SEND RESET LINK</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
@endsection
