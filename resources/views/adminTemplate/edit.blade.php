@extends('layouts.app')
@section('header','Template Master')
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
            <h4 class="">Edit Template</h4>
        </div>
        <div class="">
            <a href="{{ route('admintemplatemaster.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">



        <form action="{{route('admintemplatemaster.update')}}" class="was-validated" enctype="multipart/form-data" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <input type="hidden" name="templateid" id="id" value="{{$template->id}}">
            <label for="exampleInputPassword1" class="form-label">Photo</label>
            <div class="row margin-bottom-10">
                <div class="col-md-6">
                    <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" name="photo" require>
                </div>
                <div class="col-md-6">
                    <label for="image"></label>
                    <img src="{{url('asset/img/default.jpg')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Logo Left</label>
                    <input type="text" name="logoLeft" id="logoLeft" value="{{$template->logoLeft}}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Logo Bottom</label>
                    <input type="text" name="logoBottom" id="logoBottom" value="{{$template->logoBottom}}" class="form-control">
                </div>
            </div>

            <div class="row margin-top-10">
                <div class="col-md-3"><label for="" class="form-label">mobile Left</label>
                    <input type="text" name="mobileLeft" value="{{$template->mobileLeft}}" id="mobileLeft" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">mobile Bottom</label>
                    <input type="text" name="mobileBottom" value="{{$template->mobileBottom}}" id="mobileBottom" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">mobile Fontsize</label>
                    <input type="text" name="mobileFontsize" value="{{$template->mobileFontsize}}" id="mobileFontsize" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">mobile Fontfamily</label>
                    <input type="text" name="mobileFontfamily" value="{{$template->mobileFontfamily}}" id="mobileFontfamily" class="form-control">
                </div>
            </div>

            <div class="row margin-top-10">
                <div class="col-md-3"><label for="" class="form-label">web Left</label>
                    <input type="text" name="webLeft" value="{{$template->webLeft}}" id="webLeft" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">web Bottom</label>
                    <input type="text" name="webBottom" value="{{$template->webBottom}}" id="webBottom" class="form-control">
                </div>
                <div class="col-md-3"> <label for="" class="form-label">web Fontsize</label>
                    <input type="text" name="webFontsize" value="{{$template->webFontsize}}" id="webFontsize" class="form-control">
                </div>
                <div class="col-md-3"> <label for="" class="form-label">web Fontfamily</label>
                    <input type="text" name="webFontfamily" value="{{$template->webFontfamily}}" id="webFontfamily" class="form-control">
                </div>
            </div>

            <div class="row margine-bottom-10">
                <div class="col-md-3"> <label for="" class="form-label">email Left</label>
                    <input type="text" name="emailLeft" value="{{$template->emailLeft}}" id="emailLeft" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">email Bottom</label>
                    <input type="text" name="emailBottom" value="{{$template->emailBottom}}" id="emailBottom" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">email Fontsize</label>
                    <input type="text" name="emailFontsize" value="{{$template->emailFontsize}}" id="emailFontsize" class="form-control">
                </div>
                <div class="col-md-3"> <label for="" class="form-label">email Fontfamily</label>
                    <input type="text" name="emailFontfamily" value="{{$template->emailFontfamily}}" id="emailFontfamily" class="form-control">
                </div>
            </div>

            <div class="row margin-bottom-10">
                <div class="col-md-3"><label for="" class="form-label">location Left</label>
                    <input type="text" name="locationLeft" value="{{$template->locationLeft}}" id="locationLeft" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">location Bottom</label>
                    <input type="text" name="locationBottom" value="{{$template->locationBottom}}" id="locationBottom" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">location Fontsize</label>
                    <input type="text" name="locationFontsize" value="{{$template->locationFontsize}}" id="locationFontsize" class="form-control">
                </div>
                <div class="col-md-3"><label for="" class="form-label">location Fontfamily</label>
                    <input type="text" name="locationFontfamily" value="{{$template->locationFontfamily}}" id="locationFontfamily" class="form-control">
                </div>
            </div>


            <div class="text-center">
                <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">Submit</button>
            </div>

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