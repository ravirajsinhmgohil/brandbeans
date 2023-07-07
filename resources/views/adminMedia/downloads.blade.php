@extends('layouts.app')
@section('header','Media')
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
            <h4 class="">Media</h4>
        </div>
        <div class="">
            <!-- <a href="{{ route('adminmedia.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a> -->
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <div class="row">

            <div class="col-md-12">
                <div class="row margin-bottom-10">
                    <form action="{{route('admindownload.index')}}">
                        <div class="col-md-6">
                            <b> Start Date</b>
                            <input type="date" class="form-control" name="startDate">
                        </div>
                        <div class="col-md-6">
                            <b> End Date</b>
                            <input type="date" class="form-control" name="endDate">
                        </div>
                </div>
                <button class="btn btn-success" type="submit" name="submit">Filter</button>
                </form>

            </div>

        </div>
        <div class="table-responsive" style="margin-top: 15px;">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Category</th>
                        <th> User Name</th>
                        <th> Date </th>
                        <th> Media </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mymedia as $mymedia)
                    <tr>
                        <td>{{$mymedia->categoryname}}</td>
                        <td>{{$mymedia->username}}</td>
                        <td>{{$mymedia->date}}</td>
                        <td><img src="{{ url('mymedia') }}/{{ $mymedia->media }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- /.card-content -->
</div>

@endsection