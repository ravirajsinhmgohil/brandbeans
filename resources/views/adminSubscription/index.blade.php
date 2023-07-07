@extends('layouts.app')
@section('header','Subscription')
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
            <h4 class="">User Details</h4>
        </div>
        <div class="">
            <a href="{{route('adminsubscription.create')}}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <a href="{{route('adminsubscription.index')}}?type=free" id="sp1" class="btn btn-sm btn-danger margin-bottom-10">FREE</a>
        <a href="{{route('adminsubscription.index')}}?type=paid" id="sp2" class="btn btn-sm btn-primary margin-bottom-10">PAID</a>
        <div class="table-responsive">
            <?php
            if (isset($_GET['type'])) {
                $type = $_GET['type'];
            } else {
                $type = 'free';
            }
            if ($type === 'paid') {
            ?>
                <h3>Paid User List</h3>
                <table id="example" class="table table-bordered t2">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Mobile Number</th>
                            <th> Package</th>
                            <th> Validity</th>
                            <th> Payment Id</th>
                            <th> Profile Photo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paiduser as $paiduser)
                        <tr>
                            <td>{{$paiduser->name}}</td>
                            <td>{{$paiduser->email}}</td>
                            <td>{{$paiduser->mobileno}}</td>
                            <td>{{$paiduser->package}}</td>
                            <td>{{$paiduser->validity}}</td>
                            <td>{{$paiduser->payment_id}}</td>
                            <td><img src="{{ url('profile') }}/{{ $paiduser->profilePhoto }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <h3>Free User List</h3>
                <table id="example" class="table table-bordered t1">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Mobile Number</th>
                            <th> Profile Photo</th>
                            <th> Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->mobileno}}</td>
                            <td><img src="{{ url('profile') }}/{{ $user->profilePhoto }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
    <!-- /.card-content -->
</div>


@endsection