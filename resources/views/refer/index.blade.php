@extends('layouts.app1')

@section('content')


<div class="container-fluid">

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{ $message }}</strong>
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



    <div class="row">

        <div class="col-md-12">
            <div class="box-content card">
                <h4 class="box-title" style="background-color: #03acf0;"><i class="fa fa-user-plus ico"></i>Refer Codes</h4>
                <div class="card-content">

                    <a href="{{route('refer.index')}}?type=free" id="sp1" class="btn btn-sm btn-danger margin-bottom-10">FREE</a>
                    <a href="{{route('refer.index')}}?type=paid" id="sp2" class="btn btn-sm btn-primary margin-bottom-10">PAID</a>

                    <div class="fs-5 row">
                        <?php
                        if (isset($_GET['type'])) {
                            $type = $_GET['type'];
                        } else {
                            $type = 'free';
                        }
                        if ($type === 'paid') {
                        ?>
                            <h3>Paid User List</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <?php
                        } else {
                        ?>
                            <h3>Free User List</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


@endsection