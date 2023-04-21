@extends('pages.layout.app')
@section('content')

<main>

    <!-- start page title section -->
    <section class="page-title-section2 bg-img cover-background" data-overlay-dark="5" data-background="assets/miner/img/bg/pricing-bg.jpg">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>Investment Plans</h1>
                </div>
            </div>

        </div>

    </section>
    <!-- end page title section -->

    <section class="price bg-light-gray">
        <div class="container">

            <div class="section-heading">
                <h3>Our Investment Pricing</h3>
            </div>

            <div class="row">

                @foreach($packages as $item)
                <div class="col-lg-4">
                    <div class="item text-center">
                        <div class="type">
                            <span class="icon"><i class="icofont icofont-diamond"></i></span>
                            <h4>{{ $item->name }}</h4>
                        </div>
                        <div class="value">
                            <h3>@convert($item->min_deposit)<span>$</span></h3>
                            <span class="per">Minimum</span>
                        </div>
                        <div class="features">
                            <ul>
                                <li>Starting at $@convert($item->min_deposit)</li>
                                <li>0% Commission</li>
                                <li>{{ $item->daily_interest }}% ROI</li>
                                <li>{{ $item->term_days }} Days(s)</li>
                                <li>Referral Bonus</li>
                            </ul>
                        </div>
                        <div class="order">
                            <a href="{{ route('register') }}" class="butn small"><span>Choose Plan</span></a>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </section>

    <!-- start begin investing section -->
    <section class="position-relative bg-transparent no-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 sm-margin-70px-bottom xs-margin-50px-bottom">
                    <div class="pattern-img position-relative z-index-9">
                        <img src="assets/miner/img/content/signup.jpg" alt="" class="rounded" />
                    </div>
                </div>
                <div class="col-md-10 col-lg-6">

                    <div class="service-design padding-45px-left sm-no-padding-left">
                        <span>What Next?</span>
                        <h3>Begin your wealth journey with us now!</h3>
                        <p>We are inviting you to come onboard the Affluent CoinFX investment platform and begin enjoying outstanding returns on your investment.</p>
                        <div class="display-inline-block vertical-align-middle font-weight-700 font-size18 sm-font-size16 margin-25px-right">Register</div>
                        <div class="display-inline-block vertical-align-middle about-video padding-20px-tb">
                            <a class="video video_btn video_btn-style2 small" href="register.html"><i class="fas fa-play"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- end begin investing section -->


    <!-- special pricing -->
    <section class="price bg-light-gray">
        <div class="container">

            <div class="section-heading">
                <h3>Special Plans</h3>
            </div>

            <div class="row">
                <!-- start table -->
                <div class="col-lg-5 sm-margin-30px-bottom">
                    <div class="item text-center active">
                        <div class="type">
                            <h4>Affluent CoinFX LP</h4>
                        </div>
                        <div class="value">
                            <h3>Custom Pricing</h3>
                            <!-- <span class="per">Minimum</span> -->
                        </div>
                        <div class="features">
                            <ul>
                                <li>Unlimited Amount</li>
                                <li>Protocol Based</li>
                                <li>Custom Duration</li>
                                <li>Investors Only</li>
                            </ul>
                        </div>
                        <p>Our Affluent CoinFX LP fund is one of our funds which gives investors direct profit opportunities.</p>
                        <div class="order">
                            <a href="mailto:support@digitachainx.com" class="butn medium"><span>GET STARTED</span></a>
                        </div>
                    </div>
                </div>
                <!-- end table -->

                <!-- start table -->
                <div class="col-lg-5 sm-margin-30px-bottom">
                    <div class="item text-center active">
                        <div class="type">
                            <h4>Affluent CoinFX 2.0</h4>
                        </div>
                        <div class="value">
                            <h3>Custom Pricing</h3>
                            <!-- <span class="per">Minimum</span> -->
                        </div>
                        <div class="features">
                            <ul>
                                <li>Longterm</li>
                                <li>Protocol Based</li>
                                <li>Custom Duration</li>
                                <li>Investors Only</li>
                            </ul>
                        </div>
                        <p>Our Affluent CoinFX 2.0 is our longterm ecosystem blockchain trust in protocols with our Web 3 partners on 3x scale.</p>
                        <div class="order">
                            <a href="mailto:support@affluent-coinfx.com" class="butn theme medium"><span>GET STARTED</span></a>
                        </div>
                    </div>
                </div>
                <!-- end table -->
            </div>
        </div>
    </section>
    <!-- end special section -->

    <!-- start advice section -->
    <section class="parallax" data-overlay-dark="7" data-background="https://digitachainx.com/assets/miner/img/bg/talk-to-advisor.jpg" id="advice">
        <div class="container text-center">
            <div class="section-heading title-style5 half white">
                <h4>Didn't find the right plan for your financial goals?</h4>
                <p>Talk to one of our investment advisors to create a custom plan for you right away.</p>
            </div>
            <a href="login.html" class="butn theme white-hover" target="_blank"><span>Talk To An Advisor</span></a>
        </div>
    </section>
    <!-- end advice section -->


</main>

@endsection
