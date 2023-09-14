@extends('layouts.app')
@section('header', 'Designer Report')
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
            <strong>Oh snap!</strong> {{ __('There were some problems with your input') }}.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="box-content card ">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Designer Report </h4>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <strong>
                Name = {{ $data->name }}
                <br>
                Email = {{ $data->email }}
                <br>
                Contact Number = {{ $data->mobileno }}
                <br>
                total Designs = {{ $totalDesigns }}
                <br>
                Approved Designs = {{ $approvedDesigns }}
                <br>
                Rejected Designs = {{ $rejectedDesigns }}
                <br>
                Pending Designs = {{ $pendingDesigns }}
            </strong>


        </div>
        <!-- /.card-content -->
    </div>

@endsection
