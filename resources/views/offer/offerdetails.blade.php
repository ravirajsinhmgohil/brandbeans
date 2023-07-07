@extends('layouts.app')
@section('header','Offer Details')
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
            <h4 class="">Add Offer Details</h4>
        </div>
        <div class="">
            <a href="{{ route('offer.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('offer.offerdetailstore')}}" enctype="multipart/form-data" class="was-validated" method="post">
            @csrf

            <input type="hidden" name="offerId" value="{{$offerId}}">
            <div class="mb-3">
                <label for="positionLeft" class="form-label">Position Left</label>
                <input type="text" class="form-control" id="positionLeft" name="positionLeft">
            </div>
            <br>
            <div class="mb-3">
                <label for="positionBottom" class="form-label">Position Bottom</label>
                <input type="text" class="form-control" id="positionBottom" name="positionBottom">
            </div>
            <br>
            <div class="mb-3">
                <label for="imageHeight" class="form-label">Image Height</label>
                <input type="text" class="form-control" id="imageHeight" name="imageHeight">
            </div>
            <br>
            <div class="mb-3">
                <label for="imageWidth" class="form-label">Image Width</label>
                <input type="text" class="form-control" id="imageWidth" name="imageWidth">
            </div>
            <br>

            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>

    </div>
    <div class="container">
        <div class="d-flex justify-content-center">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Position Left</th>
                        <th>Position Bottom</th>
                        <th>Image Height</th>
                        <th>Image Width</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offerData as $offerData)
                    <tr>
                        <td>{{$offerData->positionLeft}}</td>
                        <td>{{$offerData->positionBottom}}</td>
                        <td>{{$offerData->imageHeight}}</td>
                        <td>{{$offerData->imageWidth}}</td>
                        <td>
                            <a href="{{route('offer.offerdetailedit')}}/{{$offerData->id}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{route('offer.offerdetaildelete')}}/{{$offerData->id}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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