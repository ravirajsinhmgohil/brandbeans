@extends('layouts.app')

@section('header', 'Reseller')
@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                <h4 class="">Reseller Payment Managment</h4>
            </div>

        </div>

        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table id="example" class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th> Mobile No</th>
                                {{-- <th> Status</th> --}}
                                <th> Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passbook as $passbook)
                                <tr>
                                    <td>{{ $passbook->mobileNumber }}</td>
                                    {{-- <td>{{ $passbook->status }}</td> --}}
                                    <td>
                                        <form action="{{ route('reseller.payment.updateStatus', ['id' => $passbook->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            @if ($passbook->status == 'Paid')
                                                <button class="update-status btn btn-xs btn-rounded btn-bordered btn-success" data-user-id="{{ $passbook->id }}">Paid</button>
                                            @else
                                                <button class="update-status btn btn-xs btn-rounded btn-bordered btn-danger" data-user-id="{{ $passbook->id }}">Pending</button>
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.card-content -->
    </div>

@endsection
