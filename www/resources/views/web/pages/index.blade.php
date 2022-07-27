@extends('web.layout.main')

@section('site_title', 'Home | 4teamfantasy')

@section('custom_header')
@endsection

@section('main_content')

    {{-- Banner --}}
    <section class="banner">
        <img class="banner_img" src="{{ asset('web_assets/images/home-banner.png') }}" alt="banner">

        <div class="bottom_bar">
            <div class="bottom_bar_inner">
                <div class="socials">
                    <a href="#"><i class="social_item fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="social_item fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="social_item fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="social_item fa-solid fa-envelope"></i></a>
                </div>
                <div class="bottom_bar_center_text">
                    <span class="text-banner">More Than a Fantasy Game<br />It's a Community of FUN!</span>
                </div>
                <div class="actions">
                    <a href="{{ route('site.register') }}" class="btn skew_button"><span>BECOME A MEMBER</span></a>
                    <a href="{{ route('site.login') }}" class="btn skew_button"><span>PORTAL LOGIN</span></a>
                </div>
            </div>
        </div>
    </section>

    {{-- Game info --}}
    <section class="info">
        <div class="info_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mx-auto info_inner_item">
                        <div class="inner_item">
                            <div class="skew_image">
                                <i class="fa-solid fa-hourglass-empty"></i>
                            </div>
                            <span>MINIMAL TIME COMMITMENT</span>
                        </div>

                        <div class="inner_item">
                            <div class="skew_image">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <span>PICK TEAMS INSTEAD OF PLAYERS</span>
                        </div>

                        <div class="inner_item">
                            <div class="skew_image">
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                            <span>YOU'RE ALWAYS IN THE GAME</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mx-auto info_inner_item">
                        <div class="inner_item">
                            <div class="skew_image">
                                <i class="fa-solid fa-hourglass-empty"></i>
                            </div>
                            <span>EASY TO PLAY</span>
                        </div>

                        <div class="inner_item">
                            <div class="skew_image">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <span>MORE WAYS TO WIN THROUGHOUT THE SEASON</span>
                        </div>

                        <div class="inner_item">
                            <div class="skew_image">
                                <i class="fa-solid fa-user-check"></i>
                            </div>
                            <span>GREAT WAY TO STAY CONNECTED WITH FRIENDS AND FAMILY</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mx-auto info_inner_item">
                        <img class="w-100" src="{{ asset('web_assets/images/icon3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Game summary --}}
    <section class="game_summary">
        <h1 class="heading text-center mb-5"> GAME SUMMARY </h1>
        <div class="container pt-5">
            <div class="row">

                {{-- Item 1 --}}
                <div class="col-lg-4 col-md-6 game_summary_item">
                    <div class="game_summary_item_inner">
                        <div class="inner_bg_light"></div>
                        <div class="text-center inner_text">
                            <img src="{{ asset('web_assets/images/icon4.png') }}" alt="Game summary">
                            <p>4TeamFantasy© is a mashup of traditional fantasy football and game
                                picking.</p>
                        </div>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="col-lg-4 col-md-6 game_summary_item">
                    <div class="game_summary_item_inner">
                        <div class="inner_bg_light"></div>
                        <div class="text-center inner_text">
                            <img src="{{ asset('web_assets/images/icon.png') }}" alt="Game summary">
                            <p>Instead of drafting players and setting a lineup each week, you draft four teams and pick
                                whether
                                they win or lose each week.</p>
                        </div>
                    </div>
                </div>

                {{-- Item 4 --}}
                <div class="col-lg-4 col-md-6 game_summary_item">
                    <div class="game_summary_item_inner">
                        <div class="inner_bg_light"></div>
                        <div class="text-center inner_text">
                            <img src="{{ asset('web_assets/images/icon6.png') }}" alt="Game summary">
                            <p>If your pick is correct, you get 25 points. However, if you are wrong, you lose 25 points.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Item 5 --}}
                <div class="col-lg-4 col-md-6 game_summary_item">
                    <div class="game_summary_item_inner">
                        <div class="inner_bg_light"></div>
                        <div class="text-center inner_text">
                            <img src="{{ asset('web_assets/images/icon8.png') }}" alt="Game summary">
                            <p>Since you can pick your teams to lose in this game, the worst teams in the league are just as
                                valuable as the best teams.</p>
                        </div>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="col-lg-4 col-md-6 game_summary_item">
                    <div class="game_summary_item_inner">
                        <div class="inner_bg_light"></div>
                        <div class="text-center inner_text">
                            <img src="{{ asset('web_assets/images/icon5.png') }}" alt="Game summary">
                            <p>We divide the season into four quarters and pick 4 new teams for each quarter of the season.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Item 6 --}}
                <div class="col-lg-4 col-md-6 game_summary_item">
                    <div class="game_summary_item_inner">
                        <div class="inner_bg_light"></div>
                        <div class="text-center inner_text">
                            <img src="{{ asset('web_assets/images/icon7.png') }}" alt="Game summary">
                            <p>Prizes and payouts available for each quarter and end of season.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Structure of the game --}}
    <section class="structure">
        <h1 class="heading text-center">STRUCTURE OF THE GAME </h1>
        <div class="container">
            <div class="col-lg-12">
                <div class="row align-items-end">
                    <div class="col-lg-3 col-md-4 col-6 mx-auto">
                        <img class="w-100" src="{{ asset('web_assets/images/icon9.png') }}" alt="">
                    </div>
                    <div class="col-lg-9 col-md-12 ms-auto">
                        <div class="structure_item mb-3">
                            <p class="structure_heading skew_minus_21">4TEAMFANTASY&copy; IS SET UP AS A MEMBERS ONLY CLUB
                            </p>

                            <ul class="skew_minus_21">
                                <li>We charge a membership fee to join the club. The Membership Fee is outlined below for
                                    each level.</li>
                                <li>The rest of the “In-Play” money goes directly to the player’s prize pool payouts.</li>
                            </ul>
                        </div>

                        <div class="structure_item">
                            <p class="structure_heading skew_minus_21">EACH MEMBER WILL PICK THEIR LEVEL OF PLAY BASED UPON
                                THEIR DESIRED BUY-IN AMOUNT.</p>

                            <div class="row g-0">
                                <div class="col-lg-4 p-3">
                                    <div class="bg_black p-2">
                                        <p class="structure_heading mb-0 text-center skew_minus_21">ROOKIE LEVEL $114</p>
                                    </div>
                                    <ul class="skew_minus_21">
                                        <li>$50 to Your Group of 8 Prize Pool</li>
                                        <li>$10 to the Rookie Level Prize Pool</li>
                                        <li>$50 Membership Fee for the NFL Regular Season</li>
                                        <li>$4 Credit Card Processing Fee</li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-3">
                                    <div class="bg_black p-2">
                                        <p class="structure_heading mb-0 text-center skew_minus_21">VETERAN LEVEL $214</p>
                                    </div>
                                    <ul class="skew_minus_21">
                                        <li>$100 to Your Group of 8 Prize Pool</li>
                                        <li>$56 to the Veteran Level Prize Pool</li>
                                        <li>$50 Membership Fee for the NFL Regular Season</li>
                                        <li>$8 Credit Card Processing Fee</li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 p-3">
                                    <div class="bg_black p-2">
                                        <p class="structure_heading mb-0 text-center skew_minus_21">HALL OF FAMER LEVEL
                                            $414
                                        </p>
                                    </div>
                                    <ul class="skew_minus_21">
                                        <li>$250 to Your Group of 8 Prize Pool</li>
                                        <li>$100 to the Hall Of Famer Level Prize Pool</li>
                                        <li>$50 Membership Fee for the NFL Regular Season</li>
                                        <li>$14 Credit Card Processing Fee</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="list_inner_item mb-3">
                                <i class="fa-solid fa-circle m-3"></i>
                                <p class="mb-0 fs-1 fw-bold font_roboto"> WITHIN THE LEVEL, MEMBERS WILL BE PLACED IN
                                    GROUPS OF
                                    8 PLAYER
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list_inner_item mb-3">
                                <i class="fa-solid fa-circle m-3"></i>
                                <p class="mb-0 fs-1 fw-bold font_roboto"> ONE SCORE COMPETES WITHIN YOUR GROUP OF 8 AND
                                    AGAINST THE ENTIRE LEVEL FOR PRIZES AND PAYOUTS
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list_inner_item mb-3">
                                <i class="fa-solid fa-circle m-3"></i>
                                <p class="mb-0 fs-1 fw-bold font_roboto"> PLAYERS CAN SIGN UP FOR MORE THAN ONE LEVEL,
                                    BUT THE MEMBERSHIP FEE MUST BE PAID FOR EACH
                                    LEVEL.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list_inner_item mb-3">
                                <i class="fa-solid fa-circle m-3"></i>
                                <p class="mb-0 fs-1 fw-bold font_roboto"> YOU CAN SETUP YOUR OWN PRIVATE GROUP AND INVITE
                                    FRIENDS AND FAMILY</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list_inner_item mb-3">
                                <i class="fa-solid fa-circle m-3"></i>
                                <p class="mb-0 fs-1 fw-bold font_roboto"> YOU CAN JOIN A PRIVATE GROUP IF INVITED BY THE
                                    GROUP</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="list_inner_item mb-3">
                                <i class="fa-solid fa-circle m-3"></i>
                                <p class="mb-0 fs-1 fw-bold font_roboto"> YOU CAN JOIN A PUBLIC GROUP (4Team will place you
                                    in a group)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
@endsection
