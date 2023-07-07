@extends('layouts.app')

@section('header','Slogan')
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


<div class="box-content card">
    <!-- /.box-title -->
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Slogans</h4>
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <div class="d-flex justify-content-end" style="display: flex; justify-content:end;">

            <a href="{{route('adminslogan.adminslogan')}}?type=Approved" id="sp1" class="btn btn-sm btn-success" style="margin-right: 5px;">Approved</a>
            <a href="{{route('adminslogan.adminslogan')}}?type=Pending" id="sp2" class="btn btn-sm btn-primary" style="margin-right: 5px;">Pending</a>
            <a href="{{route('adminslogan.adminslogan')}}?type=Rejected" id="sp2" class="btn btn-sm btn-danger" style="margin-right: 5px;">Rejected</a>
            <a href="{{route('adminslogan.adminslogan')}}" id="sp2" class="btn btn-sm btn-secondary" style="margin-right: 5px;">Reset</a>

        </div>
        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table id="example" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> Title</th>
                            <th> Category</th>
                            <th> Write By</th>
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
                            @if($data->status == "Pending")
                            <td class="text-primary"><b>{{ $data->status }}</b></td>
                            @elseif($data->status == "Rejected")
                            <td class="text-danger"><b>{{ $data->status }}</b></td>
                            @else
                            <td class="text-success"><b>{{ $data->status }}</b></td>
                            @endif

                            @if($data->status != "Approved")
                            <td>
                                <form action="{{route('adminslogan.approve')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="slugId" value="{{$data->id}}">
                                    <button class="btn btn-success btn-sm" name="Approve" value="Approve" type="submit" onclick="return confirm('Do you really want to Approve?')">Approve</button>
                                    <button class="btn btn-danger btn-sm" name="Reject" value="Reject" type="submit" onclick="return confirm('Do you really want to Reject?')">Reject</button>
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