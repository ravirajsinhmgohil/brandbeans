@extends('layouts.app1')

@section('content')

<style>
    .fs-5 {
        font-size: calc(1.275rem + .3vw) !important;
    }
</style>
<div class="container-fluid mt-5">
    <div class="container">
        <div class="text-center">
            <h1 class="fw-bold">Pricing Plans</h1>
            <p class="mt-3 fw-light">Choose the plan that's good for you and your business.</p>


        </div>


        <div class="card-group mt-3 fs-5">

            @foreach($subpack as $subpack)
            <div class="card bg-light ms-4">
                <div class="card-body">
                    <?php
                    // $price = 0;
                    // $price = (($subpack->price) * ($subpack->discount) / 100);
                    ?>
                    <h3 class="card-title">{{$subpack->title}}</h3>
                    <!-- <h5 class="">₹<del>{{$subpack->price}}</del> / {{$subpack->subscriptionType}}</h5> -->
                    <h5 class="">₹<del>{{$subpack->price}}</del>
                        <?php
                        ?>


                        / {{$subpack->subscriptionType}}</h5>

                    @if($subpack->priceType != "Free")
                    @endif
                    <!-- <p class="mt-2 fw-light h5">1 NFC Smart Card FREE. SAVE 16%</p> -->
                    <div class="text-center">
                        @if($subpack->priceType == "Free")
                        <a href="register"><button type="button" class="btn btn-outline-primary btn-lg mt-2">SIGN
                                UP
                                FREE</button></a>
                        @else
                        <a href="{{route('pricing.payment')}}" class="pay"> <button type="button" class="btn btn-primary btn-lg mt-2">Get Started</button></a>

                        <!-- <a href="#" class="pay"> <button type="button" class="btn btn-primary btn-lg mt-2">Get
                                Started
                                <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="{{$subpack->amount}}" data-button_theme="brand-color" data-buttontext="Get Started" data-name="staging.brandbeans.biz" data-description="Rozerpay" data-image="{{asset('asset/img/fevicon.png')}}" data-prefill.contact="{{$user->mobileno}}" data-prefill.email="{{$user->email}}" data-theme.color="#03ACF0">
                                    </script>

                                </form>
                            </button></a> -->
                        @endif


                        <!-- <form>
                            <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_L5BHqBP3Cc9gCk" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="{{$subpack->amount*100}}" data-button_theme="brand-color" data-buttontext="Get Started" data-name="staging.brandbeans.biz" data-description="Rozerpay" data-image="{{asset('asset/img/fevicon.png')}}" data-auth.username="{{$user->name}}" data-prefill.email="{{$user->email}}" data-theme.color="#03ACF0"> </script>
                        </form> -->
                    </div>
                    <h6 class="card-text mt-3 h4">Best features for this Package.</h6>
                    <p class="card-text"><small class="text-muted">{{$subpack->details}}</small></p>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- end-->

</div>
@endsection