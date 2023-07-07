@extends('layouts.app')
@section('header','Subscription')
@section('content')

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
            <h4 class="">Create Subscription</h4>
        </div>
        <div class="">
            <a href="{{route('adminsubscription.index')}}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('adminsubscription.store')}}" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <div class="mb-3">
                <label for="loginName" class="form-label">Account Name</label>
                <select name="accountId" class="form-control" id="accountId">
                    <option disabled selected>--select your Option</option>
                    @foreach($account as $account)
                    <option value="{{$account->id}}">{{$account->loginName}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="loginName" class="form-label">Subscription Package</label>
                <select name="subscriptionPackageId" class="form-control" id="subscriptionPackageId">
                    <option disabled selected>--select your Option</option>
                    @foreach($subpack as $subpack)
                    <option value="{{$subpack->id}}">{{$subpack->type}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>


    </div>
    <!-- /.card-content -->
</div>

@endsection