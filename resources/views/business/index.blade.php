@extends('layout.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="container bus1 pt-5 pb-5 mb-5">
                <div class="col">
                    <h2 class="fw-bold text-center"><span>wCard for Enterprises, Businesses, & Agencies </span></h2>
                    <div class=" text-center">
                        <p class="mt-3 fs-4">Are you an individual or a company who represents a large roster of
                            talent, brand clients,<br> small businesses, or properties?</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container bcard">
            <div class="card-group pt-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="fw-bold">Lifetime Membership</h2>
                        <p class="mt-3 fs-5">Are you an individual or a company who represSet up your entire team or
                            organization with enterprise digital business cards. On top of all of our PRO features,
                            you will be able to:</p>
                        <h6 class="fw-bold pt-3">WHAT'S INCLUDED --------------------------------------</h6>
                        <div class="pt-3">
                            <div class="row">
                                <div class="col">
                                    <p><i class="fa fa-check-square" style="color:green">&nbsp;&nbsp;&nbsp;</i>Unlimited
                                        Premium
                                        Cards
                                    </p>
                                    <p><i class="fa fa-check-square" style="color:green">&nbsp;&nbsp;&nbsp;</i>Corporate
                                        Branding
                                    </p>
                                    <p><i class="fa fa-check-square" style="color:green">&nbsp;&nbsp;&nbsp;</i>Onboarding
                                        assistance
                                        and premium support
                                    </p>
                                </div>
                                <div class="col">
                                    <p><i class="fa fa-check-square" style="color:green">&nbsp;&nbsp;&nbsp;</i>Pay
                                        for
                                        all of your accounts with a single invoice
                                    </p>
                                    <p><i class="fa fa-check-square"
                                            style="color:green">&nbsp;&nbsp;&nbsp;</i>Administrative Control with
                                        single
                                        login.
                                    </p>
                                    <p><i class="fa fa-check-square" style="color:green">&nbsp;&nbsp;&nbsp;</i>Pay
                                        As
                                        Per You Use
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card text-center">
                    <div class="card-body" style="padding-top: 150px;">
                        <h5 class="card-title">Volume Based Cost</h5>
                        <button type="button" class="btn btn-primary btn-lg">Contact
                            Sales</button>
                        <p class="card-text"><small class="text-muted">Note: You have to purchase minimum 5
                                cards.</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row home-banner3 pt-5 pb-5 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="fw-bold text-center"><span style="color: #F24D79"> wCard.io </span></h2>
                        <div class=" text-center">
                            <h1 class="fw-bold">One page to share everything.</h1>
                            <p class="mt-4 text-mx-start fs-4">From contact to social links, videos to websites, wCard
                                Pages lets you share all <br>your content in a beautiful one-page website.
                            </p>
                        </div>
                        <div class="col mt-4 text-center">
                            <a href="{{ route('pricing.index') }}"><button class="btn btn1 btn-warning mainbtn"
                                    type="submit">Start For Free</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end-->

        </div>

    </div>



    </div>
@endsection
