@extends('layouts.app')
@section('header','Subscription Package')
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
            <h4 class="">Subscription Package</h4>
        </div>
        <div class="">
            <a href="{{ route('adminsubscriptionpackage.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <div class="table-responsive">

            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Title</th>
                        <th> Subscription type</th>
                        <th> Price type</th>
                        <th> Price</th>
                        <th> Discount</th>
                        <th> Details</th>
                        <th> Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subpack as $subpack)
                    <tr>
                        <td>{{$subpack->title}}</td>
                        <td>{{$subpack->subscriptionType}}</td>
                        <td>{{$subpack->priceType}}</td>
                        <td>{{$subpack->price}}</td>
                        <td>{{$subpack->discount}}</td>
                        <td>{{$subpack->details}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('adminsubscriptionpackage.edit',$subpack->id)}}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{route('adminsubscriptionpackage.delete',$subpack->id)}}">Delete</a>
                            <a class="btn btn-info btn-sm" href="{{route('adminsubscriptionpackage.packagedetail',$subpack->id)}}">Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-content -->
</div>



@endsection