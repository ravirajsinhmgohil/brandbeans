@extends('layouts.app')
@section('header','User')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
    <strong>Oh snap!</strong> {{__('There were some problems with your input')}}.
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
            <h4 class="">Edit User</h4>
        </div>
        <div class="">
            <a href="{{ route('reseller.user.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <form action="{{route('reseller.user.update')}}" enctype="multipart/form-data" class="was-validated" method="post">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$user->id}}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->name}}" name="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><br>
            <div class="mb-3">
                <label for="userName" class="form-label">User Name</label>
                <input type="text" class="form-control" id="userName" aria-describedby="userName" value="{{$user->username}}" name="userName">
                @error('userName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><br>
            <div class="mb-3">
                <label for="emial" class="form-label">Email</label>
                <input type="text" class="form-control" id="emial" aria-describedby="emial" value="{{$user->email}}" name="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><br>

            <div class="mb-3">
                <label for="pin" class="form-label">Pin</label>
                <input type="text" class="form-control" id="pin" aria-describedby="pin" value="{{$user->pin}}" name="pin">
                @error('pin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><br>
            <div class="mb-3">
                <label for="mobileno" class="form-label">Mobile No</label>
                <input type="text" class="form-control" id="mobileno" aria-describedby="mobileno" value="{{$user->mobileno}}" name="mobileno">
                @error('mobileno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <label for="ProfilePhoto" class="form-label">Profile Photo</label>
                <input class="form-control" type="file" id="profilePhoto" name="profilePhoto">
                <img src="{{ url('/profilePhoto/' . $user->profilePhoto) }}" alt="" style="height:100px; width: 100px;">
            </div>
            <br>
            <div class="mb-3">
                <label for="package" class="form-label">Package</label>
                <select class="form-control" name="package" id="package" onchange="change_type()">
                    <option selected disabled>--Select your Option--</option>

                    @foreach ($package as $package)
                    <option value="{{ $package->title }}" @if ($package->title == $package->id) selected @endif>
                        {{ $package->title }}
                    </option>
                    @endforeach

                </select>
            </div>
            <br>
            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>

    </div>
    <!-- /.card-content -->
</div>


<script>
    function readURL(input, tgt) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector(tgt).setAttribute("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection