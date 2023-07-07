@extends('layouts.app')
@section('header','Notification Type')
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
            <h4 class="">Notification Type Details</h4>
        </div>
        <div class="">
            <a href="{{ route('typedetail.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table id="example" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> Type</th>
                            <th> Photo</th>
                            <th> Photo Height</th>
                            <th> Photo Width</th>
                            <th> Message</th>
                            <th> Message Top</th>
                            <th> Message Bottom</th>
                            <th> Message Color</th>
                            <th> Message Font Family</th>
                            <th> Message Font Size</th>
                            <th> Poster</th>
                            <th> Poster Height</th>
                            <th> Poster Width</th>
                            <th> Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typedetail as $typedetail)
                        <tr>
                            <td>{{ $typedetail->title }}</td>
                            <td><img src="{{ url('typedetailphoto') }}/{{ $typedetail->photo }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                            <td>{{ $typedetail->photoHeight }}</td>
                            <td>{{ $typedetail->photoWidth }}</td>
                            <td>{{ $typedetail->message }}</td>
                            <td>{{ $typedetail->messageTop }}</td>
                            <td>{{ $typedetail->messageBottom }}</td>
                            <td>{{ $typedetail->messageColor }}</td>
                            <td>{{ $typedetail->messageFontFamily }}</td>
                            <td>{{ $typedetail->messageFontSize }}</td>
                            <td><img src="{{ url('typedetailposter') }}/{{ $typedetail->poster }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                            <td>{{ $typedetail->posterHeight }}</td>
                            <td>{{ $typedetail->posterWidth }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('typedetail.edit', $typedetail->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('typedetail.delete', $typedetail->id) }}">Delete</a>
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