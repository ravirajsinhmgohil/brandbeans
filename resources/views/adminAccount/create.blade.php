@extends('layouts.app')

@section('header','Account')
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
            <h4 class="">Create Account</h4>
        </div>
        <div class="">
            <a href="{{ route('adminaccount.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <form action="{{route('adminaccount.store')}}" method="post" style="margin-top: 15PX;">
            @csrf
            <div class="mb-3">
                <label for="loginName" class="form-label">Name</label>
                <input type="text" class="form-control" id="loginName" name="loginName" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>

            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" value="yes" id="isCompany" name="isCompany">
                <label class="form-check-label" for="isCompany">IS Company</label>
            </div>

            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>
    </div>
    <!-- /.card-content -->
</div>

@endsection