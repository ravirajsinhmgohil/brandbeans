@extends('layouts.app')
@section('header','Media Campaign')
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
            <h4 class="">Add Media</h4>
        </div>
        <div class="">
            <a href="{{ route('brand.campaign.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
        </div>
    </div>
    <div class="card-content">

        <form action="{{route('brand.campaign.appliersCreateStore')}}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <input type="hidden" name="campaignId" value="{{$appliers->campaignId}}">
            <input type="hidden" name="userId" value="{{$appliers->userId}}">

            <label for="exampleInputPassword1" class="form-label">Media Type</label>
            <select name="fileType" class="form-control" id="fileType">
                <option disabled selected>--Select your option--</option>
                <option>Photo</option>
                <option>Video</option>
            </select>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Media</label>
                        <div class="row">
                            <div class="col-md-7">
                                <input type="file" onchange="readURL(this,'#img1')" class="form-control" id="image" name="file" require>
                            </div>
                            <span></span>
                            <div class="col-md-5">
                                <label for="image"></label>
                                <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:150px;max-height:100px;max-width:150px'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br>
            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>


        <h3>Media </h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkApplyData as $image)

                <tr>
                    <td>@if($image->fileType == "Photo")
                        <img class="mt-3" src="{{ asset('checkApplyFile/' . $image->file) }}" alt="" style="height: 150px; width: 150px; border:8px solid white; box-shadow: 2px 2px 2px 2px lightblue; margin-left: 50px;">
                        @else
                        <video width="200" height="150" controls>
                            <source src="{{ asset('checkApplyFile/' . $image->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        @endif
                    </td>
                    <td>{{$image->fileType}}</td>
                    @if($image->status == "Approved")
                    <td class="text-success">{{$image->status}}</td>
                    @endif
                    @if($image->status == "Rejected")
                    <td class="text-danger">{{$image->status}}</td>
                    @endif
                    @if($image->status == "Pending")
                    <td class="text-primary">{{$image->status}}</td>
                    @endif
                    <td><a class="fs-5 btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{ Route('photo.delete') }}/{{ $image->id }}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>


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