@extends('layouts.app')
@section('header','Banner')
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
            <h4 class="">Create Offer</h4>
        </div>
        <div class="">
            <a href="{{ route('offer.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('offer.update')}}" enctype="multipart/form-data" class="was-validated" method="post">
            @csrf

            <input type="hidden" name="offerId" value="{{$offer->id}}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" value="{{$offer->title}}" id="title" name="title">
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Photo</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" name="poster">
                    </div>
                    <div class="col-md-4">
                        <label for="image"></label>
                        <img src="{{asset('poster')}}/{{$offer->poster}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="fontSize" class="form-label">Font Size</label>
                <input type="text" value="{{$offer->fontSize}}" class="form-control" id="fontSize" name="fontSize">
            </div>
            <br>

            <div class="mb-3">
                <label for="fontFamily" class="form-label">Font Family</label>
                <input type="text" class="form-control" value="{{$offer->fontFamily}}" id="fontFamily" name="fontFamily">
            </div>
            <br>

            <div class="mb-3">
                <label for="fontColor" class="form-label">Font Color</label>
                <input type="text" class="form-control" value="{{$offer->fontColor}}" id="fontColor" name="fontColor">
            </div>
            <br>

            <div class="mb-3">
                <label for="noOfProduct" class="form-label">Number of Product</label>
                <input type="text" class="form-control" value="{{$offer->noOfProduct}}" id="noOfProduct" name="noOfProduct">
            </div>
            <br>

            <div class="mb-3">
                <label for="posterHeight" class="form-label">Poster Height</label>
                <input type="text" class="form-control" value="{{$offer->posterHeight}}" id="posterHeight" name="posterHeight">
            </div>
            <br>

            <div class="mb-3">
                <label for="posterWidth" class="form-label">Poster Width</label>
                <input type="text" class="form-control" value="{{$offer->posterWidth}}" id="posterWidth" name="posterWidth">
            </div>
            <br>

            <div class="mb-3">
                <label for="titlePositionTop" class="form-label">Title Position Top</label>
                <input type="text" class="form-control" value="{{$offer->titlePositionTop}}" id="titlePositionTop" name="titlePositionTop">
            </div>
            <br>

            <div class="mb-3">
                <label for="titlePositionLeft" class="form-label">Title Position Left</label>
                <input type="text" class="form-control" value="{{$offer->titlePositionLeft}}" id="titlePositionLeft" name="titlePositionLeft">
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