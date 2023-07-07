@extends('layouts.app')

@section('header','Designer')
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
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Slogans</h4>
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="d-flex justify-content-end" style="display: flex; justify-content:end;">

            <a href="{{route('admindesign.admindesign')}}?type=Approved" id="sp1" class="btn btn-sm btn-success" style="margin-right: 5px;">Approved</a>
            <a href="{{route('admindesign.admindesign')}}?type=Pending" id="sp2" class="btn btn-sm btn-primary" style="margin-right: 5px;">Pending</a>
            <a href="{{route('admindesign.admindesign')}}?type=Rejected" id="sp2" class="btn btn-sm btn-danger" style="margin-right: 5px;">Rejected</a>
            <a href="{{route('admindesign.admindesign')}}" id="sp2" class="btn btn-sm btn-secondary" style="margin-right: 5px;">Reset</a>

        </div>
        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table id="example" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> Media Type</th>
                            <th> Category</th>
                            <th> Designed By</th>
                            <th> Slogan</th>
                            <th> Title</th>
                            <th> Sequence</th>
                            <th> Source Path</th>
                            <th> Preview Path</th>
                            <th> Status</th>
                            <th> Option</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($design as $data)
                        <tr>
                            <td>{{ $data->mediaType }}</td>
                            <td>{{ $data->categoryName }}</td>
                            <td>{{ $data->userName }}</td>
                            <td class="text-primary">{!! $data->slugName !!}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->sequence }}</td>
                            <td><a href="{{ url('designsourceimg') }}/{{ $data->sourcePath }}" target="_blank">
                                    <img src="{{ url('designsourceimg') }}/{{ $data->sourcePath }}" class="img-thumbnail" style="width:50px;height:50px">
                                </a></td>
                            <td>
                                <a href="{{ url('designpreviewpath') }}/{{ $data->previewPath }}" target="_blank">
                                    <img src="{{ url('designpreviewpath') }}/{{ $data->previewPath }}" class="img-thumbnail" style="width:50px;height:50px">
                            </td>
                            @if($data->status == "Pending")
                            <td class="text-primary"><b>{{ $data->status }}</b></td>
                            @elseif($data->status == "Rejected")
                            <td class="text-danger"><b>{{ $data->status }}</b></td>
                            @else
                            <td class="text-success"><b>{{ $data->status }}</b></td>
                            @endif

                            @if($data->status != "Approved")
                            <td>
                                <a href="{{route('admindesign.approve')}}/{{$data->id}}" class="btn btn-success btn-sm" name="Approve" value="Approve">Approve</a>
                                <form action="{{route('admindesign.reject')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="designId" value="{{$data->id}}">
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