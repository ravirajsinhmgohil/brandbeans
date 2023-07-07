@extends('layouts.app')
@section('header','Product')
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
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Edit Product</h4>
        </div>
        <div class="">
            <a href="{{ route('product.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{ route('product.update') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <input type="hidden" name="productId" value="{{$product->id}}">
            <div class="mb-3">
                <label for="loginName" class="form-label">name</label>
                <input type="text" name="name" id="name" value="{{$product->name}}" class=" form-control" required>
            </div>

            <div class="mb-3">
                <label for="loginName" class="form-label">points</label>
                <input type="text" name="points" id="points" value="{{$product->points}}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">photo</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="photo" name="photo">
                    </div>
                    <div class="col-md-4">
                        <label for="image"></label>
                        <img src="{{url('$product->photo')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                </div>
                <!-- <div class="box-content" style="width: 200px;">
                    <input type="file" id="input-file-now-custom-1" class="dropify" name="iconPath" data-default-file="http://placehold.it/1000x667" />
                </div> -->
            </div>

            <div class="text-center my-3">
                <button type="submit" class="btn btnback" style="background-color: #002E6E; color:white;">Submit</button>
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