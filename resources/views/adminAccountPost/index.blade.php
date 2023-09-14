@extends('layouts.app')
@section('header', 'Our users')
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

    <div class="box-content card danger">
        <!-- /.box-title -->
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Our Users</h4>
            </div>
            <div class="">
                <!-- <a href="{{ route('accountpost.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a> -->
                <!-- /.sub-menu -->
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">
            <div class="table-responsive">
                <div class="" style="display: flex; justify-content: end;">
                    <a href="{{ route('accountpost.index') }}?type=Free" id="sp1" class="btn btn-sm btn-danger" style="margin-right: 5px;">Free</a>
                    <a href="{{ route('accountpost.index') }}?type=Paid" id="sp2" class="btn btn-sm btn-info" style="margin-right: 5px;">Paid</a>
                    <a href="{{ route('accountpost.index') }}" id="sp2" class="btn btn-sm " style="margin-right: 5px;">Reset</a>
                </div>
                <br>
                <?php
                $i = 1;
                ?>
                <table id="" class="table table-bordered yajra-datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Package</th>
                            <th> Status</th>
                            <th> Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $userData)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $userData->username }}</td>
                                <td>{{ $userData->email }}</td>
                                <td>{{ $userData->package }}</td>
                                <td>
                                    <form action="{{ route('users.updateStatus', ['id' => $userData->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        @if ($userData->status == 'Active')
                                            <button class="update-status  btn btn-xs btn-rounded btn-bordered btn-success" data-user-id="{{ $userData->id }}">Active</button>
                                        @elseif($userData->status == 'Inactive')
                                            <button class="update-status  btn btn-xs btn-rounded btn-bordered btn-danger" data-user-id="{{ $userData->id }}">Inactive</button>
                                        @else
                                            <button class="update-status  btn btn-xs btn-rounded btn-danger" data-user-id="{{ $userData->id }}">Deleted</button>
                                        @endif

                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('accountpost.show', $userData->id) }}">Details</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('accountpost.delete', $userData->id) }}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div style="display: flex; justify-content: end;">
            </div>
            {!! $user->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
        <!-- /.card-content -->
    </div>

    <script>
        document.querySelectorAll('.update-status').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                fetch(`/users/${userId}/update-status`, {
                    method: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                }).then(response => {
                    if (response.ok) {
                        alert('User status updated successfully.');
                        // You can perform further actions or UI updates here if needed
                    } else {
                        alert('Error updating user status.');
                    }
                }).catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating user status.');
                });
            });
        });
    </script>


@endsection
