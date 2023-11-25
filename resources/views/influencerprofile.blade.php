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
                                                <h6 class=" mb-3 d-flex justify-content-between "><span class="text-muted">Category : </span><b id="category" class="text-end">
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
                        <div class="col-md-3 ">
                            -
                        </div>
                        <div class="col-md-4 ">
                            <div class="car" style="">

                                <style>
                                    .nav-link {
                                        display: block;
                                        padding: 0.5rem 1rem;
                                        color: #000102 !important;
                                        text-decoration: none;
                                        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
                                    }

                                    .nav-tabs .nav-link {
                                        margin-bottom: -1px;
                                        margin: 5px !important;
                                        background: 0 0;
                                        border-bottom: px solid #000000 !important;
                                        border-right: 1px solid rgba(00, 00, 00, 0.2) !important;
                                        border-top-left-radius: 0;
                                        border-top-right-radius: 0;
                                        border-right: #000102 !important;
                                    }

                                    .nav-tabs {
                                        border: 1px solid rgba(00, 00, 00, 0.2);
                                        /* border-bottom: 3px solid #000000 !important; */
                                    }

                                    .nav-tabs .nav-item.show .nav-link,
                                    .nav-tabs .nav-link.active {
                                        color: #495057;
                                        background-color: #dddee0;
                                        border-color: #eef0f2 #eef0f2 #eef0f2;
                                    }

                                    .nav {
                                        display: flex;
                                        justify-content: center;
                                        flex-wrap: wrap;
                                        border-bottom: 3px solid #000000 !important;
                                        margin-bottom: 0;
                                        list-style: none;
                                    }
                                </style>

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-12 ">

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active fw-bold" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" type="button" role="tab" aria-controls="basic" aria-selected="true">Basic</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fw-bold" id="standard-tab" data-bs-toggle="tab" data-bs-target="#standard" type="button" role="tab" aria-controls="standard" aria-selected="false">Standard</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link fw-bold" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premium" type="button" role="tab" aria-controls="premium" aria-selected="false">Premium</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content mt-3" id="myTabContent">
                                                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">Basic Info</div>
                                                <div class="tab-pane fade" id="standard" role="tabpanel" aria-labelledby="standard-tab">Standard</div>
                                                <div class="tab-pane fade" id="premium" role="tabpanel" aria-labelledby="premium-tab">Premium</div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script>
        const category = {!! $profile->categoryId !!};
        console.log(category);

        document.getElementById('category').innerHTML = category.join(', ');
    </script>
</body>

</html>
