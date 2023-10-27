@extends('layouts.app')


@section('header', 'Designer')
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
                <h4 class="">Designs</h4>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">
            <div class="" style="display: flex; justify-content:space-between;">

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
                <div class="d-flex justify-content-end">

                    <a href="{{ route('admindesign.admindesign') }}?type=Approved" id="sp1" class="btn btn-sm btn-success" style="margin-right: 5px;">Approved</a>
                    <a href="{{ route('admindesign.admindesign') }}?type=Pending" id="sp2" class="btn btn-sm btn-primary" style="margin-right: 5px;">Pending</a>
                    <a href="{{ route('admindesign.admindesign') }}?type=Rejected" id="sp2" class="btn btn-sm btn-danger" style="margin-right: 5px;">Rejected</a>
                    <a href="{{ route('admindesign.admindesign') }}" id="sp2" class="btn btn-sm btn-secondary" style="margin-right: 5px;">Reset</a>

                </div>
            </div>
            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                {{-- <th> Media Type</th> --}}
                                <th> Category</th>
                                <th> Designed By</th>
                                <th> Slogan</th>
                                {{-- <th> Title</th> --}}
                                <th> Sequence</th>
                                <th> Source Path</th>
                                <th> Preview Path</th>
                                <th> Status</th>
                                <th width="150px"> Option</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($design as $data)
                                <tr>
                                    {{-- <td>{{ $data->mediaType }}</td> --}}
                                    <td>{{ $data->categoryName }}</td>
                                    <td>{{ $data->userName }}</td>
                                    <td class="text-primary">{!! $data->slugName !!}</td>
                                    {{-- <td>{{ $data->title }}</td> --}}
                                    <td>{{ $data->sequence }}</td>


                                    @if ($data->mediaType == 'Photo')
                                        <td><a href="{{ url('designsourceimg') }}/{{ $data->sourcePath }}" target="_blank">
                                                <img src="{{ url('designsourceimg') }}/{{ $data->sourcePath }}" class="img-thumbnail" style="width:50px;height:50px">
                                            </a>
                                        </td>
                                    @else
                                        <td> <video width="300" class="img-thumbnail" height="300" controls>
                                                <source src="{{ url('designsourceimg') }}/{{ $data->sourcePath }}" type="video/mp4">
                                            </video></td>
                                    @endif
                                    <td>
                                        <a href="{{ url('designpreviewpath') }}/{{ $data->previewPath }}" target="_blank">
                                            <img src="{{ url('designpreviewpath') }}/{{ $data->previewPath }}" class="img-thumbnail" style="width:50px;height:50px">
                                    </td>
                                    @if ($data->status == 'Pending')
                                        <td class="text-primary"><b>{{ $data->status }}</b></td>
                                    @elseif($data->status == 'Rejected')
                                        <td class="text-danger"><b>{{ $data->status }}</b></td>
                                    @else
                                        <td class="text-success"><b>{{ $data->status }}</b></td>
                                    @endif

                                    @if ($data->status != 'Approved')
                                        <td>
                                            <a href="{{ route('admindesign.approve') }}/{{ $data->id }}" class="btn btn-success btn-xs" name="Approve" value="Approve">Approve</a>
                                            <form action="{{ route('admindesign.reject') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="designId" value="{{ $data->id }}">
                                                <button class="btn btn-danger btn-xs" name="Reject" value="Reject" type="submit" onclick="return confirm('Do you really want to Reject?')">Reject</button>
                                            </form>
                                        </td>
                                    @endif
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
