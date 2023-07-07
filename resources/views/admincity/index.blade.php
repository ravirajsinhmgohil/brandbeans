@extends('layouts.app')
@section('header','City')
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
            <h4 class="">City</h4>
        </div>
        <div class="">
            <a href="{{ route('admincity.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="table-responsive">

            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th> City Name</th>
                        <th> State Name</th>
                        <th> Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($city as $city)

                    <tr>
                        <td>{{$city->city}}</td>
                        <td>{{$city->sname}}</td>


                        <td><a href="{{route('admincity.edit')}}/{{$city->id}}" class="btn btn-primary btn-sm">Edit</a>
                            <a href="{{route('admincity.delete')}}/{{$city->id}}" class="btn btn-danger btn-sm">Delete</a>
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