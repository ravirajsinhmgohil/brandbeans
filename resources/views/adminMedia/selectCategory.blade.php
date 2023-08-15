@extends('layouts.app')
@section('header', 'Media')

<style>
    span.select2.select2-container.select2-container--classic {
        width: 100% !important;
    }
</style>
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
                <h4 class="">Media</h4>
            </div>
            {{-- <div class="">
                <a href="{{ route('adminmedia.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            </div> --}}

        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content" style="display: flex; justify-content: center;">
            <div class="container">
                <form action="{{ route('adminmedia.create') }}" method="get">
                    @csrf
                    <select name="category" class="form-control" id="dropdown">
                        <option selected disabled>--select your category--</option>
                        @foreach ($category as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <br>
                    <div class="margin-top-10">
                        <button style="background-color: #002E6E; color:white;" class="btn btn-danger">Add Record</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-content -->
    </div>



@endsection
