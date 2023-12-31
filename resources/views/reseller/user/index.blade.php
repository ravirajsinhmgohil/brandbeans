@extends('layouts.app')

@section('header', 'My Users')
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
                <h4 class="">My Users</h4>
            </div>
            <div class="">
                <a href="{{ route('reseller.user.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Add</a>
                <!-- /.sub-menu -->
            </div>
        </div>

        <!-- /.dropdown js__dropdown -->
        <div class="card-content">

            <div class="table-responsive">

                <div class="table-responsive" style="margin-top: 15px;">

                    <table id="example" class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th> Mobile No</th>
                                <th> Package</th>
                                <th> Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->mobileno }}</td>

                                    <td width="40%">{{ $user->title }}
                                        @if ($user->package != 'FREE')
                                            <br>
                                            <b>Price : </b>{{ $user->price }}
                                            <details>
                                                {{ $user->details }}
                                            </details>
                                        @endif
                                    </td>

                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{ route('reseller.user.edit', $user->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('reseller.user.delete', $user->id) }}">Delete</a>
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
