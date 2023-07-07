@extends('layouts.app1')
{{-- <link href="{{ asset('asset/css/mycard/card.css') }}" rel="stylesheet"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<style>
    .butt {

        border-radius: 50px;
        margin: 5px;
    }
</style>
@section('content')
<div class="container">
    <div id="wrapper bg-dark">
        <div class="main-content">
            <h3 class="">My Business Card</h3>
            <div class="row ">
                <div class="col-8 mt-1">
                    <div class="box-content card white align-items-center">
                        <div class="card-content">
                            <div class="row">
                                @foreach ($data as $user1)
                                <div class="col-md-5">
                                    <h5 class="card-title">{{ $user1->name }}</h5>
                                    <p class="card-text">{{ $user1->email }}</p>
                                    <p class="card-text">{{ $user1->companyname }}</p>
                                </div>

                                <div class="col-md-7 pt-1 d-flex justify-content-end">

                                    <img src="{{ url('profile') }}/{{$user1->profilePhoto}}" class="card-img img1" alt="image" style="height: 100px; width:100px; border-radius:50px;">
                                </div>
                                <hr />

                                <div class="row my-3 ">
                                    <div class="col">

                                        <a class="" href="{{ route('demo') }}/{{ $user1->id }}" id="show-user"><button type="button" class="butt btn btn-light"><i class="bi bi-pencil"></i><span class="m-1">Edit</span></button></a>
                                    </div>
                                    <div class="col">
                                        <a class="" href="{{ route('account.viewcard') }}/{{ $user1->id }}"><button type="button" class="butt btn btn-light"><i class="bi bi-camera-fill"></i><span class="m-1">View</span></button></a>
                                    </div>
                                    <div class="col">
                                        <a class="" href="#"> <button type="button" class="butt btn btn-light"><i class="bi bi-back"></i><span class="m-1">Copy
                                                    Link</span></button></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection