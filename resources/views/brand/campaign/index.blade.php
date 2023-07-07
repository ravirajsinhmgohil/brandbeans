@extends('layouts.app')

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
    <!-- /.box-title -->
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Campaign</h4>
        </div>
        <div class="">
            <a href="{{ route('brand.campaign.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Add</a>
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table id="example" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> Title</th>
                            <th> Detail</th>
                            <th> Price</th>
                            <th> Photo</th>
                            <th> Rule</th>
                            <th> Eligible Criteria</th>
                            <th> Target Gender</th>
                            <th> Target Age Group</th>
                            <th> Start Date</th>
                            <th> End Date</th>
                            <th> Apply For Last Date</th>
                            <th> Task</th>
                            <th> Max Application</th>
                            <th> Status</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campaign as $data)
                        <tr>
                            <td>{{$data->title }}</td>
                            <td>{{$data->detail }}</td>
                            <td>{{$data->price }}</td>
                            <td><img src="{{asset('campaignPhoto')}}/{{$data->photo}}" alt="image" style="height: 50px; width: 50px;"></td>
                            <td>{{$data->rule }}</td>
                            <td>{{$data->eligibleCriteria}}</td>
                            <td>{{$data->targetGender}}</td>
                            <td>{{$data->targetAgeGroup}}</td>
                            <td>{{$data->startDate}}</td>
                            <td>{{$data->endDate}}</td>
                            <td>{{$data->applyForLastDate}}</td>
                            <td>{{$data->task}}</td>
                            <td>{{$data->maxApplication}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('brand.campaign.edit')}}/{{$data->id}}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{route('brand.campaign.delete')}}/{{$data->id}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection