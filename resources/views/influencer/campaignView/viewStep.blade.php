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
            <h4 class="">Steps</h4>
        </div>
    </div>
    <div class="card-content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="cards">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th>Steps</th>
                                            <th>Details</th>
                                            <!-- <th>Status</th> -->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($campaignStep as $data)
                                        <tr>
                                            <td>{{$data->title}}</td>
                                            <td>{{$data->detail}}</td>
                                            <td>
                                                <?php
                                                $counter = 0;
                                                foreach ($content as $contentData) {
                                                    if ($contentData->stepId === $data->id) {
                                                        $counter++;
                                                    }
                                                }
                                                ?>
                                                @if($counter < 1) <button class="btn btn-sm btn-success" data-remodal-target="remodal-{{$data->id}}" href="#">Upload Step</button>
                                                    @endif

                                                    <div class="remodal" data-remodal-id="remodal-{{$data->id}}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                                                        <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                                                        <div class="remodal-content">
                                                            <h2 id="modal1Title">Upload your content Proof</h2>
                                                            <p id="modal1Desc">
                                                            <form action="{{route('influencer.campaign.step.store')}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" value="{{$data->id}}" name="stepId">
                                                                <input type="hidden" value="{{request('campaignId')}} " name="campaignId">
                                                                <label for="uploadActivityPhoto">Upload Screenshot</label>
                                                                <input type="file" class="form-control" name="uploadActivityPhoto" id="uploadActivityPhoto">
                                                                <span><b>OR</b></span>
                                                                <br>
                                                                <label for="uploadActivityPhoto">Upload URL</label>
                                                                <input type="text" class="form-control" name="uploadActivityLink" id="uploadActivityLink" placeholder="Put your URL here..">
                                                                <br>
                                                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                                            </form>
                                                            </p>
                                                        </div>
                                                    </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


@endsection