@extends('web.layout.main')

@section('site_title', 'Select Level | 4teamfantasy')

@section('custom_header')
    <style>
        .navbar_inner button {
            display: none;
        }
    </style>
@endsection

@section('main_content')
    <section class="select_level bg-light">
        <div class="container">
            <h1 class="heading text-center my-5">SELECT LEVEL</h1>
            <div class="row justify-content-center">

                {{-- Rookie level --}}
                @foreach ($level_details as $item)
                    <div class="col-lg-4 col-md-6 mb-3 mb-md-4">
                        <div class="card single_level shadow-sm p-5" data-id="{{Crypt::encrypt($item->id)}}" data-price="{{$item->amount}}">
                            <div class="single_level_inner">
                                <div class="level_price_div">
                                    <p class="level_price mb-0">${{$item->amount}}</p>
                                </div>
                                <div class="circle"></div>
                            </div>
                            <p class="level_title">{{$item->level_name}}</p>
                            <ul>
                                <li><strong>${{$item->membership_fee}}</strong> Membership Fee</li>
                                <li><strong>${{$item->eight_prize_pool}}</strong> to their Group of 8 prize pool</li>
                                <li><strong>${{$item->level_prize_pool}}</strong> to the Rookie Level Prize Pool</li>
                                <li><strong>${{$item->credit_card_processing_fee}}</strong> credit card processing fee</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-6 mb-3 mb-md-4">
                    <div class="card single_level shadow-sm p-5">
                        <div class="single_level_inner">
                            <div class="level_price_div">
                                <p class="level_price mb-0">$114</p>
                            </div>
                            <div class="circle"></div>
                        </div>
                        <p class="level_title">ROOKIE LEVEL</p>
                        <ul>
                            <li><strong>$50</strong> Membership Fee</li>
                            <li><strong>$50</strong> to their Group of 8 prize pool</li>
                            <li><strong>$10</strong> to the Rookie Level Prize Pool</li>
                            <li><strong>$4</strong> credit card processing fee</li>
                        </ul>
                    </div>
                </div>


               
                <div class="col-lg-4 col-md-6 mb-3 mb-md-4">
                    <div class="card single_level shadow-sm p-5">
                        <div class="single_level_inner">
                            <div class="level_price_div">
                                <p class="level_price mb-0">$214</p>
                            </div>
                            <div class="circle"></div>
                        </div>
                        <p class="level_title">VETERAN LEVEL</p>
                        <ul>
                            <li><strong>$50</strong> Membership Fee</li>
                            <li><strong>$100</strong> to their Group of 8 prize pool</li>
                            <li><strong>$56</strong> to the vETERAN Level Prize Pool</li>
                            <li><strong>$8</strong> credit card processing fee</li>
                        </ul>
                    </div>
                </div>


                
                <div class="col-lg-4 col-md-6 mb-3 mb-md-4">
                    <div class="card single_level shadow-sm p-5">
                        <div class="single_level_inner">
                            <div class="level_price_div">
                                <p class="level_price mb-0">$444</p>
                            </div>
                            <div class="circle"></div>
                        </div>
                        <p class="level_title">HALL OF FAMER LEVEL</p>
                        <ul>
                            <li><strong>$50</strong> Membership Fee</li>
                            <li><strong>$250</strong> to their Group of 8 prize pool</li>
                            <li><strong>$126</strong> to the Hall Of Famer Level Prize Pool</li>
                            <li><strong>$18</strong> credit card processing fee</li>
                        </ul>
                    </div>
                </div> --}}

                <div class="text-center mt-5">
                    <button class="btn shadow-none fs-1" id="makePaymentBtn"><span>MAKE PAYMENT</span>
                        <div class="btn-loader spinner-border text-light d-none" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>

                <div class="modal fade" id="makePaymentPage" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-0">
                            <!-- Modal Header -->
                            <div class="modal-header border-0">
                                <h4 class="modal-title">MAKE PAYMENT</h4>
                                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                            </div>
            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form id="makePaymentForm">
                                    @csrf
                                    <input type="hidden" name="opaqueDataValue" id="opaqueDataValue" />
                                    <input type="hidden" name="opaqueDataDescriptor" id="opaqueDataDescriptor" />
                                    <div class="row">
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="">Name On Card<sup>*</sup></label>
                                            <input type="text" class="form-control" name="nameOnCard" id="nameOnCard" placeholder="e.g Jhon Doe" required>
                                        </div>
                                        <div class="col-md-12 form-group mb-3">
                                            <label for="">Card Number<sup>*</sup></label>
                                            <input type="text" class="form-control" id="cardNumber" placeholder="e.g 1234567890" required>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="">Expiry Month<sup>*</sup></label>
                                                <input type="text" class="form-control" id="expMonth" placeholder="e.g 12" required>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="">Expiry Year<sup>*</sup></label>
                                                <input type="text" class="form-control" id="expYear" placeholder="e.g 2022" required>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="">CVV Number<sup>*</sup></label>
                                                <input type="text" class="form-control" id="cvvNumber" placeholder="e.g 123" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group modal-footer border-0">
                                        <button type="button" class="btn btn-success group-btn" id="payNowBtn">PAY NOW</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    {{-- For Sand Box --}}
    <script type="text/javascript" src="https://jstest.authorize.net/v1/Accept.js" charset="utf-8"></script>

    {{-- For Production --}}
    {{-- <script type="text/javascript" src="https://js.authorize.net/v1/Accept.js" charset="utf-8"></script> --}}
    
    <script>
        // Add active class to selected level
        let levels = document.querySelectorAll('.single_level');
        levels.forEach(level => {
            level.addEventListener('click', function() {
                levels.forEach(oldLevel => oldLevel.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

    <script>
        const makePayBtn = document.getElementById('makePaymentBtn');
        makePayBtnText = document.querySelector('#makePaymentBtn span');
        makePayBtnLoader = document.querySelector('.btn-loader')
        makePayBtn.addEventListener('click', function() {
            makePayBtnText.innerHTML = "Please wait...";
            makePayBtnLoader.classList.remove('d-none');

            let levels = document.querySelectorAll('.single_level');
            let level_id = '';
            let level_price = '';
            levels.forEach(level => {
                if(level.classList.contains('active')){
                    level_id = level.getAttribute('data-id');
                    level_price = level.getAttribute('data-price');
                }
               
            });
            if(level_id == ''){
                Swal.fire({
                    'icon' : 'error',
                    'title' : 'Oops',
                    'text' : 'Please select atleast one level'
                });
                makePayBtnText.innerHTML = "MAKE PAYMENT";
                makePayBtnLoader.classList.add('d-none');
            }else{
                $('#makePaymentPage').modal('show');
                $('#payNowBtn').text('PAY NOW $'+level_price);
            }

            $('#payNowBtn').on('click', function(){
                 // Set up authorisation to access the gateway.
                let authData = {};
                    authData.clientKey = "{!! env('MERCENT_PUBLIC_KEY') !!}";
                    authData.apiLoginID = "{!! env('MERCENT_KEY') !!}";
            
                let cardData = {};
                    cardData.cardNumber = document.getElementById("cardNumber").value;
                    cardData.month = document.getElementById("expMonth").value;
                    cardData.year = document.getElementById("expYear").value;
                    cardData.cvv = document.getElementById("cvvNumber").value;
            
                // Now send the card data to the gateway for tokenisation.
                // The responseHandler function will handle the response.
                let secureData = {};
                    secureData.authData = authData;
                    secureData.cardData = cardData;
                    Accept.dispatchData(secureData, responseHandler);

                    function responseHandler(response) {
                        if (response.messages.resultCode === "Error") {
                            var i = 0;
                            while (i < response.messages.message.length) {
                                console.log(
                                    response.messages.message[i].code + ": " +
                                    response.messages.message[i].text
                                );
                                i = i + 1;
                            }
                        } else {
                            console.log('Response is => '+response.messages);
                            // paymentFormUpdate(response.opaqueData);
                        }
                    }
            });
            // $.ajax({
            //     url: "{{ route('site.payment') }}",
            //     type: "POST",
            //     data: {
            //         '_token' : "{{ csrf_token() }}",
            //         'level_id' : level_id
            //     },
            //     success: function(data) {
            //         if (data.status == 0) {
            //             Swal.fire({
            //                 icon: "error",
            //                 title: "Oops...",
            //                 text: data.message,
            //             }).then(() => {
            //                 payBtnText.innerHTML = "PAY NOW";
            //                 payBtnLoader.classList.add('d-none');
            //             });
            //         } else if (data.status == 1) {
            //             Swal.fire({
            //                 icon: "success",
            //                 title: "Great",
            //                 text: data.message,
            //                 confirmButtonText: "Next",
            //             }).then((result) => {
            //                 if (result.isConfirmed) {
            //                     window.location.href =
            //                         "{{ route('site.login') }}";
            //                 }
            //             });
            //         }
            //     },
            //     error: function(xhr, status, error) {
            //         Swal.fire({
            //             icon: "error",
            //             title: "Oops...",
            //             text: error,
            //         });
            //     },
            // });
        })
    </script>
@endsection
