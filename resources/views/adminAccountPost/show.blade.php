@extends('layouts.app')
@section('header','User Detail')
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
            <h4 class="">User Detail</h4>
        </div>

    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="row margin-5" style="padding-bottom: 10px;">
            <div class="col-md-3">
                @if($user->profilePhoto)
                <img src="{{url('profile')}}/{{$user->profilePhoto}}" class="img-thumbnail" alt="profile Image" style="height: 200px; width: 200px;">
                @else
                <img src="{{url('asset/img/default.jpg')}}" class="img-thumbnail" alt="profileImage">
                @endif
            </div>
            <div class="col-md-6">
                <h4 style="color: #002e6e;">Name : <span class="text-dark">{{$user->name}}</span></h4>
                <h4 style="color: #002e6e;">Email : <span class="text-dark">{{$user->email}}</span></h4>
                <h4 style="color: #002e6e;">Contact Number : <span class="text-dark">{{$user->mobileno}}</span></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="box-content card danger">
                    <!-- /.box-title -->
                    <div class="" style="padding: 5px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
                        <div class="">
                            <h4 class="">Card Detail</h4>
                        </div>

                    </div>
                    <!-- /.dropdown js__dropdown -->
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-7">
                                <h5 style="color: #002e6e;">Company Name : <span class="text-dark">{{$card->companyname}}</span></h5>
                                <h5 style="color: #002e6e;">Heading : <span class="text-dark">{{$card->heading}}</span></h5>
                                <h5 style="color: #002e6e;">Category : <span class="text-dark">{{$card->categoryName}}</span></h5>
                                <h5 style="color: #002e6e;">City : <span class="text-dark">{{$card->city}}</span></h5>
                                <h5 style="color: #002e6e;">State : <span class="text-dark">{{$card->state}}</span></h5>
                                <h5 style="color: #002e6e;">Year : <span class="text-dark">{{$card->year}}</span></h5>
                                <h5 style="color: #002e6e;">About : <span class="text-dark">{{$card->about}}</span></h5>

                            </div>
                            <div class="col-md-5">
                                @if($card->logo)
                                <img src="{{url('cardlogo')}}/{{$card->logo}}" class="img-fluid" alt="Logo" style="height: 50px; width: 200px;">
                                @else
                                <img src="{{url('asset/img/default.jpg')}}" class="img-thumbnail" alt="logo">
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-content -->
                </div>
            </div>
            <div class="col-md-4">
                <div class="box-content card danger">
                    <!-- /.box-title -->
                    <div class="" style="padding: 5px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
                        <div class="">
                            <h4 class="">Downloaded Post</h4>
                        </div>

                    </div>

                    <div class="card-content">
                        <div class="row">
                            <div class="me-3" style="display: flex; justify-content: end;">
                                Total Downloads : <b>{{$totalDownload}}</b>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($media as $mediaData)
                                    <tr>
                                        <td>{{$mediaData->date}}</td>
                                        <td>{{$mediaData->total}}</td>
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
    <!-- /.card-content -->
</div>


@endsection