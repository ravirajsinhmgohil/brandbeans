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

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">
    <title>BrandBeans</title>
</head>

<body class="border border-dark border-3">
    <!-- Header -->
    @include('layout.header')

    <div class="container-fluid backgroundColor pt-4 mb-0">
        <div class="pt-5 ps-3">
            <span class="fs-bold h1 blueFont display-5">Featured Story</span>
            <p class="fs-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>

        {{-- image --}}

        <div class="container-fluid">


            <div class="card-grid">
                <div class="row">
                    @foreach ($story as $story)
                        <div class="col-md-4">
                            <div class="cards">
                                <img src="{{ asset('storyImg') }}/{{ $story->photo }}" alt="" class="card-img-top">
                                <div class="card-body pt-3 pb-0">
                                    <a class="decoration-none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="d-flex justify-content-between headers">
                                            <h5 class="card-title">{{ $story->title }}</h5>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="">name</div>
                                            <div class="">time</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="">
            <img src="{{ asset('influencerPage/small-banner.png') }}" class="w-100" alt="banner">
        </div>

        <div class="pt-2 ps-3">
            <span class="fs-bold h1 blueFont display-5">Startup Story</span>
            <p class="fs-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>

        <div class="row">
            @foreach ($stories as $stories)
                <div class="col-md-4 pb-3 d-flex justify-content-center">
                    <div class="card flex-fill" style="width: 20rem;">
                        <img src="{{ asset('storyImg') }}/{{ $stories->photo }}" class="card-img-top" height="300px" alt="image">
                        <div class="card-body">
                            <h3>{{ $stories->title }}</h3>
                            <div class="pt-3 d-flex justify-content-between">
                                <div class="">name</div>
                                <div class="">time</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="backImage p-4">
            <div class="row p-3">
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <span class="fs-bold h1 blueFont display-6">Subscribe For The Latest News!</span>
                    <input type="text" class="form-control rounded-pill shadow bg-body rounded" placeholder="Email Address">
                    <span class="text-muted pt-2">You’ll get only relevant news once a week</span>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <button type="submit" class="btn btn-info m-5 px-5 blueFont fw-bold  rounded-pill">Subscribe</button>
                </div>
            </div>
        </div>

        <div class="pt-3 ps-3">
            <span class="fs-bold h1 blueFont display-5">Tech Stories</span>
            <p class="fs-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{ asset('influencerPage/family.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-title fw-bold">iD Fresh eyes US relaunch and possible M&A in the
                            region</div>
                        <p class="card-text"> Payal Ganguly | 6 min read</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('influencerPage/persons.png') }}" height="337px" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="card-title fw-bold">iD Fresh eyes US relaunch and possible M&A in the
                            region</div>
                        <p class="card-text"> Payal Ganguly | 6 min read</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-4">
            <img src="{{ asset('influencerPage/banner2.png') }}" class="w-100" alt="banner">
        </div>

        <div class="pt-3 ps-3">
            <span class="fs-bold h1 blueFont display-5">Brand Stories</span>
            <p class="fs-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>

        <div class="row">
            @foreach ($startup as $startup)
                <div class="col-md-4 pb-3 d-flex justify-content-center">
                    <div class="card flex-fill" style="width: 20rem;">
                        <img src="{{ asset('storyImg') }}/{{ $startup->photo }}" class="card-img-top" height="300px" alt="image">
                        <div class="card-body">
                            <h3>{{ $startup->title }}</h3>
                            <div class="pt-3 d-flex justify-content-between">
                                <div class="">name</div>
                                <div class="">time</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>


    @include('layout.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('asset/scripts/brandstory.js') }}"></script>
</body>

</html>
