@extends('layouts.app')
@section('header', 'Media')
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
                <h4 class="">Media</h4>
            </div>
            <div class="">
                <!-- <a href="{{ route('adminmedia.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a> -->
                <!-- /.sub-menu -->
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">
            <div class="row">

                <div class="col-md-12">
                    <div class="row margin-bottom-10">
                        <form action="{{ route('admindownload.index') }}">
                            <div class="col-md-6 ">
                                <b> Start Date</b>
                                <input type="date" class="form-control input-sm" name="startDate">
                            </div>
                            <div class="col-md-6">
                                <b> End Date</b>
                                <input type="date" class="form-control input-sm" name="endDate">
                            </div>
                            <div class="col-md-6">
                                <b> Category</b>
                                <select name="category" class="form-control input-sm" width="100%" id="dropdown">
                                    <option selected disabled>--Search By Category Name--</option>
                                    @foreach ($category as $category)
                                        <option>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <b> User Name</b>
                                <input type="text" name="name" class="form-control input-sm" placeholder="Search by User Name">
                            </div>
                    </div>
                    <button class="btn btn-success" type="submit" value="filter" name="submit">Filter</button>
                    <a href="{{ route('admindownload.index') }}" class="btn btn-danger">Reset</a>
                    </form>

                </div>

            </div>
            <div class="table-responsive" style="margin-top: 15px;">
                <table id="" class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Category</th>
                            <th> User Name</th>
                            <th> Date </th>
                            <th> Package </th>
                            <th> Media </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mymedia as $mymediaData)
                            <tr>
                                <td>{{ $mymediaData->categoryname }}</td>
                                <td>{{ $mymediaData->username }}</td>
                                <td>{{ $mymediaData->date }}</td>
                                <td>{{ $mymediaData->package }}</td>
                                <td> <a href="{{ url('mymedia') }}/{{ $mymediaData->media }}" target="_blank"> <img src="{{ url('mymedia') }}/{{ $mymediaData->media }}" class="img-thumbnail" style="width:50px;height:50px"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card-content -->
    </div>

@endsection
