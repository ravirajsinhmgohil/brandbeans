@extends('layouts.app')
@section('header', 'Writer/Designer Report')
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
                <h4 class="">Writer/Designer Report </h4>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li role="presentation" class="active"><a href="#writer" id="writer-tab" role="tab" data-toggle="tab" aria-controls="writer" aria-expanded="true">Writer</a></li>
                <li role="presentation"><a href="#designer" role="tab" id="designer-tab" data-toggle="tab" aria-controls="designer">Designer</a></li>

            </ul>
            <!-- /.nav-tabs -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade in active" role="tabpanel" id="writer" aria-labelledby="writer-tab">
                    <div class="table-responsive">

                        <div class="table-responsive" style="margin-top: 15px;">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th> Email</th>
                                        <th> Contact Number</th>
                                        <th> Status</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($writer as $writerData)
                                        <tr>
                                            <td>{{ $writerData->name }}</td>
                                            <td>{{ $writerData->email }}</td>
                                            <td>{{ $writerData->mobileno }}</td>
                                            @if ($writerData->status == 'Active')
                                                <td class="text-success">{{ $writerData->status }}</td>
                                            @else
                                                <td class="text-danger">{{ $writerData->status }}</td>
                                            @endif
                                            <td><a href="{{ route('writer.report') }}/{{ $writerData->id }}" class="btn btn-sm btn-violet">View Report</a></td>

                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" role="tabpanel" id="designer" aria-labelledby="designer-tab">
                    <div class="table-responsive">

                        <div class="table-responsive" style="margin-top: 15px;">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th> Email</th>
                                        <th> Contact Number</th>
                                        <th> Status</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($designer as $designerData)
                                        <tr>
                                            <td>{{ $designerData->name }}</td>
                                            <td>{{ $designerData->email }}</td>
                                            <td>{{ $designerData->mobileno }}</td>
                                            @if ($designerData->status == 'Active')
                                                <td class="text-success">{{ $designerData->status }}</td>
                                            @else
                                                <td class="text-danger">{{ $designerData->status }}</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('designer.report') }}/{{ $designerData->id }}" class="btn btn-xs btn-violet">View Report</a>
                                                <a href="{{ route('designer.cost') }}/{{ $designerData->id }}" class="btn btn-info btn-xs">Update Cost</a>
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
        <!-- /.card-content -->
    </div>

@endsection
