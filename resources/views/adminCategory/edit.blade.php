@extends('layouts.app')

@section('header','Category')
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
            <h4 class="">Edit Account Post</h4>
        </div>
        <div class="">
            <a href="{{ route('admincategory.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('admincategory.update')}}" enctype="multipart/form-data" class="was-validated" method="post" novalidate>
            @csrf
            <input type="hidden" value="{{$category->id}}" name="id">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Icon Path</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" name="iconPath" require>
                    </div>
                    <div class="col-md-4">
                        <label for="image"></label>
                        {{-- "/storage/images/{{ $profile->images }}" --}}
                        <img src="/categoryimg/{{$category->iconPath}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                </div>

            </div>

            @if($category->isFestival=="yes")

            <div class="mb-3 form-check">
                <label>
                    <input type="radio" class="form-check-input" checked value="yes" name="type" id="isFestival">
                    isFestival</label>
            </div>
            <div id="festivaldiv ps-3">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Starting Date</label>
                    <input type="date" id="startDate" class="form-control" aria-describedby="emailHelp" name="startDate" required>
                    <script>
                        $('#startDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" aria-describedby="emailHelp" name="endDate" required>
                    <script>
                        $('#endDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
            </div>


            @else
            <div class="mb-3 form-check">
                <label>
                    <input type="radio" class="form-check-input" value="yes" name="type" id="isFestival">
                    IS Festival</label>
            </div>

            <div class="festivaldiv  ps-3">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Starting Date</label>
                    <input type="date" id="startDate" class="form-control" aria-describedby="emailHelp" name="startDate" required>
                    <script>
                        $('#startDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">End Date</label>
                    <input type="date" class="form-control" id="endDate" aria-describedby="emailHelp" name="endDate" required>
                    <script>
                        $('#endDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
            </div>

            @endif


            <br>
            @if($category->isBusiness=="yes")

            <div class="mb-3 form-check" id="isBusiness">
                <label>
                    <input type="radio" class="form-check-input" checked value="yes" name="type" id="exampleCheck1">
                    IS Business</label>
            </div>
            @else
            <div class="mb-3 form-check" id="isBusiness">
                <label>
                    <input type="radio" class="form-check-input" value="yes" name="type" id="exampleCheck1">
                    IS Business</label>
            </div>

            @endif


            <div class="mb-3">
                <label for="sequence" class="form-label">sequence</label>
                <input type="number" class="form-control" value="{{$category->sequence}}" id="sequence" name="sequence">
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

<script>
    $(function() {
        $("#isFestival").click(function() {
            if ($(this).is(":checked")) {
                $("#festivaldiv").show();
            } else {
                $("#festivaldiv").hide();
                $("#isBusiness").show();
            }
        });
    });
</script>



@endsection