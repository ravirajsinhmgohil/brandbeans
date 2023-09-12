@extends('layouts.app')

@section('header', 'Reseller')
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



    <div class="box-content card">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Reseller</h4>
            </div>

        </div>

        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">
                    <form action="{{ route('reseller.passbook.code') }}" method="get">
                        @csrf
                        <div style="display: flex; justify-content: space-between;">
                            <div class="">
                                <button class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Pay</button>
                            </div>
                            <div class="">
                                <a href="{{ route('reseller.passbook') }}?type=Pending" class="btn btn-sm btn-info">Pending</a>
                                <a href="{{ route('reseller.passbook') }}?type=Paid" class="btn btn-sm btn-success">Paid</a>
                                <a href="{{ route('reseller.passbook') }}" class="btn btn-sm ">Reset</a>


                            </div>
                        </div>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th> Mobile No</th>
                                    <th> Amount</th>
                                    <th> Package</th>
                                    <th> Status</th>
                                    <th> Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($passbook as $passbook)
                                    <tr>
                                        <td><input type="checkbox" class="userCheckbox" name="selectedUsers[]" value="{{ $passbook->id }}"></td>
                                        <td>{{ $passbook->mobileNumber }}</td>
                                        <td>{{ $passbook->amount }}</td>
                                        <td>{{ $passbook->package }}</td>
                                        <td>{{ $passbook->status }}</td>
                                        <td>{{ $passbook->date }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>

            </div>

        </div>
        <!-- /.card-content -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // "Select All" checkbox functionality
            $('#selectAll').change(function() {
                $('.userCheckbox').prop('checked', $(this).prop('checked'));
            });

            // Update "Select All" checkbox status based on the individual checkboxes
            $('.userCheckbox').change(function() {
                $('#selectAll').prop('checked', $('.userCheckbox:checked').length === $('.userCheckbox').length);
            });
        });
    </script>
@endsection
