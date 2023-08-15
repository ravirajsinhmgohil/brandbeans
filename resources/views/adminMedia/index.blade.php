@extends('layouts.app')
@section('header','Media')

<style>
    .select2.select2-container.select2-container--classic {
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
            <h4 class="">Media</h4>
        </div>
        <div class="">
            <a href="{{ route('adminmedia.selectCategory') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <form action="{{route('adminmedia.index')}}" method="get">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <select name="category" class="form-control " width="100%" id="dropdown">
                    <option selected disabled>--Search By Category Name--</option>
                    @foreach($category as $category)
                    <option>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="title" placeholder="Search by Title" class="form-control input-sm">
            </div>
            <div class="col-md-12" style="display: flex; justify-content: end; padding-right: 200px; padding-top:10px"  >
                <button class="btn btn-sm btn-success" style="margin-right: 5px" value="filter" name="submit">Filter</button>
                <a href="{{route('adminmedia.index')}}" class="btn btn-sm btn-danger">Reset</a>
            </div>
        </div>

        </form>
        <div class="table-responsive" style="margin-top: 15px;">
            <table id="" class="table table-bordered">
                <thead>
                    <tr>
                        <?php
                        $i = 1;
                        ?>
                        <th> Sr No</th>
                        <th> Media Type</th>
                        <th> Category</th>
                        <th> Source Path</th>
                        <th> Is Premium </th>
                        <th> Title</th>
                        <th> Preview Path</th>
                        <th> Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($media as $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $data->mediaType }}</td>
                        <td>{{ $data->name }}</td>
                        @if($data->mediaType != "Video")
                        <td> <a href="{{ url('mediasourceimg') }}/{{ $data->sourcePath }}" target="_blank"> <img src="{{ url('mediasourceimg') }}/{{ $data->sourcePath }}" class="img-thumbnail" style="width:50px;height:50px"></a></td>
                        @else
                        <td><video height="100px" controls>
                                <source src="{{ url('mediasourceimg') }}/{{{ $data->sourcePath }}}" type="video/mp4">
                            </video></td>
                        @endif
                        <td>{{ $data->isPremium }}</td>
                        <td>{{ $data->title }}</td>
                        <td> <a href="{{ url('mediapreviewimg') }}/{{ $data->previewPath }}" target="_blank"> <img src="{{ url('mediapreviewimg') }}/{{ $data->previewPath }}" class="img-thumbnail" style="width:50px;height:50px"></a></td>
                        <td><a class="btn btn-primary btn-sm" href="{{ route('adminmedia.edit', $data->id) }}">Edit</a> <a class="btn btn-danger btn-sm" href="{{ route('adminmedia.delete', $data->id) }}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- {!! $media->withQueryString()->links('pagination::bootstrap-5') !!} -->
            {!! $media->links() !!}

        </div>

    </div>
    <!-- /.card-content -->
</div>



@endsection