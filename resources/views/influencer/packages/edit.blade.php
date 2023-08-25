@extends('layouts.app')
@section('header', 'Influencer Package')
@section('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


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
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Edit Influencer Package</h4>
            </div>
            <div class="">
                <a href="{{ route('influencer.package.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            </div>
        </div>
        <div class="card-content">

            <form action="{{ route('influencer.package.update') }}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
                @csrf
                <input type="hidden" name="influencerPackageId" value="{{ $packages->id }}">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $packages->title }}" id="title" name="title" required>
                    @if ($errors->has('title'))
                        <span class="error text-danger fs-6">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" value="{{ $packages->price }}" id="price" name="price" required>
                    @if ($errors->has('price'))
                        <span class="error text-danger fs-6">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" required>{{ $packages->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="error text-danger fs-6">{{ $errors->first('description') }}</span>
                    @endif
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
