@extends('layouts.app')

<style>
    .cards {
        margin: 10px;
        padding: 10px;
        background-color: white;
        border-radius: 10px;
        border: 1px solid rgba(00, 00, 00, 0.2);
    }
</style>

@section('header','Brands')
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


<div class="box-content card ">

    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">
                {{$profile->profile->name}}
                @if($profile->is_brandBeansVerified == "on")
                <i class="menu-icon fa fa-check-circle text-white" style="margin-left: 5px;"></i>
                @endif
            </h4>
        </div>
        <div class="">
            <a class="btn btn-sm btn-success" href="{{route('brand.campaign.influencerApproval')}}/{{request('campaignId')}}/{{$profile->userId}}" onclick="return confirm('Are you sure?')">Approved</a>
            <a class="btn btn-sm btn-warning" href="{{route('brand.campaign.influencerOnHold')}}/{{request('campaignId')}}/{{$profile->userId}}">On Hold</a>
            <a class="btn btn-sm btn-danger" href="{{route('brand.campaign.influencerReject')}}/{{request('campaignId')}}/{{$profile->userId}}" onclick="return confirm('Are you sure?')">Reject</a>
        </div>
    </div>
    <div class="card-content">
        <div class="container-fluid">
            <div class="cards">
                <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; ">
                    <div class="">
                        <h4 class="">
                            Personal Information
                        </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            @if($profile->profile->profilePhoto)
                            <img class="img-thumbnail" style=" height: 150px; width: 150px;" src="{{asset('profile')}}/{{$profile->profile->profilePhoto}}" alt="image">
                            @else
                            <img class="img-thumbnail" style=" height: 150px; width: 150px;" src="{{url('asset/img/defaultImage.jpg')}}" alt="image"><br> <br>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <h5 class="card-title"><b>Email : </b>{{$profile->profile->email}}</h5>
                            <h6 class="card-subtitle mb-2 "><b>Contact Number : </b>{{$profile->profile->mobileno}}</h6>
                            <h6 class="card-subtitle mb-2 "><b>Category Name : </b>{{$profile->category->name}}</h6>
                            <h6 class="card-subtitle mb-2 "><b>Address : </b>{{$profile->address}}</h6>
                            <h6 class="card-subtitle mb-2 "><b>Brand Beans Verified : </b>
                                @if($profile->is_brandBeansVerified == "on")
                                <i class="menu-icon fa fa-check-circle text-success"></i>
                                @else
                                <i class="menu-icon fa fa-close text-danger"></i>
                                @endif
                            </h6>

                            <h6 class="card-subtitle mb-2 "><b>Trending : </b>
                                @if($profile->is_trending == "on")
                                <i class="menu-icon fa fa-check-circle text-success"></i>
                                @else
                                <i class="menu-icon fa fa-close text-danger"></i>
                                @endif
                            </h6>

                            <h6 class="card-subtitle mb-2 "><b>Featured : </b>
                                @if($profile->is_featured == "on")
                                <i class="menu-icon fa fa-check-circle text-success"></i>
                                @else
                                <i class="menu-icon fa fa-close text-danger"></i>
                                @endif
                            </h6>

                            <h6 class="card-subtitle mb-2 "><b>Status : </b>
                                @if($profile->status == "Active")
                                <span class="text-success">{{$profile->status}}</span>
                                @else
                                <span class="text-danger">{{$profile->status}}</span>
                                @endif
                            </h6>
                        </div>
                    </div>
                </div>

                <!-- modal -->
            </div>


            <!-- portfolio of influencer -->

            <div class="cards">
                <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; ">
                    <div class="">
                        <h4 class="">
                            Portfolio
                        </h4>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">

                        @foreach($portfolio as $data)
                        <div class="col-md-3">
                            <img class="img-thumbnail" style=" height: 200px; width: 200px;" src="{{asset('portfolioPhoto')}}/{{$data->photo}}" alt="image">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection