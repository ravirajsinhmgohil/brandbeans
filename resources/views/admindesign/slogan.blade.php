@extends('layouts.app')

@section('header', 'Slogan')
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


    <div class="box-content card">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Slogans</h4>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">
            <div class="bg-light" style="display: flex; justify-content:space-between; padding: 20px; border: 1px solid #dddddd;">

                <form action="{{ route('adminslogan.adminslogan') }}" method="get">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <label for="">
                                Category
                                <select name="category" class="form-control input-sm" width="100%" id="dropdown">
                                    <option selected disabled>--Search By Category Name--</option>
                                    @foreach ($category as $category)
                                        <option>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </label>

                        </div>
                        <div class="col-md-6">
                            <label for="">
                                Enter Name
                                <input type="text" placeholder="Search By User Name" name="userName" class="form-control input-sm">
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit" value="filter" name="submit">Filter</button>
                </form>
                <div class="" style="padding-top: 50px;">
                    <a href="{{ route('adminslogan.adminslogan') }}?type=Approved" id="sp1" class="btn btn-sm btn-success" style="margin-right: 5px;">Approved</a>
                    <a href="{{ route('adminslogan.adminslogan') }}?type=Pending" id="sp2" class="btn btn-sm btn-primary" style="margin-right: 5px;">Pending</a>
                    <a href="{{ route('adminslogan.adminslogan') }}?type=Rejected" id="sp2" class="btn btn-sm btn-danger" style="margin-right: 5px;">Rejected</a>
                    <a href="{{ route('adminslogan.adminslogan') }}" id="sp2" class="btn btn-sm btn-secondary" style="margin-right: 5px;">Reset</a>
                </div>

            </div>
            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Title</th>
                                <th> Category</th>
                                <th> Write By</th>
                                <th> End Date</th>
                                <th> Status</th>
                                <th> Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($writer as $data)
                                <tr>
                                    <td>{!! $data->title !!}</td>
                                    <td>{{ $data->categoryName }}</td>
                                    <td>{{ $data->userName }}</td>
                                    <td>{{ $data->endDate }}</td>
                                    @if ($data->status == 'Pending')
                                        <td class="text-primary"><b>{{ $data->status }}</b></td>
                                    @elseif($data->status == 'Rejected')
                                        <td class="text-danger"><b>{{ $data->status }}</b></td>
                                    @else
                                        <td class="text-success"><b>{{ $data->status }}</b></td>
                                    @endif

                                    @if ($data->status != 'Approved')
                                        <td>
                                            <form action="{{ route('adminslogan.approve') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="slugId" value="{{ $data->id }}">
                                                <button class="btn btn-success btn-sm" name="Approve" value="Approve" type="submit" onclick="return confirm('Do you really want to Approve?')">Approve</button>
                                                <button class="btn btn-danger btn-sm" name="Reject" value="Reject" type="submit" onclick="return confirm('Do you really want to Reject?')">Reject</button>
                                            </form>
                                        </td>
                                    @else
                                        <td><button data-remodal-target="remodal" class="btn btn-sm btn-violet">Change Date</button></td>
                                    @endif
                                </tr>


                                <div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                                    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                                    <div class="remodal-content">
                                        <h2 id="modal1Title">Remodal</h2>
                                        <form action="" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                <span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
                                            </div>
                                    </div>
                                    <button type="sumbit" class="remodal-confirm">OK</button>
                                    </form>
                                    <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
                                </div>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
        <!-- /.card-content -->
    </div>

@endsection
