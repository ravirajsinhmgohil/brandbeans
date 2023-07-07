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
            <h4 class="">Template</h4>
        </div>
        <div class="">
            <a href="{{ route('admintemplatemaster.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">
        <div class="table-responsive">

            <table id="example" class="table table-bordered" style="margin-top: 15px;">
                <thead>
                    <tr>
                        <th> Photo</th>
                        <th> Logo Left</th>
                        <th> Logo Bottom</th>
                        <th> Mobile Left</th>
                        <th> Mobile Bottom</th>
                        <th> Mobile Fontsize</th>
                        <th> Mobile Fontfamily</th>
                        <th> website Left</th>
                        <th> website Bottom</th>
                        <th> website Fontsize</th>
                        <th> website Fontfamily</th>
                        <th> Email Left</th>
                        <th> Email Bottom</th>
                        <th> Email Fontsize</th>
                        <th> Email Fontfamily</th>
                        <th> Location Left</th>
                        <th> Location Bottom</th>
                        <th> Location Fontsize</th>
                        <th> Location Fontfamily</th>
                        <th> Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($template as $template)
                    <tr>
                        <td><img src="{{asset('templateimages')}}/{{$template->photo}}" class="img-thumbnail" style="width:50px;height:50px"></td>
                        <td>{{$template->logoLeft}}</td>
                        <td>{{$template->logoBottom}}</td>
                        <td>{{$template->mobileLeft}}</td>
                        <td>{{$template->mobileBottom}}</td>
                        <td>{{$template->mobileFontsize}}</td>
                        <td>{{$template->mobileFontfamily}}</td>
                        <td>{{$template->webLeft}}</td>
                        <td>{{$template->webBottom}}</td>
                        <td>{{$template->webFontsize}}</td>
                        <td>{{$template->webFontfamily}}</td>
                        <td>{{$template->emailLeft}}</td>
                        <td>{{$template->emailBottom}}</td>
                        <td>{{$template->emailFontsize}}</td>
                        <td>{{$template->emailFontfamily}}</td>
                        <td>{{$template->locationLeft}}</td>
                        <td>{{$template->locationBottom}}</td>
                        <td>{{$template->locationFontsize}}</td>
                        <td>{{$template->locationFontfamily}}</td>
                        <td><a class="btn btn-primary btn-sm" href="{{route('admintemplatemaster.edit',$template->id)}}">Edit</a> <a class="btn btn-danger btn-sm" href="{{route('admintemplatemaster.delete',$template->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-content -->
</div>




@endsection