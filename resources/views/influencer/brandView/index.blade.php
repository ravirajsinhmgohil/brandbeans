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
            <h4 class="">Brands</h4>
        </div>
    </div>
    <div class="card-content">
        <div class="container-fluid">
            <div class="row">

                @foreach($brand as $data)
                <div class="col-md-4">

                    <div class="cards">
                        <div class="card-body">
                            <h5 class="card-title"> {{$data->name }}
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted"> {{$data->email }}
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{$data->mobileno }}
                            </h6>
                            <a href="{{route('influencer.campaignView')}}/{{$data->brand->userId}}" class="btn btn-sm btn-success">View Campaign</a>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>


@endsection