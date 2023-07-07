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

@section('header','Campaign')
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
            <h4 class="">My Applied Campaign List</h4>
        </div>
    </div>
    <div class="card-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="cards">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Campaign Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($campaignList as $data)
                                        <tr>
                                            @foreach($data->campaign as $campaign)
                                            <td>{{$campaign->title}}</td>
                                            @endforeach
                                            @if($data->status == "Approved")
                                            <td class="text-success">{{$data->status}}</td>
                                            @else
                                            <td class="text-primary">{{$data->status}}</td>
                                            @endif
                                            <td>
                                                @foreach($data->campaign as $campaign)
                                                @if($data->status == "Approved")
                                                <a class="btn btn-primary btn-sm" href="{{route('brand.campaign.appliersCreate')}}/{{$campaign->id}}/{{$data->userId}}">Add Details</a>
                                                @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


@endsection