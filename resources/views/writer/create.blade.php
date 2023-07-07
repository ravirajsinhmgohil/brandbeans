@extends('layouts.app')

@section('header','Writer')
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


<div class="box-content card">
    <!-- /.box-title -->
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #03ACF0; color:white;">
        <div class="">
            <h4 class="">Create Slogan</h4>
        </div>
        <div class="">
            <a href="{{ route('writer.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <form action="{{route('writer.store')}}" enctype="multipart/form-data" class="was-validated" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <textarea id="editor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"></textarea>
            </div>


            <br>
            <div class="mb-3">
                <label for="sequence" class="form-label">Category</label>
                <select name="categoryId" id="categoryId" class="form-control">
                    <option disabled selected>--Select your Category--</option>
                    @foreach($category as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
        </form>
    </div>
    <!-- /.card-content -->
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection