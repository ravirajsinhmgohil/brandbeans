@extends('layouts.app')
@section('header','Subscription Package')
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
            <h4 class="">Edit Subscription Package</h4>
        </div>
        <div class="">
            <a href="{{ route('adminsubscriptionpackage.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('adminsubscriptionpackage.update')}}" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <input type="hidden" name="subpackid" id="id" value="{{$subpack->id}}">
            <div class="mb-3">
                <label for="loginName" class="form-label">Title</label>
                <input type="text" name="title" value="{{$subpack->title}}" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Subscription Type</label>
                <select name="subscriptionType" id="subscriptionType" class="form-control" required>
                    <option selected disabled>--select your option--</option>
                    <option value="Free" @selected($subpack->subscriptionType == 'Free')>Free</option>
                    <option value="Monthly" @selected($subpack->subscriptionType == 'Monthly')>Monthly</option>
                    <option value="Yearly" @selected($subpack->subscriptionType == 'Yearly')>Yearly</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Price Type</label>
                <select name="priceType" id="priceType" class="form-control" required>
                    <option selected disabled>--select your option--</option>
                    <option value="Free" @selected($subpack->priceType == 'Free')>FREE</option>
                    <option value="Paid" @selected($subpack->priceType == 'Paid')>PAID</option>
                </select>
            </div>
            <div id="showPaid" class="myDiv" style="display: none; padding-left: 50px;">
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="text" name="price" value="{{$subpack->price}}" class="form-control" id="price">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Discount</label>
                    <input type="text" name="discount" value="{{$subpack->discount}}" class="form-control" id="discount">
                </div>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Details</label>
                <textarea name="details" id="details" class="form-control" cols="10" rows="5" required>{{$subpack->details}}</textarea>
            </div>
            <br>

            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>


    </div>
    <!-- /.card-content -->
</div>


<script>
    $(document).ready(function() {
        $('#priceType').on('change', function() {
            var demovalue = $(this).val();
            $("div.myDiv").hide();
            $("#show" + demovalue).show();
        });
    });
</script>


@endsection