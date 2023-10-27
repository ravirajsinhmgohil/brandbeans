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

<body>
    <!-- Header -->
    @include('layout.header')



    {{-- comment --}}

    <!-- navbarend -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">

    <style>
        .backgroundImage {
            background-image: linear-gradient(to bottom, rgba(233, 227, 227, 0.52), rgba(255, 255, 255, 0.73)), url("../influencerPage/beans2.jpg");
            height: 100%;
            padding: 30px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .redLightColor {
            background-color: #ffd8da;
            border-top-left-radius: 180px;
            color: #864346;
        }

        .brownColorBtn {
            background-color: #864346;
            color: #ffd8da;
        }

        .greenBackground {
            background-image: url("../influencerPage/greenImage.jpg");
            padding: 30px;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        .imageBox {
            width: 60%;
            height: 100%;
            outline: 5px solid rgb(1, 196, 255);
        }

        .smallBox1 {
            width: 50px;
            height: 50px;
            outline: 2px solid rgb(1, 196, 255);
            z-index: -1;
            padding: 10px;
        }

        .smallBox2 {
            width: 40px;
            height: 40px;
            outline: 3px solid #012e6f;
            z-index: 1;
            margin: 20px 5px 5px 20px;
        }

        .imageOverBox {
            background-color: #012e6f;
            bottom: 50px;
            position: absolute;
            width: 20%;
        }
    </style>

    <div class="container-fluid backgroundColor text-center pt-5 mb-0 ">

        <div class="row backgroundImage">
            <div class="col-md-6 pt-5 ">
                <div class="smallBox1 ">
                    <div class="smallBox2">
                    </div>
                </div>
                <p class="lh-sm display-5 blueFont">Empower Your Brand
                    <br>
                    <span class="fw-bold display-4 blueFont">with Stunning
                        Visuals Posts</span>
                </p>

                Lorem ipsum dolor sit amet, consectetur adipiscing
                elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam

                <button class="mt-3 p-2 btn btn-info text-dark">
                    Choose Your Templates
                </button>
                <div class="smallBox1 ">
                    <div class="smallBox2">
                    </div>
                </div>
            </div>


            <div class="col-md-6">

                <img src="{{ asset('mediasourceimg') }}/{{ $media->sourcePath }}" style="z-index: 1" class="imageBox" alt="" />
                <div class="d-flex justify-content-end box ">
                    <div class="imageOverBox text-light p-3">
                        <h2>What we do?</h2>
                        <table class="" style="margin-left:35px;">
                            <tr>
                                <th><i class="bi bi-dot"></i></th>
                                <td>Point 1 Will Come Here</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-dot"></i></th>
                                <td>Point 2 Will Come Here</td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-dot"></i></th>
                                <td>Point 3 Will Come Here</td>
                            </tr>
                        </table>

                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row pt-4">
                <div class="col-md-12">
                    <h1 class=""><span class="blueFont">Influencer</span></h1>
                    <h1><i class="bi bi-dot fa-sm blueFont color"></i></h1>

                    <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et <br>
                        dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
            </div>
            <div class="">

                <div class="row text-center">
                    <div class="col-md-3 image_wrapper">
                        <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                        <div class="overlay">
                            <div class="effect fs-9">
                                <small>Fashion</small>
                                <small>
                                    <div class="d-flex justify-content-between pt-2">
                                        <small>
                                            5.5M
                                            Follower
                                        </small>
                                        <small>
                                            3.1M
                                            Follower
                                        </small>
                                    </div>
                                </small>
                                <small class="pt-3">
                                    <small>14.6% <br>
                                        Engagement <br>
                                        Rate</small>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 image_wrapper">
                        <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                        <div class="overlay">
                            <div class="effect fs-9">
                                <small>Fashion</small>
                                <small>
                                    <div class="d-flex justify-content-between pt-2">
                                        <small>
                                            5.5M
                                            Follower
                                        </small>
                                        <small>
                                            3.1M
                                            Follower
                                        </small>
                                    </div>
                                </small>
                                <small class="pt-3">
                                    <small>14.6% <br>
                                        Engagement <br>
                                        Rate</small>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 image_wrapper">
                        <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                        <div class="overlay">
                            <div class="effect fs-9">
                                <small>Fashion</small>
                                <small>
                                    <div class="d-flex justify-content-between pt-2">
                                        <small>
                                            5.5M
                                            Follower
                                        </small>
                                        <small>
                                            3.1M
                                            Follower
                                        </small>
                                    </div>
                                </small>
                                <small class="pt-3">
                                    <small>14.6% <br>
                                        Engagement <br>
                                        Rate</small>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 image_wrapper">
                        <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                        <div class="overlay">
                            <div class="effect fs-9">
                                <small>Fashion</small>
                                <small>
                                    <div class="d-flex justify-content-between pt-2">
                                        <small>
                                            5.5M
                                            Follower
                                        </small>
                                        <small>
                                            3.1M
                                            Follower
                                        </small>
                                    </div>
                                </small>
                                <small class="pt-3">
                                    <small>14.6% <br>
                                        Engagement <br>
                                        Rate</small>
                                </small>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 text-center py-5">
                    <a href="{{ route('influencer.register') }}" class="mt-3 p-2 fs-3 btn btn-info text-dark">
                        Book for Influencers
                    </a>

                </div>
            </div>
        </div>

        {{-- image section --}}
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-5 bg-white" style=" border-top-right-radius: 180px;">
                    <img src="{{ asset('influencerPage/baby.png') }}" height="500px" alt="baby image">
                </div>
                <div class="col-md-7 redLightColor " style="padding-top: 100px;">
                    <span class="h1">Ready to get started?</span>
                    <p class="fs-4">Make the most of your influencer marketing program
                        with our all-in-one creator management platform.</p>

                    <div class="h4 text-start">

                        <table>

                            <th><i class="bi bi-arrow-right-square"></i></th>
                            <td class="ps-3">Highly customised long-term strategy to achieve your
                                brands goal </td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-arrow-right-square"></i></th>
                                <td class="ps-3">Dedicated team to handle campaign execution </td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-arrow-right-square"></i></th>
                                <td class="ps-3"> Hand picked influencers to fit your requirements </td>
                            </tr>
                            <tr>
                                <th><i class="bi bi-arrow-right-square"></i></th>
                                <td class="ps-3"> Best-in-class influencer pricing & onboarding</td>
                            </tr>
                        </table>

                        <div class="text-center py-4">
                            <a href="{{ route('brand.register') }}" class="mt-3 p-2 fs-3 btn brownColorBtn text-white">Try Now For Free</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row pt-4">
            <div class="col-md-12">
                <h1 class=""><span class="blueFont">Influencer</span></h1>
                <h1><i class="bi bi-dot fa-sm blueFont color"></i></h1>

                <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et <br>
                    dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div>
        </div>
        <div class="">

            <div class="row text-center">
                <div class="col-md-3 image_wrapper">
                    <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                    <div class="overlay">
                        <div class="effect fs-9">
                            <small>Fashion</small>
                            <small>
                                <div class="d-flex justify-content-between pt-2">
                                    <small>
                                        5.5M
                                        Follower
                                    </small>
                                    <small>
                                        3.1M
                                        Follower
                                    </small>
                                </div>
                            </small>
                            <small class="pt-3">
                                <small>14.6% <br>
                                    Engagement <br>
                                    Rate</small>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 image_wrapper">
                    <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                    <div class="overlay">
                        <div class="effect fs-9">
                            <small>Fashion</small>
                            <small>
                                <div class="d-flex justify-content-between pt-2">
                                    <small>
                                        5.5M
                                        Follower
                                    </small>
                                    <small>
                                        3.1M
                                        Follower
                                    </small>
                                </div>
                            </small>
                            <small class="pt-3">
                                <small>14.6% <br>
                                    Engagement <br>
                                    Rate</small>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 image_wrapper">
                    <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                    <div class="overlay">
                        <div class="effect fs-9">
                            <small>Fashion</small>
                            <small>
                                <div class="d-flex justify-content-between pt-2">
                                    <small>
                                        5.5M
                                        Follower
                                    </small>
                                    <small>
                                        3.1M
                                        Follower
                                    </small>
                                </div>
                            </small>
                            <small class="pt-3">
                                <small>14.6% <br>
                                    Engagement <br>
                                    Rate</small>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 image_wrapper">
                    <img src="{{ asset('influencerPage/1.png') }}" alt="image">
                    <div class="overlay">
                        <div class="effect fs-9">
                            <small>Fashion</small>
                            <small>
                                <div class="d-flex justify-content-between pt-2">
                                    <small>
                                        5.5M
                                        Follower
                                    </small>
                                    <small>
                                        3.1M
                                        Follower
                                    </small>
                                </div>
                            </small>
                            <small class="pt-3">
                                <small>14.6% <br>
                                    Engagement <br>
                                    Rate</small>
                            </small>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12 text-center py-5">
                <a href="{{ route('influencer.register') }}" class="mt-3 p-2 fs-3 btn btn-info text-dark">
                    Book for Influencers
                </a>

            </div>
        </div>

        {{-- <div class="greenBackground"> --}}
        <div class="" style="background-color: #e2e6bd;">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <img src="{{ asset('influencerPage/bookImage.jpg') }}" height="300px" alt="image">
                        </div>
                        <div class="col-md-4 pt-4">
                            <p class="lh-sm display-5" style="color:#864346;">Turn Letters in to
                                <br>
                                <span class="fw-bold display-4" style="color:#864346;">Your Story</span>
                            </p>
                            <div class="text-center py-4">
                                <button class="mt-3 p-2 fs-3 btn brownColorBtn text-uppercase">Publish Your Story
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <img src="{{ asset('influencerPage/sideImage2.png') }}" height="300px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-12">
                <h1 class=""><span class="blueFont">Festival Post Section</span></h1>

                <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et <br>
                    dolore magna aliqua. Ut enim ad minim veniam.</p>
            </div>
        </div>

        <div class="container-fluid">
            @foreach ($downloads as $download)
                @if ($download->media)
                    <img class="" src="{{ asset('mymedia') }}/{{ $download->media }}" height="321px" width="321px" alt="image">
                @else
                    <img class="" src="{{ url('asset/img/default.jpg') }}" height="321px" width="321px" alt="image">
                @endif
            @endforeach
        </div>

        <div class="text-center">
            <div class="text-center py-4">
                <button class="mt-3 p-2 btn btn-info text-dark fs-3 text-uppercase">CHOOSE FOR YOUR BUSINESS
                </button>
            </div>
        </div>


        <style>
            .first-border {
                border: dotted 1px gray;
                width: 60%;
                border-radius: 30px;
                margin: 10px;
                padding: 10px;
            }

            .second-border {
                border: solid 3px #31d2f2;
            }

            .third-border {
                border: solid 10px #102c54;
                padding: 1px;

            }
        </style>

        <div class="container-fluid" style="background-color: #bde6d5; ">
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="row">

                        <div class="col-md-5">
                            <div class="first-border ms-5">
                                <div class="second-border m-3">
                                    <div class="third-border bg-light text-center">
                                        <img src="{{ asset('influencerPage/man.png') }}" height="300px" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 pt-5">
                            <p class="lh-sm display-5" style="color:#43867e;">CREATE YOUR
                                <br>
                                <span class="fw-bold display-4" style="color:#43867e;">CUSTOM FRAME</span>
                            </p>
                            <div class="text-center py-4">
                                <button class="mt-3 p-2 fs-3 btn-block btn text-uppercase text-light" style="background-color: #102c54">TRY IT NOW </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- comment --}}
    @include('layout.footer')

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('asset/scripts/brandstory.js') }}"></script>

</html>
