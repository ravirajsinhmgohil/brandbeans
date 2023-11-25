@extends('layouts.app')
@section('header', 'Brand Package')
@section('content')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <div class="box-content card">
        <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
            <div class="">
                <h4 class="">Edit Brand Package</h4>
            </div>
            <div class="">
                <a href="{{ route('admin.brand.package.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            </div>
        </div>
        <div class="card-content">

            <form action="{{ route('admin.brand.package.update') }}" enctype="multipart/form-data" class="was-validated" novalidate method="post" style="margin-top: 15px;">
                @csrf
                <input type="hidden" name="brandPackageId" value="{{ $brandPackage->id }}">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" value="{{ $brandPackage->title }}" id="title" name="title" required>
                    @if ($errors->has('title'))
                        <span class="error text-danger fs-6">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">price</label>
                    <input type="text" class="form-control" value="{{ $brandPackage->price }}" id="price" name="price" required>
                    @if ($errors->has('price'))
                        <span class="error text-danger fs-6">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="points" class="form-label">points</label>
                    <input type="text" class="form-control" value="{{ $brandPackage->points }}" id="points" name="points" required>
                    @if ($errors->has('points'))
                        <span class="error text-danger fs-6">{{ $errors->first('points') }}</span>
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
