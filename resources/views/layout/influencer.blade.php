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

    <div class="container-fluid backgroundColor text-center pt-5 mb-0">

        <h1 class="fw-bold"><span class="blueFont">Find the right Influencer</span> <span class="lightBlueFont">For your Business</span></h1>
        <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <br>
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

        <div class="">
            <img src="{{ asset('influencerPage/topmain.png') }}" alt="Top Image">
        </div>
        <div class="pb-5">
            <button class="btn btn-info text-white">Try For Free Now</button>
        </div>

        <div class="pt-4">
            <h1 class="fw-bold"><span class="blueFont">Our Featured</span> <span class="lightBlueFont">Creator</span></h1>
            <h1><i class="bi bi-dot fa-sm text-info color"></i></h1>

            <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et <br>
                dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>

        <div class="wrapper d-flex justify-content-center">
            <div class="icon"><i id="left" class="fa-solid fa-angle-left"></i></div>
            <ul class="tabs-box">
                <li class="tab">Food</li>
                <li class="tab">Travel</li>
                <li class="tab">Beauty</li>
                <li class="tab">LifeStyle</li>
                <li class="tab active">Fitness</li>
                <li class="tab">Fashion</li>
                <li class="tab">Parenting</li>
                <li class="tab">Finance</li>

            </ul>
            <div class="icon"><i id="right" class="fa-solid fa-angle-right"></i></div>
        </div>


        <div class="row">
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo1.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo2.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo3.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo4.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo2.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo4.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo1.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo3.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo4.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo3.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo2.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo1.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo2.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo4.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo1.avif') }}" class=" image" alt="">
            </div>
            <div class="col-md-3 pt-3">
                <img src="{{ asset('influencerPage/demo3.avif') }}" class=" image" alt="">
            </div>
        </div>

        <div class="pt-5">
            <h1 class="fw-bold pt-2"><span class="blueFont">How Influencer</span> <span class="lightBlueFont">Connect Works</span><span class="blueFont">?</span></h1>
            <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore <br>
                magna aliqua. Ut enim ad minim veniam.</p>

            <div class="container">
                <div class="row">
                    <div class="col-md-7 d-flex justify-content-center">
                        <img src="{{ asset('influencerPage/bottom2.png') }}" class="" alt="">
                    </div>
                    <div class="col-md-5 pt-5">
                        <div class="card box mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="w-100 ">
                                            <div class="circleOrange ">
                                                <i class="bi bi-hand-index fs-1"></i>
                                            </div>
                                            {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text-start">
                                            <span class="fontBrown fs-4 fw-bold">Make your Voice</span>
                                            <div class="">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="w-100 ">
                                            <div class="circleBlue ">
                                                <i class="bi bi-person-check fs-1"></i>
                                            </div>
                                            {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text-start">
                                            <span class="fontBrown fs-4 fw-bold">Book Them Instantly</span>
                                            <div class="">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="w-100 ">
                                            <div class="circlePink ">
                                                <i class="bi bi-hand-index fs-1"></i>
                                            </div>
                                            {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text-start">
                                            <span class="fontBrown fs-4 fw-bold">Engage Directly</span>
                                            <div class="">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card box mt-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">

                                        <div class="w-100 ">
                                            <div class="circlePurple ">
                                                <i class="far fa-handshake fs-1"></i>
                                            </div>
                                            {{-- <span class="bg-orange p-2">
                                            </span> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text-start">
                                            <span class="fontBrown fs-4 fw-bold">Grow Your Business</span>
                                            <div class="">
                                                Lorem ipsum dolor sit amet, consectetur
                                                adipiscing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore.
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
</body>

</html>
