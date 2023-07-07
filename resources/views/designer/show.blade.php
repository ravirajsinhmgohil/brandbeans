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


<div class="box-content card">
    <!-- /.box-title -->
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Slogans</h4>
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table id="example" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> Media Type</th>
                            <th> Category</th>
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
                            <td>{!! $data->slugName !!}</td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->sequence }}</td>

                            <td><img src="{{ url('designsourceimg') }}/{{ $data->sourcePath }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                            <td><img src="{{ url('designpreviewpath') }}/{{ $data->previewPath }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                            @if($data->status == "Pending")
                            <td class="text-primary"><b>{{ $data->status }}</b></td>
                            @elseif($data->status == "Rejected")
                            <td class="text-danger"><b>{{ $data->status }}</b></td>
                            @else
                            <td class="text-success"><b>{{ $data->status }}</b></td>
                            @endif

                            <td>
                                @if($data->status != "Approved")
                                <a class="btn btn-primary btn-sm" href="{{route('design.edit')}}/{{$data->id}}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{route('design.delete')}}/{{$data->id}}">Delete</a>
                                @endif
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