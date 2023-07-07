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
                    <h4 class="box-title" style="background-color: #03acf0;"><i class="fa fa-money ico"></i>Add Your Payment Details</h4>
                    <div class="card-content">

                        <div class="">
                            <form class="form" action="{{route('razorpay.payment.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <label for="formFile" class="form-label fs-4">Amount</label>
                                <input class="form-control fs-4" type="number" id="amount" value="" name="amount"><br>

                                <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-4">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end-->

    </div>
    @endsection