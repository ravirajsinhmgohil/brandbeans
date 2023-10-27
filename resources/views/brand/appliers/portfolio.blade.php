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

@section('header', 'Contents')
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
            <strong>Oh snap!</strong> {{ __('There were some problems with your input') }}.
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
                <h4 class="">
                    Influencer post
                </h4>
            </div>

        </div>
        <div class="card-content">
            <div class="container-fluid">
                <div class="row">

                    <style>
                        .dropdown {
                            position: relative;
                            display: inline-block;
                        }

                        .dropdown-content {
                            display: none;
                            position: absolute;
                            background-color: #f9f9f9;
                            min-width: 160px;
                            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                        }

                        .desc {
                            padding: 15px;
                            text-align: center;
                        }

                        .dropdown:hover .dropdown-content {
                            display: block;
                        }
                    </style>
                    @foreach ($postImage as $data)
                        <div class="col-md-3" style="padding-bottom: 33px;">
                            <div class="dropdown">

                                @if ($data->status == 'Rejected')
                                    <span class="badge btn-danger">Rejected</span>
                                @endif
                                @if ($data->status == 'Approved')
                                    <span class="badge btn-success">Approved</span>
                                @endif
                                @if ($data->status == 'Pending')
                                    <span class="badge btn-primary">Pending</span>
                                @endif
                                <a href="{{ asset('checkApplyFile') }}/{{ $data->file }}" target="_blank">
                                    <img class="img-thumbnail" style="height: 200px; width: 200px;" src="{{ asset('checkApplyFile') }}/{{ $data->file }}" alt="image">
                                </a>

                                <div class="dropdown-content">
                                    <div style="display: flex; justify-content: space-between;">
                                        <a class="btn btn-sm btn-success" href="{{ route('brand.campaign.influencerContentApproval') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}" onclick="return confirm('Are you sure?')"><i class="menu-icon fa fa-check-circle-o text-white fa-lg"></i></a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('brand.campaign.influencerContentOnHold') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}"><i class="menu-icon fa fa-pause text-white fa-lg"></i></a>
                                        <a class="btn btn-sm btn-danger" data-remodal-target="remodal-{{ $data->id }}" href="#"><i class="menu-icon fa fa-close text-white fa-lg"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- modal -->
                        <div class="remodal" data-remodal-id="remodal-{{ $data->id }}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                            <div class="remodal-content">
                                <h2 id="modal1Title">Message for Rejection</h2>
                                <p id="modal1Desc">
                                <form action="{{ route('brand.campaign.influencerContentReject') }}" method="post">
                                    @csrf
                                    <label for="">Message</label>
                                    <input type="hidden" name="imageId" value="{{ $data->id }}">
                                    <input type="hidden" name="userId" value="{{ $data->userId }}">
                                    <input type="hidden" name="campaignId" value="{{ request('campaignId') }}">
                                    <textarea name="remark" placeholder="Add remark for rejection" class="form-control"></textarea>
                                    <br>
                                    <button type="submit" class="btn btn-success">OK</button>
                                    <button data-remodal-action="cancel" class="btn btn-danger">Cancel</button>
                                </form>
                                </p>
                            </div>
                        </div>
                    @endforeach


                    <!-- video -->

                    @foreach ($postVideo as $videoData)
                        <div class="col-md-3" style="padding-bottom: 33px;">
                            <div class="dropdown">

                                @if ($data->status == 'Rejected')
                                    <span class="badge btn-danger">Rejected</span>
                                @endif
                                @if ($data->status == 'Approved')
                                    <span class="badge btn-success">Approved</span>
                                @endif
                                @if ($data->status == 'Pending')
                                    <span class="badge btn-primary">Pending</span>
                                @endif
                                <div class="">
                                    <video width="250" class="img-thumbnail" height="300" controls>
                                        <source src="{{ asset('checkApplyFile/' . $videoData->file) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="dropdown-content">
                                    <div style="display: flex; justify-content: space-between;">
                                        <a class="btn btn-sm btn-success" href="{{ route('brand.campaign.influencerContentApproval') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}" onclick="return confirm('Are you sure?')"><i class="menu-icon fa fa-check-circle-o text-white fa-lg"></i></a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('brand.campaign.influencerContentOnHold') }}/{{ request('campaignId') }}/{{ $data->userId }}/{{ $data->id }}"><i class="menu-icon fa fa-pause text-white fa-lg"></i></a>
                                        <a class="btn btn-sm btn-danger" data-remodal-target="remodal-{{ $data->id }}" href="#"><i class="menu-icon fa fa-close text-white fa-lg"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- modal -->
                        <div class="remodal" data-remodal-id="remodal-{{ $data->id }}" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
                            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
                            <div class="remodal-content">
                                <h2 id="modal1Title">Message for Rejection</h2>
                                <p id="modal1Desc">
                                <form action="{{ route('brand.campaign.influencerContentReject') }}" method="post">
                                    @csrf
                                    <label for="">Message</label>
                                    <input type="hidden" name="imageId" value="{{ $data->id }}">
                                    <input type="hidden" name="userId" value="{{ $data->userId }}">
                                    <input type="hidden" name="campaignId" value="{{ request('campaignId') }}">
                                    <textarea name="remark" placeholder="Add remark for rejection" class="form-control"></textarea>
                                    <br>
                                    <button type="submit" class="btn btn-success">OK</button>
                                    <button data-remodal-action="cancel" class="btn btn-danger">Cancel</button>
                                </form>
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <!-- new card for steps -->
    <div class="box-content card ">

        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div>
                <h4 class="">
                    Followed Steps
                </h4>
            </div>
            {{-- <button class="btn btn-sm btn" style="background-color: #002E6E; color:white;">Comfirm Step</button> --}}

        </div>
        <div class="card-content">
            <div class="container-fluid">


                <div class="activity-list" style="padding-top: 10px;">
                    @foreach ($steps as $steps)
                        <div class="activity-item">
                            <?php
                            $counter = 0;
                            foreach ($followedStep as $followedStepData) {
                                if ($followedStepData->stepId === $steps->id) {
                                    $counter++;
                                }
                            }
                            ?>
                            <div class="bar @if ($counter > 0) bg-success  @else bg-danger @endif">
                                <div class="dot @if ($counter > 0) bg-success @else bg-danger @endif"></div>
                            </div>
                            <div class="content">
                                <div class="date"> {{ $steps->title }}</div>
                                <div class="text">

                                    <div class="row">
                                        <div class="col-md-6">
                                            {{ $steps->detail }}
                                        </div>
                                        <div class="col-md-6">


                                            @if ($counter > 0)
                                                &nbsp; <i class="fa fa-check text-success" title="Done"></i>
                                            @else
                                                &nbsp; <i class="fa fa-times text-danger" title="Not Done"></i>
                                            @endif

                                        </div>
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
