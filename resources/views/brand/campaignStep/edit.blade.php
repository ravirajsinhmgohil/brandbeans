@extends('layouts.app')
@section('header','Campaign Step')
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
            <h4 class="">Edit Campaign Step</h4>
        </div>
        <div class="">
            <a href="{{ route('brand.campaign.step.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
        </div>
    </div>
    <div class="card-content">

        <form action="{{route('brand.campaign.step.update')}}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf

            <input type="hidden" name="campaignStepId" value="{{$step->id}}">

            <div class="mb-3">
                <label for="campaignId" class="form-label">Campaign</label>
                <select name="campaignId" class="form-control" id="campaignId">
                    <option disabled selected>--Select your Option</option>
                    @foreach($campaign as $campaign)
                    <option value="{{$campaign->id}}" {{ old('campaignId', $step->campaignId) == $campaign->id ? 'selected' : '' }}>{{$campaign->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" value="{{$step->title}}" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <textarea name="detail" id="detail" class="form-control" required>{{$step->detail}}</textarea>
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