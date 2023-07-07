@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Business Details</h2>
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
            <h4 class="">Edit Business</h4>
        </div>
        <div class="">
            <a href="" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('adminbusiness.update')}}" class="was-validated" novalidate method="post">
            @csrf
            <input type="hidden" name="businessid" id="id" value="{{$business->id}}">
            <div class="mb-3">
                <label for="loginName" class="form-label">Account Name</label>

                <select name="accountId" class="form-control" id="accountId">
                    <option hidden disabled>-- Select Your Option --</option>
                    @foreach($account as $account)
                    <option value="{{$account->id}}">{{$account->loginName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="businessName" class="form-label">Business Name</label>
                <input type="text" class="form-control" id="businessName" value="{{$business->businessName}}" name="businessName" required>
            </div>
            <div class="mb-3">
                <label for="detail1" class="form-label">Detail 1</label>
                <textarea type="detail1" class="form-control" id="detail1" name="detail1" required>{{$business->detail1}}</textarea>
            </div>
            <div class="mb-3">
                <label for="detail2" class="form-label">Detail 2</label>
                <textarea type="detail2" class="form-control" id="detail2" name="detail2" required>{{$business->detail2}}</textarea>
            </div>

            <button type="submit" class="btn btnback btn-sm">Submit</button>
        </form>

    </div>
    <!-- /.card-content -->
</div>





@endsection