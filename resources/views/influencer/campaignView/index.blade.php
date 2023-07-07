@extends('layouts.app')

<style>
    .cards {
        margin: 10px;
        padding: 10px;
        background-color: white;
        border-radius: 10px;
        border: 1px solid rgba(00, 00, 00, 0.2);
    }
</style>

@section('header','Campaign')
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


<div class="box-content card ">

    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Campaign Details</h4>
        </div>
    </div>
    <div class="card-content">
        <div class="container-fluid">
            <div class="row">
                @foreach($campaign as $data)
                <div class="col-md-12">
                    <div class="cards">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 border-end" style="padding-left:35px;">
                                    <h4 class="card-title"> {{$data->title }}</h4>
                                    <img src="{{asset('campaignPhoto')}}/{{$data->photo}}" alt="image" style="width: 300px; height: 200px; border-radius: 10px;">

                                    <h4 class="card-subtitle mb-2 text-success">
                                        &#8377; {{$data->price }}
                                    </h4>
                                </div>
                                <div class="col-md-4" style="padding-top:35px;">

                                    <p class="card-text"><b>Description</b>: {{$data->detail }}.</p>

                                    <p class="card-text"><b>Rules</b>: {{$data->rule }}</p>
                                    <p class="card-text"><b>Eligible Criteria</b>: {{$data->eligibleCriteria }}</p>
                                    <p class="card-text"><b>Target Gender</b>: {{$data->targetGender }}</p>
                                    <p class="card-text"><b>Target Age Group</b>: {{$data->targetAgeGroup }}</p>
                                    <p class="card-text"><b>Start Date</b>: {{$data->startDate }}</p>
                                    <p class="card-text"><b>End Date</b>: {{$data->endDate }}</p>

                                </div>
                                <div class="col-md-4" style="padding-top:35px;">
                                    <p class="card-text"><b>Apply For Last Date</b>: {{$data->applyForLastDate }}.</p>
                                    <p class="card-text"><b>Task</b>: {{$data->task }}</p>
                                    <p class="card-text"><b>Max Application</b>: {{$data->maxApplication }}</p>
                                    <p class="card-text"><b>Status</b>:
                                        <span class="text-success">{{$data->status }}</span>
                                    </p>

                                </div>
                            </div>
                            <div style="display: flex; justify-content: end">
                                @if($campaignCount == 0)
                                <form action="{{route('influencer.campaignApply')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="campaignId" value="{{$data->id}}">
                                    <button type="submit" class="btn btn-sm btn-primary">Apply</button>
                                </form>
                                @else
                                Already applied
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div>


@endsection