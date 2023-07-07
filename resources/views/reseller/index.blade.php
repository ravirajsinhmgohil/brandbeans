@extends('layouts.app')

@section('header','Reseller')
@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif




<div class="box-content card">
    <!-- /.box-title -->
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Reseller</h4>
        </div>
        <div class="">
            <a href="{{ route('reseller.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Add</a>
            <!-- /.sub-menu -->
        </div>
    </div>

    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table id="example" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> User Name</th>
                            <th> Email</th>
                            <th> Pin</th>
                            <th> Mobile No</th>
                            <th> Profile Photo</th>
                            <th> Package</th>
                            <th> Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reseller as $reseller)
                        <tr>
                            <td>{{ $reseller->name }}</td>
                            <td>{{ $reseller->username }}</td>
                            <td>{{ $reseller->email }}</td>
                            <td>{{ $reseller->pin }}</td>
                            <td>{{ $reseller->mobileno }}</td>
                            <td><img src="{{ url('profilePhoto') }}/{{ $reseller->profilePhoto }}" alt="" style="height:100px; width: 100px;">
                            </td>
                            <td>{{ $reseller->package }}</td>
                            <td> <a class="btn btn-danger btn-sm" href="{{ route('reseller.delete', $reseller->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    <!-- /.card-content -->
</div>

@endsection