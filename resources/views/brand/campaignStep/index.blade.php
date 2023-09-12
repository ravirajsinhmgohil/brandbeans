@extends('layouts.app')

@section('header', 'Campaign Step')
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
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Campaign Step</h4>
            </div>
            <div class="">
                <a href="{{ route('brand.campaign.step.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Add</a>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Campaign</th>
                                <th> Title</th>
                                <th> Detail</th>
                                <th> Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($step as $data)
                                <tr>
                                    @foreach ($data->campaign as $campaign)
                                        <td>{{ $campaign->title }}</td>
                                    @endforeach
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->detail }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('brand.campaign.step.edit') }}/{{ $data->id }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('brand.campaign.step.delete') }}/{{ $data->id }}">Delete</a>
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
