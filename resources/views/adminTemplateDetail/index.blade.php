@extends('layouts.app')
@section('header', 'Template Detail')
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
                <h4 class="">Template Details</h4>
            </div>
            <div class="">
                <!-- <a href="{{ route('adminTemplateDetail.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a> -->
                <!-- /.sub-menu -->
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">


            <form action="{{ route('adminTemplateDetail.store') }}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
                @csrf

                <input type="hidden" name="templateId" value="{{ request('id') }}">

                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <select name="title" id="title" class="form-control">
                        <option selected disabled>Select title</option>
                        <option value="email">Email</option>
                        <option value="location">Location</option>
                        <option value="contact">Contact</option>
                        <option value="website">Website</option>
                    </select>
                </div>

                <div class="row margin-top-10">
                    <div class="col-md-6">
                        <label for="" class="form-label">Icon</label>
                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="icon" name="icon" require>
                    </div>
                    <div class="col-md-6">
                        <label for="image"></label>
                        <img src="{{ url('asset/img/default.jpg') }}" alt="{{ __('main image') }}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Bottom</label>
                    <input type="text" class="form-control" id="bottom" name="bottom" require>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Left</label>
                    <input type="text" class="form-control" id="left" name="left" require>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Height</label>
                    <input type="text" class="form-control" id="height" name="height" require>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Width</label>
                    <input type="text" class="form-control" id="width" name="width" require>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Font Size</label>
                    <input type="text" class="form-control" id="fontSize" name="fontSize" require>
                </div>
                <br>
                <div class="mb-3">
                    <label for="" class="form-label">Text Color</label>
                    <input type="color" class="form-control-color" id="textColor" name="textColor" require>
                </div>
                <br>

                <div class="text-center">
                    <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
                </div>
            </form>

            <br>
            <br>
            <br>

            <div class="table-responsive">
                <table class="table table-bordered" style="margin-top: 15px;">
                    <thead>
                        <tr>
                            <th> Title</th>
                            <th> Icon</th>
                            <th> Bottom</th>
                            <th> Left</th>
                            <th> Height</th>
                            <th> Width</th>
                            <th> Font Size</th>
                            <th> Text Color</th>
                            <th> Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tempDetail as $template)
                            <tr>

                                <td>{{ $template->title }}</td>
                                <td>{{ $template->icon }}</td>
                                <td>{{ $template->bottom }}</td>
                                <td>{{ $template->left }}</td>
                                <td>{{ $template->height }}</td>
                                <td>{{ $template->width }}</td>
                                <td>{{ $template->fontSize }}</td>
                                <td>{{ $template->textColor }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('adminTemplateDetail.edit', $template->id) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('adminTemplateDetail.delete', $template->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-content -->
    </div>
@endsection
