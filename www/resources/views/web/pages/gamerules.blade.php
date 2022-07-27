@extends('web.layout.main')

@section('site_title', 'Game Rules | 4teamfantasy')

@section('custom_header')
@endsection

@section('main_content')

    {{-- Banner --}}
    <section class="banner">
        <img class="banner_img" src="{{ asset('web_assets/images/banner2.png') }}" alt="banner">

        <div class="bottom_bar">
            <div class="bottom_bar_inner">
                <div class="socials">
                    <a href="#"><i class="social_item fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="social_item fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="social_item fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="social_item fa-solid fa-envelope"></i></a>
                </div>
                <div class="actions">
                    <a href="{{ route('site.register') }}" class="btn skew_button"><span>BECOME A MEMBER</span></a>
                    <a href="{{ route('site.login') }}" class="btn skew_button"><span>PORTAL LOGIN</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="rules">
        <div class="rules_inner">
            <div class="row g-0">
                {{-- Right Section --}}
                <div class="col-lg-6 p-50">
                    <div class="mb-50">
                        <h1 class="heading"> OBJECT OF THE GAME </h1>
                        <p class="fs-4 fw-bold">Gain as many points as possible by strategically drafting teams and choosing whether they win or lose each game.</p>
                    </div>

                    <div class="mb-50">
                        <h1 class="heading">
                            MEMBER TEAMS ARE COMPRISED OF
                            NFL TEAMS INSTEAD OF PLAYERS
                        </h1>

                        <ul class="fs-4">
                            <li>Each Member will draft against the other members in their group and pick 4
                                teams to use for that quarter. A team can not be drafted by more than one
                                person</li>

                            <li>There are 4 Drafts throughout the season</li>

                            <li>Start Of Season, and start of Q2, Q3, & Q4 of the season</li>

                            <li>Members only use the 4 teams they draft for that part of the season.</li>
                        </ul>
                    </div>

                    <div class="mb-50">
                        <h1 class="heading">SCORING</h1>

                        <ul class="fs-4">
                            <li>Members pick those 4 teams to either win or lose.</li>

                            <li>If picked correctly the member gains (+) 25 points</li>

                            <li>If picked incorrectly the member loses (-) 25 points</li>

                            <li>Bye weeks count as a 0 score. No gain, no loss.</li>

                            <li>Best weekly score would be (+) 100 points</li>
                        </ul>
                    </div>

                    <div class="mb-50">
                        <h1 class="heading">SUBMIT YOUR WEEKLY PICKS</h1>

                        <ul class="fs-4">
                            <li>Weekly pick can be entered begining Wednesday of each week</li>

                            <li>Each Team's picks must be submitted before kick-off of that game</li>

                            <li>If your pick is not submitted in time it will result in a loss of (-)
                                25 points</li>
                        </ul>
                    </div>

                    <div>
                        <h1 class="heading">PRIZE POOLS</h1>
                        <p style="font-size: 12px;">There are many ways to win throughout the season!</p>
                        <ul class="fs-4">
                            <li>Quarterly Payouts per Group of 8</li>
                            <li>End Of Season Payouts per Group of 8</li>
                            <li>End Of Season Payouts per Level</li>
                            <li>Sponsorship Prizes</li>
                            <li>Playoffs will be separate payouts and fees</li>
                        </ul>
                        <p style="font-size: 12px;">Group Prize Pools (Based upon Groups of 8)</p>
                        <ul class="fs-4">
                            <li>Rookie Level : $400</li>
                            <li>Veteran Level : $800</li>
                            <li>Hall Of Famer Level : $2,000</li>
                        </ul>
                        <p style="font-size: 12px;">Level Prize Pools</p>
                        <ul class="fs-4">
                            <li>Will be determined by how many members are in each Level, plus possible sponsorship support</li>
                        </ul>
                    </div>
                </div>

                {{-- Left section --}}
                <div class="col-lg-6 p-50 bg-light">
                    <div class="mb-50">
                        <h1 class="heading">ONE SCORE DOES IT ALL</h1>

                        <ul class="fs-4">
                            <li>There are a lot of ways to win!</li>

                            <li>Each Member's Score will be scored against their group and their level</li>

                            <li class="mb-2 line-height-15">Each Group will have a winner each Quarter <br> <span
                                    class="text-muted fw-normal">Based upon
                                    their
                                    score just for that quarter</span>
                            </li>

                            <li class="mb-2 line-height-15">Each Group and Each Level will have a winner for the Season <br>
                                <span class="text-muted fw-normal">Based upon their cumulative score for the
                                    season</span>
                            </li>

                            <li class="mb-2 line-height-15">Playoffs will be held after the Regular Season <br> <span
                                    class="text-muted fw-normal">These will be determined upon a Member’s ranking at
                                    the end of the Regular Season. Separate Buy-Ins and Payouts will apply.</span></li>

                        </ul>
                    </div>

                    <div class="mb-50">
                        <h1 class="heading">DRAFT</h1>

                        <ul class="fs-4">
                            <li>Each Group can determine when and where they want to do their draft</li>

                            <li>4TeamFantasy will help assist</li>

                            <li>All teams and picks will be done via the 4TeamFantasy website.</li>

                            <li>Drafts incorporate Four Rounds</li>

                            <li>All drafts will be a snake style draft</li>

                            <li>Initial Draft order will be random.</li>

                            <li>Q2-4 will be based on score</li>

                            

                            <ul class="list-style-type-none mt-3">
                                <li class="text-muted fw-normal">RD 1: 8th place to 1st place</li>
                                <li class="text-muted fw-normal">RD 2: 1st to 8th</li>
                                <li class="text-muted fw-normal">RD 3: 8th to 1st</li>
                                <li class="text-muted fw-normal">RD 4: 1st to 8th</li>
                            </ul>

                            <li>If a person cannot be part of the draft an auto-draft will be done for
                                the player</li>

                            <ul class="list-style-type-none mt-3">
                                <li class="text-muted fw-normal">Based upon the 4Team Power rankings</li>
                                <li class="text-muted fw-normal">Will draft from number 20 and work our way up -</li>
                                <li class="text-muted fw-normal">Once done there it will be 21st to worst</li>
                            </ul>

                            <li class="mt-3">4TeamFantasy&copy; consists of Four drafts throughout the season.</li>

                            <li>Beginning of Season</li>
                            <li>After Q1 - After week 5 or TBD</li>
                            <li>After Q2 - After week 9 or TBD</li>
                            <li>After Q3 - After week 14 or TBD</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="game_summary">
        <h1 class="heading text-center mb-5">GENERAL INFORMATION &amp; FAQs</h1>
        <div class="container pt-5">
            <div class="row g-0">
                <div class="col-md-12">
                    <h1 class="heading">What kind of prizes can I win?</h1>
                    <ul class="fs-4 mt-5">
                        <li>Over $10,000 in cash and prizes were paid out during the 2021 Season of FourTeam Fantasy&copy;. Prizes like a 65” 4K TV, concert tickets, and $100 gift cards were provided by our local Home Base Sponsors. SHOUT OUT to our sponsors for the free drinks!</li>
                    </ul>
                    <h1 class="heading mt-5">What is FourTeam Fantasy?</h1>
                    <ul class="fs-4 mt-5">
                        <li>FourTeam Fantasy© is a product of Four Score Entertainment LLC. </li>
                        <li>The FourTeam Fantasy© games and companies are Copyrighted/Trademarked under the ownership of Four Score Entertainment LLC.</li>
                        <li>John Ed. Marchak and Mike Nosker are the Creators and Founding Partners of FourScore Entertainment LLC and all the subsequent games:</li>
                        <li>FourTeamFantasy NFL</li>
                        <li>FourTeamFantasy MLS (in development)</li>
                        <li>FourTeamFantasy NHL  (in development)</li>
                        <li>FourTeamFantasy NBA  (in development)</li>
                        <li>FourTeamFantasy MLB (in development)</li>
                        <li>FourTeamFantasy NCAA (in development)</li>
                    </ul>
                    <h1 class="heading mt-5">How is it Legal?</h1>
                    <ul class="fs-4 mt-5">
                        <li>Fantasy Sports Gambling is legal in the US with the exception of 5 states; Arizona, Iowa, Louisiana, Montana & Washington.</li>
                        <li>Here in Texas, games of chance can happen within a membership club as long as the house does not take a rake from the Game of Play. We charge a membership fee that is separate from any winnings and is used to fund the game. The rest of the Money of Play (after credit card fees) is set aside in a secured savings account and not touched until payouts.</li>
                        <li>Anyone can be a member of the Club, they do not have to live in Texas, as long as they are 21 years of age.</li>
                    </ul>
                    <h1 class="heading mt-5">How long has it been played?</h1>
                    <ul class="fs-4 mt-5">
                        <li>2018 - The game started with a group of 8 players.  (The OGs)</li>
                        <li>2019 - More people wanted to play so we extended it to 32 players (4 groups).</li>
                        <li>2020 - Even more people were interested, so we expanded to 56 players (7 groups) and brought in sponsors to lead the groups.</li>
                        <li>2021 - The company FourScore Entertainment LLC was created and we started the membership process. We ended up with 112 players (14 groups) and started to develop standard ops, game structure, and architecture for a scalable game.</li>
                        <li>2022 - Built out the Web Based Mobile Platform for an easier and better user experience.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('custom_js')
@endsection
