@extends('layouts.app1')

@section('content')

<div class="container-fluid mt-5">
    <div class="container">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-warning ico"></i> {{ $message }}</strong>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Oh snap!</strong> {{__('There were some problems with your input')}}.
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1 class="fw-bold text-center">Payment</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="box-content card">
                    <h4 class="box-title" style="background-color: #03acf0;"><i class="fa fa-money ico"></i>Your Payment Details</h4>
                    <div class="card-content">

                        <div class="">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{number_format($razorPayment->amount / 100)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button id="rzp-button1" style="background-color: #002e6e; color: white;" class="btn fs-4">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end-->
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var urls = "/pricing";
        var options = {
            "key": "rzp_test_ksGNEDh4WbYkD6", // Enter the Key ID generated from the Dashboard
            "amount": "{{$razorPayment->amount}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "brandbeans.biz",
            "description": "Test Transaction",
            "image": "{{asset('asset/img/fevicon.png')}}",
            "order_id": "{{$razorPayment->id}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "handler": function(response) {
                window.location.href = urls + '?payment_id'
                // alert(response.razorpay_payment_id);
                // alert(response.razorpay_order_id);
                // alert(response.razorpay_signature)
            },
            "prefill": {
                "name": "{{$user->name}}",
                "email": "{{$user->email}}",
                "contact": "{{$user->mobileno}}"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
    @endsection