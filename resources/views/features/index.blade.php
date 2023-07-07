@extends('layout.app')

@section('content')
<div class="container pb-5">
    <h1 class="fw-bold text-center mt-5">Features</h1>
    <div class="row mt-5 features1">
        <div class="col-3 feature">
            <div class="justify-content-end">
                <a class="featu" href="#">Your wCard Page</a><br>

                <a class="featu" href="#">About</a><br>

                <a class="featu" href="#">Profile/Cover Photo</a><br>

                <a class="featu" href="#">Social Links</a><br>

                <a class="featu" href="#">Payment Links</a><br>

                <a class="featu" href="#">Action Button</a><br>

                <a class="featu" href="#">Direct Whatsapp Button</a><br>

                <a class="featu" href="#">Education</a><br>

                <a class="featu" href="#">Work Experience</a><br>

                <a class="featu" href="#">Contact Form</a><br>

                <a class="featu" href="#">Portfolio</a><br>

                <a class="featu" href="#">Analytics</a><br>

                <a class="featu" href="#">Easy Share</a><br>

                <a class="featu" href="#">Custom
                    Domain</a>&nbsp;<button type="button" class="btn btn-warning btn-sm justify-content-end">Premium</button><br>

                <a class="featu" href="#">Multiple
                    Cards</a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Hide
                    Branding</a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Add to Home Screen &
                    ..</a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Dark/Light Theme
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Attachment
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Multiple Phone, Email & Links
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Custom Colors
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Introduction Video
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Youtube Channel
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Facebook Chat
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Calendly
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Download & Save Contact
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Unlimited Leads
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>

                <a class="featu" href="#">Tap To share
                </a>&nbsp;<button type="button" class="btn btn-warning btn-sm">Premium</button><br>


            </div>
        </div>
        <div class="col-9">
            <h3 class="mt-4"><span style="color: #F24D79">Your wCard Page</span></h3>
            <p style="font-size: 20px;">A simple, yet professional place to showcase who you are and what you do.</p>
        </div>
    </div>


</div>

<div class="home-banner3 pt-5 pb-5 mt-5">
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
                    <a href="{{ route('pricing.index') }}"><button class="btn btn1 btn-warning mainbtn" type="submit">Start For Free</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end-->
</div>
@endsection