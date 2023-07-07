@extends('layouts.app')

@section('header','Designer')
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
            <h4 class="">Approval</h4>
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">



        <form action="{{route('admindesign.designapproveCode')}}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <input type="hidden" name="designId" value="{{$data->id}}">
            <div class="mb-3 text-center">
                <label>Slogan</label><br>
                <span class="h3">{!!$data->Slogan!!}</span>

            </div>
            <div class="row ">
                <div class="col-md-4">
                    Source Path <br>
                    <a href="{{url('designsourceimg')}}/{{$data->sourcePath}}" target="_blank">
                        <img src="{{url('designsourceimg')}}/{{$data->sourcePath}}" style="height: 200px; width: 300px;" alt="image">
                    </a>
                </div>

                <div class="col-md-4">
                    Preview Path <br>
                    <a href="{{url('designpreviewpath')}}/{{$data->previewPath}}" target="_blank">
                        <img src="{{url('designpreviewpath')}}/{{$data->previewPath}}" style="height: 200px; width: 300px;" alt="image">
                    </a>
                </div>
            </div>
            <br>

            <div class="mb-3">
                <label for="title" class="form-label">Designer Name</label> &nbsp;
                <span>{{$data->UserName}}</span>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Category Name</label> &nbsp;
                <span>{{$data->CategoryName}}</span>
            </div>


            <div class="mb-3 form-check ">
                <label>
                    <input type="radio" class="form-check-input" value="isFestival" name="type" id="isFestival">
                    IS Festival</label>
                &nbsp;&nbsp;
                <label>
                    <input type="radio" class="form-check-input" value="today" name="type" id="today">
                    Today's Spacial</label>
            </div>

            <?php

            use Carbon\Carbon;

            $date = Carbon::now()->toDateString();
            $date1 = Carbon::now();
            $date1 = $date1->addDays(1)->toDateString();
            ?>

            <div class="isFestival selectt" style="padding-left: 50px; display: none;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Starting Date</label>
                    <input type="date" style="width: 50%;" id="startDate" value="{{$date}}" class="form-control" aria-describedby="emailHelp" name="startDate">
                    <script>
                        $('#startDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">End Date</label>
                    <input type="date" style="width: 50%;" class="form-control" id="endDate1" aria-describedby="emailHelp" name="endDate">
                    <script>
                        $('#endDate').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
            </div>

            <div class="today selectt" style="padding-left: 50px; display: none;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Starting Date</label>
                    <input type="date" style="width: 50%;" id="startDate1" value="{{$date}}" class="form-control" aria-describedby="emailHelp" name="startDate1">
                    <script>
                        $('#startDate1').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">End Date</label>
                    <input type="date" style="width: 50%;" class="form-control" value="{{$date1}}" id="endDate" aria-describedby="emailHelp" name="endDate1">
                    <script>
                        $('#endDate1').attr('min', new Date().toISOString().split('T')[0])
                    </script>
                </div>
            </div>


            <br>
            <div style="display: flex; justify-content: end;">

                <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Approved</button>
            </div>
        </form>



    </div>
    <!-- /.card-content -->
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<script>
    $(document).ready(function() {
        $('input[type="radio"]').click(function() {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".selectt").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>
@endsection