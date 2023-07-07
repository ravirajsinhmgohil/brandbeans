@extends('layouts.app')


@section('header','Account')
@section('content')

<div class="" style="display: flex; justify-content: space-between;">
    <h2 style="align-self: flex-start;">Account</h2>
    <a href="{{ route('adminaccount.create') }}" class="btn btnback btn-sm" style="align-self: flex-end; background-color: #03ACF0; color:white;">Add</a>
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
<div class="table-responsive">
    <table id="example" class="table table-bordered">
        <thead>
            <tr>
                <th> Name</th>
                <th> Email</th>

            </tr>
        </thead>
        <tbody>
            @foreach($account as $account)
            <tr>
                <td>{{$account->name}}</td>
                <td>{{$account->email}}</td>
                <!-- <td><a class="btn btn-primary btn-sm" href="{{route('adminaccount.edit',$account->id)}}">Edit</a> <a class="btn btn-danger btn-sm" href="{{route('adminaccount.delete',$account->id)}}">Delete</a></td> -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection