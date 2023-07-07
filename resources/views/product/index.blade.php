@extends('layouts.app')
@section('header','Product')
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
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #01B9F1; color:white;">
        <div class="">
            <h4 class="">Product</h4>
        </div>
        <div class="">
            <a href="{{ route('product.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table class="table table-bordered">
                    <tr>
                        <th>Name</th>
                        <th>Points</th>
                        <th>photo</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($product as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->points }}</td>
                        <td><img src="{{ url('product') }}/{{ $product->photo }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                        <td>

                            <a class="btn btn-primary" href="{{ route('product.edit')}}/{{ $product->id }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('product.delete')}}/{{ $product->id }}">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>

    </div>
    <!-- /.card-content -->
</div>

@endsection