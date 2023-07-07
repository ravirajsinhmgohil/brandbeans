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


<div class="box-content card ">
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
                            <th> Title</th>
                            <th> Category</th>
                            <th> Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($writer as $data)
                        <tr>
                            <td>{!!$data->title !!}</td>
                            <td>{!!$data->category->name !!}</td>
                            <td>
                                <?php
                                $flag = true;
                                foreach ($slugCount as $slugCountData) {
                                    if ($slugCountData->slugId === $data->id) {
                                        $flag = false;
                                    }
                                }
                                ?>

                                @if($flag)
                                <a class="btn btn-primary btn-sm" href="{{ route('design.create') }}/{{$data->id}}/{{$data->categoryId}}">Add Design</a>
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