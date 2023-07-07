@extends('layouts.app')
@section('header','Design')
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


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
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Create Design</h4>
        </div>
    </div>
    <div class="card-content">

        <form action="{{route('design.store')}}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <div class="mb-3">
                <input type="hidden" value="{{$slugId}}" name="slugId">
                <input type="hidden" value="{{$category}}" name="category">
                <label for="mediaType" class="form-label">Media Type</label>
                <select name="mediaType" id="mediaType" class="form-control" required>
                    <option selected disabled>--Select your Media Type--</option>
                    <option value="Photo">Photo</option>
                    <option value="Video">Video</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Source Path</label>
                        <div class="row">
                            <div class="col-md-7">
                                <input type="file" onchange="readURL(this,'#img1')" class="form-control" id="image" name="sourcePath" require>
                            </div>
                            <div class="col-md-5">
                                <label for="image"></label>
                                <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:150px;max-height:100px;max-width:150px'>
                            </div>
                        </div>
                        <div id="warn" style="display: none;">
                            <span class="text-danger h5">Please select video only</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Preview Path</label>
                        <div class="row">
                            <div class="col-md-7">
                                <input type="file" accept='image/*' onchange="readURL(this,'#img')" class="form-control" id="image" name="previewPath" require>
                            </div>
                            <div class="col-md-5">
                                <label for="image"></label>
                                <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img" style='min-height:100px;min-width:150px;max-height:100px;max-width:150px'>
                            </div>
                        </div>
                        <div id="warn2" style="display: none;">
                            <span class="text-danger h5">Please select video thumbnail</span>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>

    </div>
    <!-- /.card-content -->
</div>


<script type="text/javascript">
    $(function() {
        $("#mediaType").change(function() {
            if ($(this).val() == "Video") {
                $("#warn").show();
                $("#warn2").show();
            } else {
                $("#warn").hide();
                $("#warn2").hide();
            }
        });
    });
</script>

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