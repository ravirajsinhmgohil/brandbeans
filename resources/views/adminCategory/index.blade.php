@extends('layouts.app')

@section('header', 'Category')
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


    <div class="box-content card danger">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Category</h4>
            </div>
            <div class="">
                <a href="{{ route('admincategory.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
                <!-- /.sub-menu -->
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="">

            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admincategory.index') }}" method="get">
                        @csrf
                        <input type="text" placeholder="Find Category..." name="categoryName" class="form-control">
                </div>
                <div class="col-md-4">
                    <button class="btn  btn-violet" type="submit" value="filter" name="submit">Filter</button>
                    <a href="{{ route('admincategory.index') }}" class="btn ">Reset</a>
                </div>
                </form>
            </div>
            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <?php
                                $i = 1;
                                ?>
                                <th> Sr No</th>
                                <th> Category</th>
                                <th> Icon Path</th>
                                <th> Starting Date</th>
                                <th> End Date</th>
                                <th> Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $data)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td> <a href="{{ url('categoryimg') }}/{{ $data->iconPath }}" target="_blank"> <img src="{{ url('categoryimg') }}/{{ $data->iconPath }}" class="img-thumbnail" style="width:50px;height:50px"></a></td>
                                    <td>{{ $data->startDate }}</td>
                                    <td>{{ $data->endDate }}</td>
                                    <td><a class="btn btn-primary btn-sm" href="{{ route('admincategory.edit', $data->id) }}">Edit</a> <a class="btn btn-danger btn-sm" href="{{ route('admincategory.delete', $data->id) }}">Delete</a>
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
