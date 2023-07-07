@extends('layouts.app')
@section('header','Subscription Package Detail')
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
            <h4 class="">Add Subscription Details</h4>
        </div>
        <div class="">
            <a href="{{ route('adminsubscriptionpackage.index') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">BACK</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">


        <form action="{{route('adminsubscriptionpackage.packagedetailstore')}}" class="was-validated" novalidate method="post" style="margin-top: 15px;">
            @csrf
            <input type="hidden" name="packageId" id="packageId" value="{{$subpack->id}}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <button type="submit" class="btn btnback btn-sm" style="background-color: #002E6E; color:white; margin-top: 5px;">Submit</button>
        </form>

        <div class="table-responsive" style="padding-top: 20px;">
            <table id="" class="table table-bordered">
                <thead>
                    <tr>
                        <th> Title</th>
                        <th> Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $details)
                    <tr>
                        <td>{{$details->title}}</td>
                        <td><a class="btn btn-sm btn-danger" href="{{route('adminsubscriptionpackagedetail.delete',$details->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.card-content -->
</div>




@endsection