@extends('layouts.app')
@section('header','Template Master')
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
            <h4 class="">Edit Template</h4>
        </div>
        <div class="">
            <a href="{{ route('admintemplatemaster.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">



        <form action="{{route('adminTemplateDetail.update')}}" class="was-validated" enctype="multipart/form-data" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <input type="hidden" name="templateDetailId" id="id" value="{{$template->id}}">
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" value="{{$template->title}}" id="title" name="title" require>
            </div>

            <div class="row margin-top-10">
                <div class="col-md-6">
                    <label for="" class="form-label">Icon</label>
                    <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" name="icon" require>
                </div>
                <div class="col-md-6">
                    <label for="image"></label>
                    <img src="{{asset('templateIcon')}}/{{$template->icon}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Bottom</label>
                <input type="text" class="form-control" value="{{$template->bottom}}" id="bottom" name="bottom" require>
            </div>
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Left</label>
                <input type="text" class="form-control" id="left" value="{{$template->left}}" name="left" require>
            </div>
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Height</label>
                <input type="text" class="form-control" id="height" value="{{$template->height}}" name="height" require>
            </div>
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Width</label>
                <input type="text" class="form-control" id="width" value="{{$template->width}}" name="width" require>
            </div>
            <br>
            <div class="mb-3">
                <label for="" class="form-label">Font Size</label>
                <input type="text" class="form-control" id="fontSize" value="{{$template->fontSize}}" name="fontSize" require>
            </div>
            <br>
            <div>
                <label for="textColor" class="form-label">Text Color</label>
                <br>
                <input type="color" class="form-control-color" id="textColor" value="{{$template->textColor}}" name="textColor" require>
            </div>
            <br>
            <div class="text-center">
                <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
            </div>

        </form>


    </div>
    <!-- /.card-content -->
</div>


<script>
    function readURL(input, tgt) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector(tgt).setAttribute("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection