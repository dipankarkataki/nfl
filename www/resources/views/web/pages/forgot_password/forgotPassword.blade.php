@extends('web.layout.main')

@section('site_title', 'Forgot Password | 4teamfantasy')

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
                <h1 class="heading mb-2 text-center">
                    {{-- <a href="{{ route('site.register') }}">
                        <img src="{{ asset('web_assets/images/icon14.png') }}" alt="Logo">
                    </a> --}}
                    FORGOT PASSWORD?
                </h1>

                <p class="mb-5 text-center fw-bold font_roboto">PLEASE ENTER YOUR REGISTERED EMAIL ID TO RESET YOUR PASSWORD</p>
                <form id="forgotPasswordForm">
                    @csrf
                    <div class="mb-5">
                        <label for="">Enter Email</label>
                        <input type="email" class="form-control shadow-sm" name="email" id="email" required>
                    </div>
                    <button type="submit" class="btn mb-3 form-control shadow-none active reset-btn">Send Reset Link</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        $('#forgotPasswordForm').on('submit', function(e){
            e.preventDefault();

            let formData = new FormData(this);

            $('.reset-btn').text = 'Please wait....';
            $('.reset-btn').attr('disabled', true);
            $.ajax({
                url:"{{route('site.forgot.password.send.reset.link')}}",
                type:"POST",
                processData:false,
                contentType:false,
                data: formData,
                success:function(data){
                    if(data.status == 1){
                        Swal.fire({
                            'icon':'success',
                            'title':'Great',
                            'text':data.message
                        });
                        window.location.href="{{route('site.forgot.password.validate.otp')}}"
                    }else{
                        Swal.fire({
                            'icon':'error',
                            'title':'Opps',
                            'text':data.message
                        });
                        $('.reset-btn').text = 'Send Reset Link';
                        $('.reset-btn').attr('disabled', false);
                    }
                },
                error:function(xhr, status, error){
                    Swal.fire({
                        'icon':'error',
                        'title':'Opps',
                        'text': error
                    });

                    $('.reset-btn').text = 'Send Reset Link';
                    $('.reset-btn').attr('disabled', false);
                }
            });
        });
    </script>
@endsection
