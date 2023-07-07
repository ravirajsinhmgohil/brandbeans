@extends('layouts.app')
@section('header','Notification Type deatil')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
            <h4 class="">Create Notification type detail</h4>
        </div>
        <div class="">
            <a href="{{ route('typedetail.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <form action="{{route('typedetail.store')}}" enctype="multipart/form-data" class="was-validated" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Type</label>
                <select name="typeId" class="form-control" id="typeId">
                    <option disabled selected>-- select type --</option>
                    @foreach($type as $type)
                    <option value="{{$type->id}}">{{$type->title}}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Photo</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" name="photo">
                    </div>
                    <div class="col-md-4">
                        <label for="image"></label>
                        <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="photoHeight" class="form-label">Photo Height</label>
                <input type="text" class="form-control" id="photoHeight" name="photoHeight">
            </div>
            <br>
            <div class="mb-3">
                <label for="photoWidth" class="form-label">Photo Width</label>
                <input type="text" class="form-control" id="photoWidth" name="photoWidth">
            </div>
            <br>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <input type="text" class="form-control" id="message" name="message">
            </div>
            <br>
            <div class="mb-3">
                <label for="messageTop" class="form-label">Message Top</label>
                <input type="text" class="form-control" id="messageTop" name="messageTop">
            </div>
            <br>
            <div class="mb-3">
                <label for="messageBottom" class="form-label">Message Bottom</label>
                <input type="text" class="form-control" id="messageBottom" name="messageBottom">
            </div>
            <br>
            <div class="mb-3">
                <label for="messageColor" class="form-label">Message Color</label>
                <input type="text" class="form-control" id="messageColor" name="messageColor">
            </div>
            <br>
            <div class="mb-3">
                <label for="messageFontFamily" class="form-label">Message FontFamily</label>
                <input type="text" class="form-control" id="messageFontFamily" name="messageFontFamily">
            </div>
            <br>
            <div class="mb-3">
                <label for="messageFontSize" class="form-label">Message Font Size</label>
                <input type="text" class="form-control" id="messageFontSize" name="messageFontSize">
            </div>
            <br>
            <div class="mb-3">
                <label for="messageFontSize" class="form-label">Message Font Size</label>
                <input type="text" class="form-control" id="messageFontSize" name="messageFontSize">
            </div>
            <br>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Poster</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" accept='image/*' onchange="readURL(this,'#img2')" class="form-control" id="image" name="poster">
                    </div>
                    <div class="col-md-4">
                        <label for="image"></label>
                        <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img2" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="posterHeight" class="form-label">Poster Height</label>
                <input type="text" class="form-control" id="posterHeight" name="posterHeight">
            </div>
            <br>
            <div class="mb-3">
                <label for="posterWidth" class="form-label">Poster Width</label>
                <input type="text" class="form-control" id="posterWidth" name="posterWidth">
            </div>
            <br>
            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
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