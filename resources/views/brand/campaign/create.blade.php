@extends('layouts.app')
@section('header','Campaign')
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
            <h4 class="">Create Campaign</h4>
        </div>
        <div class="">
            <a href="{{ route('brand.campaign.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
        </div>
    </div>
    <div class="card-content">

        <form action="{{route('brand.campaign.store')}}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <textarea name="detail" id="detail" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Photo</label>
                        <div class="row">
                            <div class="col-md-7">
                                <input type="file" onchange="readURL(this,'#img1')" class="form-control" id="image" name="photo" require>
                            </div>
                            <div class="col-md-5">
                                <label for="image"></label>
                                <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:150px;max-height:100px;max-width:150px'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="rule" class="form-label">Rule</label>
                <input type="text" class="form-control" id="rule" name="rule" required>
            </div>

            <div class="mb-3">
                <label for="eligibleCriteria" class="form-label">Eligible Criteria</label>
                <input type="text" class="form-control" id="eligibleCriteria" name="eligibleCriteria" required>
            </div>

            <div class="mb-3">
                <label for="targetGender" class="form-label">Target Gender</label>
                <input type="text" class="form-control" id="targetGender" name="targetGender" required>
            </div>

            <div class="mb-3">
                <label for="targetAgeGroup" class="form-label">Target Age Group</label>
                <input type="text" class="form-control" id="targetAgeGroup" name="targetAgeGroup" required>
            </div>

            <div class="mb-3">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" required>
            </div>

            <div class="mb-3">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate" required>
            </div>

            <div class="mb-3">
                <label for="applyForLastDate" class="form-label">Apply For Last Date</label>
                <input type="date" class="form-control" id="applyForLastDate" name="applyForLastDate" required>
            </div>

            <div class="mb-3">
                <label for="task" class="form-label">Task</label>
                <input type="text" class="form-control" id="task" name="task" required>
            </div>

            <div class="mb-3">
                <label for="maxApplication" class="form-label">Max Application</label>
                <input type="number" class="form-control" id="maxApplication" name="maxApplication" required>
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