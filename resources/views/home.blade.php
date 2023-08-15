@extends('layouts.app')
@section('header', 'Home')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">
                <div class="box-content bordered info js__card">
                    <h4 class="box-title with-control">
                        <i class="ico fa fa-users"></i>Users

                    </h4>
                    <a href="#">
                        <div class="js__card_content">
                            <div class="col-md-4">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-users fs-2"></i>Total

                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('accountpost.index') }}">
                                            <span class="fs-2"> {{ $users }} </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-user-plus fs-2"></i>PAID

                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('accountpost.index') }}d">
                                            <span class="fs-2"> {{ $paidUsers }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-user fs-2"></i>FREE
                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('accountpost.index') }}?type=Free">
                                            <span class="fs-2"> {{ $freeUsers }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-users fs-2"></i>Influencer

                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('users.index') }}">
                                            <span class="fs-2"> {{ $influencer }} </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-user-plus fs-2"></i>Brand

                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('users.index') }}">
                                            <span class="fs-2"> {{ $brand }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-user fs-2"></i>Reseller
                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('users.index') }}">
                                            <span class="fs-2"> {{ $reseller }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-user fs-2"></i>Writer
                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('users.index') }}">
                                            <span class="fs-2"> {{ $writer }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="box-content bordered info js__card">
                                    <h4 class="box-title with-control">
                                        <i class="ico fa fa-user fs-2"></i>Designer
                                    </h4>
                                    <div class="js__card_content">
                                        <a href="{{ route('users.index') }}">
                                            <span class="fs-2"> {{ $designer }}</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@endsection
