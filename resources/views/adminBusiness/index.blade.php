@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Business</h2>
        </div>

    </div>
</div>


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
            <h4 class="">Business</h4>
        </div>
        <div class="">
            <a href="{{route('adminbusiness.create')}}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <div class="table-responsive">

            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Account Name</th>
                        <th> Business Name</th>
                        <th> Detail 1</th>
                        <th> Detail 2</th>
                        <th> Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($business as $business)
                    <tr>
                        <td>{{$business->loginName}}</td>
                        <td>{{$business->businessName}}</td>
                        <td>{{$business->detail1}}</td>
                        <td>{{$business->detail2}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('adminbusiness.edit',$business->id)}}">Edit</a> <a class="btn btn-danger btn-sm" href="{{route('adminbusiness.delete',$business->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.card-content -->
</div>


@endsection