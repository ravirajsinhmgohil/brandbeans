@extends('layouts.app')
@section('header', 'User')
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
                <h4 class="">Edit User</h4>
            </div>
            <div class="">
                <a href="{{ route('reseller.user.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
                <!-- /.sub-menu -->
            </div>
        </div>
        <!-- /.dropdown js__dropdown -->
        <div class="card-content">
            <form action="{{ route('reseller.user.update') }}" enctype="multipart/form-data" class="was-validated" method="post">
                @csrf
                <input type="hidden" name="userId" id="id" value="{{ $user->id }}">

                <div class="mb-3">
                    <label for="mobileno" class="form-label">Mobile No</label>
                    <input type="text" class="form-control" id="mobileno" aria-describedby="mobileno" value="{{ $user->mobileno }}" name="mobileno">
                    @error('mobileno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <br>
                <div class="mb-3">
                    <label for="package" class="form-label">Package</label>
                    <select name="package" class="form-control" id="package">
                        <option>select your package</option>
                        @foreach ($package as $packageData)
                            <option value="{{ $packageData->title }}" {{ old('package', $user->package) == $packageData->title ? 'selected' : '' }}>{{ $packageData->title }}</option>
                        @endforeach
                    </select>
                    @error('package')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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
