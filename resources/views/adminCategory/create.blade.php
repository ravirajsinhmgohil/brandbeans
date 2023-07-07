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
            <h4 class="">Create Category</h4>
        </div>
        <div class="">
            <a href="{{ route('admincategory.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <form action="{{route('admincategory.store')}}" enctype="multipart/form-data" class="was-validated" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name')}}" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Icon Path</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" name="iconPath">
                    </div>
                    <div class="col-md-4">
                        <label for="image"></label>
                        <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                    </div>
                </div>
                <!-- <div class="box-content" style="width: 200px;">
                    <input type="file" id="input-file-now-custom-1" class="dropify" name="iconPath" data-default-file="http://placehold.it/1000x667" />
                </div> -->
            </div>


            <div class="mb-3 form-check ">
                <label>
                    <input type="radio" class="form-check-input" value="isFestival" name="type" id="isFestival">
                    IS Festival</label>
                <label>
                    <input type="radio" class="form-check-input" value="isBusiness" name="type" id="isBusiness">
                    IS Business</label>
            </div>


            <div class="isFestival selectt" style="padding-left: 50px; display: none;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Starting Date</label>
                    <input type="date" style="width: 50%;" id="startDate" class="form-control" aria-describedby="emailHelp" name="startDate">
                    <script>
                        $('#startDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">End Date</label>
                    <input type="date" style="width: 50%;" class="form-control" id="endDate" aria-describedby="emailHelp" name="endDate">
                    <script>
                        $('#endDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
            </div>




            <br>
            <div class="mb-3">
                <label for="sequence" class="form-label">sequence</label>
                <input type="number" class="form-control" id="sequence" value="{{old('sequence')}}" name="sequence">
            </div>
            <br>
            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>




    </div>
    <!-- /.card-content -->
</div>

<script>
    // $(function() {
    //     $("#isFestival").click(function() {
    //         if ($(this).is(":checked")) {
    //             $("#festivaldiv").show();
    //         } else {
    //             $("#festivaldiv").hide();
    //             $("#isBusiness").show();
    //         }
    //     });
    // });

    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".selectt").not(targetBox).hide();
            $(targetBox).show();
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