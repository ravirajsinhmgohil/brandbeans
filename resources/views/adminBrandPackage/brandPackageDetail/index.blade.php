@extends('layouts.app')

@section('header', 'Brand Package Detail')
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
                <h4 class="">Brand Package Detail</h4>
            </div>
            <div class="">
                <a href="{{ route('admin.brand.package.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">
            <div style="display: flex; justify-content: end">
                <div class="">
                    <button class="btn btnback btn-success btn-xs showForm">Add</button>
                </div>
            </div>

            <div class="formArea" style="display: none">
                <form action="{{ route('admin.brand.package.detail.store') }}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
                    @csrf
                    <input type="hidden" name="brandPackageId" value="{{ request('id') }}">
                    <div class="mb-3">
                        <label for="points" class="form-label">points</label>
                        <input type="text" class="form-control" value="{{ old('points') }}" id="points" name="points" required>
                        @if ($errors->has('points'))
                            <span class="error text-danger fs-6">{{ $errors->first('points') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea type="text" class="form-control" id="" name="details" required>{{ old('details') }}</textarea>
                        @if ($errors->has('details'))
                            <span class="error text-danger fs-6">{{ $errors->first('details') }}</span>
                        @endif
                    </div>

                    <br>
                    <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
                </form>
            </div>


            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Points</th>
                                <th> Details</th>
                                {{-- <th> Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packageDetail as $data)
                                <tr>

                                    <td>{{ $data->points }}</td>
                                    <td>{!! $data->details !!}</td>
                                    {{-- <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.brand.package.edit') }}/{{ $data->id }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('admin.brand.package.delete') }}/{{ $data->id }}">Delete</a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".showForm").click(function() {
                $(".formArea").toggle(500);
            });
        });
    </script>

@endsection
