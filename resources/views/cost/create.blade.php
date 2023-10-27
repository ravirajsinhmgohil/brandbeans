@extends('layouts.app')
@section('header', 'Update Cost')
@section('content')


    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><i class="fa fa-warning ico"></i> {{ $message }}</strong>
        </div>
    @endif



    <div class="box-content card ">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Update Cost </h4>

            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <form action="{{ route('designer-cost.store') }}" method="post">
                @csrf
                @if ($cost)
                    <input type="hidden" name="userId" value="{{ $cost->userId }}">
                    <div class="mb-3">
                        <label for="">Amount:</label>
                        <input type="text" placeholder="Add or Update Amount of the creator.." name="amount" class="form-control" value="{{ $cost->amount }}">
                        @error('amount')
                            <span class="text-danger">Amount Field is required </span>
                        @enderror
                    </div>
                @else
                    <input type="hidden" name="userId" value="{{ request('id') }}">
                    <div class="mb-3">
                        <label for="">Amount:</label>
                        <input type="text" class="form-control" placeholder="Add or Update Amount of the creator.." name="amount">
                        @error('amount')
                            <span class="text-danger">Amount Field is required</span>
                        @enderror
                    </div>
                @endif
                <div class="margin-top-20">
                    <button type="submit" class="btn btn-sm " style="background-color: #002E6E; color:white;">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.card-content -->
    </div>

@endsection
