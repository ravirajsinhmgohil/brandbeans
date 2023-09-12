<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- fonts --}}


    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">
    <title>BrandBeans</title>
</head>

<body class="border border-dark border-3">
    <!-- Header -->
    @include('layout.header')

    <div class="container-fluid backgroundColor pt-5 mb-0">

        <style>
            .car {
                margin: 5px;
                padding: 5px;
                border: 1px solid rgba(00, 00, 00, 0.2);
            }
        </style>



        <div class="container-fluid">

            <div class="card-content ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="car" style="width: 400px;">

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12 ">
                                            <div class="text-center">
                                                @if ($profile->profile->profilePhoto)
                                                    <img class="img-thumbnail" style="border-radius: 50%; height: 150px; width: 150px;" src="{{ asset('profile') }}/{{ $profile->profile->profilePhoto }}" alt="image">
                                                @else
                                                    <img class="img-thumbnail" style="border-radius: 50%; height: 150px; width: 150px;" src="{{ url('asset/img/defaultImage.jpg') }}" alt="image"><br> <br>
                                                @endif

                                                <h4 class="pt-3 ps-6" style=" text-transform: uppercase">
                                                    <b>{{ $profile->profile->name }}</b>
                                                    @if ($profile->is_brandBeansVerified == 'on')
                                                        <i class="menu-icon bi bi-check-circle-fill text-success" title="BrandBeans Verified" style="margin-left: 5px;"></i>
                                                    @endif

                                                </h4>
                                            </div>
                                            <hr>
                                            <div class="">
                                                <h6 class="mb-3 d-flex justify-content-between"><span class="text-muted">Email:</span>
                                                    <b>{{ $profile->profile->email }}</b>
                                                </h6>
                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">Contact : </span><b>{{ $profile->contactNo }}</b></h6>
                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">Category : </span><b>
                                                    $profile->categoryId = 
                                                    [""]
                                                        @foreach ($profile->incategory as $category)
                                                            <?php
                                                            $categoryName = explode(',', $category);
                                                            ?>
                                                            {{ $categoryName }}
                                                        @endforeach
                                                    </b></h6>
                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">Address : </span><b>{{ $profile->address }}</b></h6>
                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">Trending : </span>
                                                    @if ($profile->is_trending == 'on')
                                                        <i class="menu-icon bi bi-check-circle-fill text-success"></i>
                                                    @else
                                                        <i class="menu-icon bi bi-x-circle-fill text-danger"></i>
                                                    @endif
                                                </h6>

                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">BrandBeans Verified : </span>
                                                    @if ($profile->is_brandBeansVerified == 'on')
                                                        <i class="menu-icon bi bi-check-circle-fill text-success"></i>
                                                    @else
                                                        <i class="menu-icon bi bi-x-circle-fill text-danger"></i>
                                                    @endif
                                                </h6>


                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">Featured : </span>
                                                    @if ($profile->is_featured == 'on')
                                                        <i class="menu-icon bi bi-check-circle-fill text-success"></i>
                                                    @else
                                                        <i class="menu-icon bi bi-x-circle-fill text-danger"></i>
                                                    @endif
                                                </h6>

                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">Status : </span>
                                                    @if ($profile->status == 'Active')
                                                        <span class="text-success"><b>{{ $profile->status }}</b></span>
                                                    @else
                                                        <span class="text-danger"><b>{{ $profile->status }}</b></span>
                                                    @endif
                                                </h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-7 ">
                            bjhsgdadghajsh
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    @include('layout.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('asset/scripts/influencer.js') }}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>

</html>
