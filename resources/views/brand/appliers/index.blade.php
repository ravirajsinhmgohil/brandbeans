@extends('layouts.app')

@section('header','Appliers')
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
            <h4 class="">Appliers</h4>
        </div>
    </div>
    <div class="card-content">
        <div class="table-responsive">
            <div class="table-responsive" style="margin-top: 15px;">
                <form action="" method="get">
                    <div style="display: flex; justify-content: end; padding: 20px;">
                        @csrf
                        <select class="form-control" style="width: 25%;" name="filter" id="filter">
                            <option disabled selected> --Select Filter-- </option>
                            <option>Approved</option>
                            <option>On Hold</option>
                            <option>Rejected</option>
                        </select>
                        <button class="btn btn-sm btn-violet" style="margin-left: 5px;">Filter</button>
                        <a href="{{route('brand.campaign.appliers')}}" class="btn btn-sm btn-default" style="margin-left: 5px;"><i class="menu-icon fa fa-refresh text-dark fa-lg"></i></a>
                </form>
            </div>

            <table id="" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th> Campaign Name</th>
                        <th> Applier</th>
                        <th> Status</th>
                        <th style="width: 10px;"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appliers as $data)
                    <tr>
                        <td>
                            {{$data->title}}
                        </td>
                        <td>
                            {{$data->name }}
                        </td>
                        <td>{{$data->status }}</td>

                        <td style="display:flex; justify-content:end;">
                            <a class="btn btn-success btn-xs" style="margin-left: 8px;" title="Approve" href="{{route('brand.campaign.influencerApproval')}}/{{$data->campaignId}}/{{$data->userId}}" onclick="return confirm('Are you sure?')"><i class="menu-icon fa fa-check-circle-o text-white fa-lg"></i></a>
                            <a class="btn btn-warning btn-xs" style="margin-left: 8px;" title="On Hold" href="{{route('brand.campaign.influencerOnHold')}}/{{$data->campaignId}}/{{$data->userId}}"><i class="menu-icon fa fa-pause text-white fa-lg"></i></a>
                            <a class="btn btn-danger btn-xs" style="margin-left: 8px;" title="Reject" href="{{route('brand.campaign.influencerReject')}}/{{$data->campaignId}}/{{$data->userId}}" onclick="return confirm('Are you sure?')"><i class="menu-icon fa fa-close text-white fa-lg"></i></a>
                            <a class="btn btn-info btn-xs" style="margin-left: 8px;" title="View influencer Detail" href="{{route('brand.campaign.influencerDetail')}}/{{$data->campaignId}}/{{$data->userId}}"><i class="menu-icon fa fa-info text-white fa-lg"></i></a>
                            @if($data->status == "Approved")
                            <a class="btn btn-primary btn-xs" title="View Post" style="margin-left: 8px;" href="{{route('brand.campaign.influencerPortfolio')}}/{{$data->campaignId}}/{{$data->userId}}"><i class="menu-icon fa fa-eye text-white fa-lg"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


@endsection