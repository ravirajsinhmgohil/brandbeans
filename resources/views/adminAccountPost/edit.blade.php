@extends('layouts.app')
@section('header','Account Post')
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
            <h4 class="">Edit Account Post</h4>
        </div>
        <div class="">
            <a href="{{ route('accountpost.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('accountpost.update')}}" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <input type="hidden" name="accountpostid" id="id" value="{{$accountpost->id}}">
            <div class="mb-3">
                <label for="" class="form-label">Account Name</label>
                <select class="form-control" name="accountId" id="accountId">
                    <option selected disabled>--select Account Name</option>
                    @foreach($account as $account)
                    <option value="{{$account->id}}">{{$account->loginName}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Business Name</label>
                <select class="form-control" name="businessId" id="businessId">
                    <option selected disabled>--select Business Name</option>
                    @foreach($business as $business)
                    <option value="{{$business->id}}">{{$business->businessName}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Media Type</label>
                <select class="form-control" name="mediaId" id="mediaId">
                    <option selected disabled>--select Media Type</option>
                    @foreach($media as $media)
                    <option value="{{$media->id}}">{{$media->mediaType}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>


    </div>
    <!-- /.card-content -->
</div>



@endsection