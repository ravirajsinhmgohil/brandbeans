@extends('layouts.app')
@section('header','Coupon')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



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


<div class="box-content card danger">
    <!-- /.box-title -->
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Create Coupon</h4>
        </div>
        <div class="">
            <a href="{{ route('coupon.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('coupon.store')}}" class="was-validated" novalidate method="post" style="margin-top:15px;">
            @csrf

            <div class="mb-3">
                <label for="loginName" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="couponCode" class="form-label">Coupon Code</label>
                <input type="text" name="couponCode" id="couponCode" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Discount</label>
                <input type="number" name="discount" class="form-control" id="discount">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Valid Upto</label>
                <input type="date" name="validUpto" class="form-control" id="validUpto">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Coupon For </label>
                <select name="couponFor" id="couponFor" class="form-control">
                    <option disabled selected>--select package--</option>
                    @foreach($package as $package)
                    <option value="{{$package->id}}">{{$package->title}}</option>
                    @endforeach
                </select>
            </div>

            <br>
            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>

    </div>
    <!-- /.card-content -->
</div>

@endsection