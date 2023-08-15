@extends('layouts.app')
@section('header', 'Our Users')
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
                <h4 class="">User Details</h4>
            </div>
            <div class="">
                <a href="{{ route('adminsubscription.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
                <!-- /.sub-menu -->
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">
            <div class="" style="display: flex; justify-content: end;">
                <a href="{{ route('adminsubscription.index') }}?type=free" id="sp1" class="btn btn-sm btn-danger margin-bottom-10">FREE</a>
                <a href="{{ route('adminsubscription.index') }}?type=paid" id="sp2" class="btn btn-sm btn-primary margin-bottom-10" style="margin-left: 5px; ">PAID</a>
                <a href="{{ route('adminsubscription.index') }}" id="sp2" class="btn btn-sm margin-bottom-10" style="margin-left: 5px; ">Reset</a>
            </div>
            <div class="table-responsive">
                <?php
            if (isset($_GET['type'])) {
                $type = $_GET['type'];
            } else {
                $type = 'free';
            }
            if ($type === 'paid') {
            ?>
                <h3>Paid User List</h3>
                <table class="table table-bordered t2">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Mobile Number</th>
                            <th> Package</th>
                            <th> Validity</th>
                            <th> Payment Id</th>
                            <th> Profile Photo</th>
                            <th> Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paiduser as $paiduser)
                            <tr>
                                <td>{{ $paiduser->name }}</td>
                                <td>{{ $paiduser->email }}</td>
                                <td>{{ $paiduser->mobileno }}</td>
                                <td>{{ $paiduser->package }}</td>
                                <td>{{ $paiduser->validity }}</td>

                                <td>
                                    @foreach ($paiduser->razor as $razor)
                                        {{ $razor->payment_id }}
                                    @endforeach
                                </td>

                                <td><img src="{{ url('profile') }}/{{ $paiduser->profilePhoto }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                                <td>
                                    <form action="{{ route('users.updateStatus', ['id' => $paiduser->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        @if ($paiduser->status == 'Active')
                                            <button class="update-status btn btn-xs btn-rounded btn-bordered btn-success" data-user-id="{{ $paiduser->id }}">Active</button>
                                        @else
                                            <button class="update-status btn btn-xs btn-rounded btn-bordered btn-danger" data-user-id="{{ $paiduser->id }}">Inactive</button>
                                        @endif

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <?php
            } else {
            ?>
                <h3>Free User List</h3>
                <table class="table table-bordered t1">
                    <thead>
                        <tr>
                            <th> Name</th>
                            <th> Email</th>
                            <th> Mobile Number</th>
                            <th> Profile Photo</th>
                            <th> Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobileno }}</td>
                                <td><img src="{{ url('profile') }}/{{ $user->profilePhoto }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                                <td>
                                    <form action="{{ route('users.updateStatus', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        @if ($user->status == 'Active')
                                            <button class="update-status  btn btn-xs btn-rounded btn-bordered btn-success" data-user-id="{{ $user->id }}">Active</button>
                                        @else
                                            <button class="update-status  btn btn-xs btn-rounded btn-bordered btn-danger" data-user-id="{{ $user->id }}">Inactive</button>
                                        @endif

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <?php } ?>
            </div>
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
