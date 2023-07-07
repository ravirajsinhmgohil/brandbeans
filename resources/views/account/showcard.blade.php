<!DOCTYPE html>
<html>
<title>Digital-Cards</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="{{ asset('asset/css/dcard/apps.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/detail.css') }}" rel="stylesheet">
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">



{{-- style --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    /* @import url(https://fonts.googleapis.com/css?family=Lato:400,700,900); */

    /* $border-radius-size: 14px;
    $barbarian: #EC9B3B;
    $archer: #EE5487;
    $giant: #F6901A;
    $goblin: #82BB30;
    $wizard: #4FACFF; */

    /* *,
    *:before,
    *:after {
        box-sizing: border-box;
    } */

    body {
        /* background: linear-gradient(to bottom, rgba(140, 122, 122, 1) 0%, rgba(175, 135, 124, 1) 65%, rgba(175, 135, 124, 1) 100%) fixed; */
        /* background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/coc-background.jpg') no-repeat center center fixed; */
        /* background-size: cover; */
        /* font: 14px/20px "Lato", Arial, sans-serif; */
        /* color: #9E9E9E; */
        /* margin-top: 30px; */
    }

    .slide-container {
        margin: auto;
        width: 600px;
        text-align: center;
    }

    /* .wrapper {
        padding-top: 40px;
        padding-bottom: 40px;

        &:focus {
            outline: 0;
        }
    } */



    .clash-card {
        background: white;
        width: 300px;
        display: inline-block;
        margin: auto;
        border-radius: $border-radius-size + 5;
        position: relative;
        text-align: center;
        box-shadow: -1px 15px 30px -12px black;
        z-index: 9999;
    }

    .clash-card__image {
        position: relative;
        height: 230px;
        margin-bottom: 35px;
        border-top-left-radius: $border-radius-size;
        border-top-right-radius: $border-radius-size;
    }

    .clash-card__image--barbarian {
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/barbarian-bg.jpg');

        img {
            width: 400px;
            position: absolute;
            top: -65px;
            left: -70px;
        }
    }

    .clash-card__image--archer {
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/archer-bg.jpg');

        img {
            width: 400px;
            position: absolute;
            top: -34px;
            left: -37px;
        }
    }

    .clash-card__image--giant {
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/giant-bg.jpg');


    }

    img {
        width: 340px;
        position: absolute;
        top: -30px;
        left: -25px;
    }

    .clash-card__image--goblin {
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/goblin-bg.jpg');

        img {
            width: 370px;
            position: absolute;
            top: -21px;
            left: -37px;
        }
    }



    .clash-card__image--wizard {
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/wizard-bg.jpg');

    }

    img {
        width: 345px;
        position: absolute;
        top: -28px;
        left: -10px;
    }

    .clash-card__unit-name {
        font-size: 26px;
        color: black;
        font-weight: 900;
        margin-bottom: 5px;
    }

    .clash-card__unit-description {
        padding: 20px;
        margin-bottom: 10px;
    }

    .clash-card__unit-stats--barbarian {
        background: $barbarian;

        .one-third {
            border-right: 1px solid #BD7C2F;
        }
    }

    .clash-card__unit-stats--archer {
        background: $archer;

        .one-third {
            border-right: 1px solid #D04976;
        }
    }

    .clash-card__unit-stats--giant {
        background: $giant;

        .one-third {
            border-right: 1px solid darken($giant, 8%);
        }
    }

    .clash-card__unit-stats--goblin {
        background: $goblin;

        .one-third {
            border-right: 1px solid darken($goblin, 6%);
        }
    }

    .clash-card__unit-stats--wizard {
        background: $wizard;

        .one-third {
            border-right: 1px solid darken($wizard, 6%);
        }
    }

    .clash-card__unit-stats {

        color: white;
        font-weight: 700;
        border-bottom-left-radius: $border-radius-size;
        border-bottom-right-radius: $border-radius-size;

        .one-third {
            width: 33%;
            float: left;
            padding: 20px 15px;
        }

        sup {
            position: absolute;
            bottom: 4px;
            font-size: 45%;
            margin-left: 2px;
        }

        .stat {
            position: relative;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .stat-value {
            text-transform: uppercase;
            font-weight: 400;
            font-size: 12px;
        }

        .no-border {
            border-right: none;
        }
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0;
    }

    .slick-prev {
        left: 100px;
        z-index: 999;
    }

    .slick-next {
        right: 100px;
        z-index: 999;
    }
</style>


<body>
    <main class="" style="background-color: rgb(99, 97, 97);">
        <div class="container">
            <div class="col-sm-6 text-center ms-auto me-auto" style=" height: 75vh; padding-top:75px;">
                <div class="card" style="border-radius: 20px;">
                    <div class="ms-auto me-auto">
                        <img src="{{ asset('asset/img/i1.png') }}" class="card-img-top" alt="..." style="height: 100px; width: 100px; border-radius:50px; position:absolute; top:-40px;" align="center">
                    </div>
                    <div class="card-body" style="margin-top: 70px;">
                        <div style="text-align: center;">
                            @foreach ($cardshow as $user1)
                            <h5 class="card-title">{{ $user1->name }}</h5>
                            @endforeach

                        </div>

                        <nav class="mt-3">
                            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist" style="display:flex; justify-content:center;">
                                <button class="nav-link" id="nav-home-tab1" data-bs-toggle="tab" data-bs-target="#nav-home1" type="button" role="tab" aria-controls="nav-home1" aria-selected="true">Home</button>
                                <button class="nav-link" id="nav-profile-tab1" data-bs-toggle="tab" data-bs-target="#nav-profile1" type="button" role="tab" aria-controls="nav-profile1" aria-selected="false">Portfolio</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            {{-- tab 1 --}}
                            <div class="tab-pane fade w-100 show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab1" style="color: black;">
                                <h5 class="text-wd mt-4">Contact Details</h5>

                                @foreach ($link as $link1)
                                <i class="bi bi-arrow-right-square-fill" style="line-height: 2em;">
                                    {{ $link1->title }} :
                                    {{ $link1->value }}</i>
                                <br>
                                @endforeach
                            </div>
                            {{-- tab 2 --}}
                            <div class="tab-pane fade w-100" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1" style="color: black;">
                                <div class="row">
                                    <div class="col">
                                        @foreach ($cardimage as $image1)
                                        <img class="cardimages mt-3" src="{{ asset('cardimage/' . $image1->image) }}" alt="" style="height: 100px; width: 100px; border:8px solid white; margin-left:15px; box-shadow: 2px 2px 2px 2px lightblue;">
                                        @endforeach
                                    </div>
                                </div>
                            </div><br>
                            <div style="background-color: rgb(223, 216, 217); height:50px;">
                                <div style="float: left; margin-left:15px;">
                                    <button type="button" class="btn" style=" border-radius: 25px; margin-top:5px; background-color:white; box-shadow: 5px 5px 5px #888888; margin-right: 10px;"><i class="bi bi-share"></i> Send</button>
                                    <button type="button" class="btn" style=" border-radius: 25px; margin-top:5px; background-color:white; box-shadow: 5px 5px 5px #888888;"><i class="bi bi-download"></i> Save
                                        Contact</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ----- -->

                </div>
            </div>
            <!-- -------- -->
            <div class="col-sm-6 text-center ms-auto me-auto" style=" height: 750px; padding-top:5px;">
                <div class="card" style="border-radius: 20px;">

                    <div class="card-body" style="margin-top: 10px;">
                        <div style="text-align: center;">
                            @foreach ($cardshow as $user1)
                            <h5 class="card-title">{{ $user1->name }}</h5>
                            @endforeach

                        </div>

                        <nav class="mt-3">
                            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist" style="display:flex; justify-content:center;">
                                <button class="nav-link" id="nav-home-tab1" data-bs-toggle="tab" data-bs-target="#nav-home1" type="button" role="tab" aria-controls="nav-home1" aria-selected="true">Home</button>
                                <button class="nav-link" id="nav-profile-tab1" data-bs-toggle="tab" data-bs-target="#nav-profile1" type="button" role="tab" aria-controls="nav-profile1" aria-selected="false">Portfolio</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            {{-- tab 1 --}}
                            <div class="tab-pane fade w-100 show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab1" style="color: black;">
                                <h5 class="text-wd mt-4">Contact Details</h5>

                                @foreach ($link as $link1)
                                <i class="bi bi-arrow-right-square-fill" style="line-height: 2em;">
                                    {{ $link1->title }} :
                                    {{ $link1->value }}</i>
                                <br>
                                @endforeach
                            </div>
                            {{-- tab 2 --}}
                            <div class="tab-pane fade w-100" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1" style="color: black;">
                                <div class="row">
                                    <div class="col">
                                        @foreach ($cardimage as $image1)
                                        <img class="cardimages mt-3" src="{{ asset('cardimage/' . $image1->image) }}" alt="" style="height: 100px; width: 100px; border:8px solid white; margin-left:15px; box-shadow: 2px 2px 2px 2px lightblue;">
                                        @endforeach
                                    </div>
                                </div>
                            </div><br>
                            <div style="background-color: rgb(223, 216, 217); height:50px;">
                                <div style="float: left; margin-left:15px;">
                                    <button type="button" class="btn" style=" border-radius: 25px; margin-top:5px; background-color:white; box-shadow: 5px 5px 5px #888888; margin-right: 10px;"><i class="bi bi-share"></i> Send</button>
                                    <button type="button" class="btn" style=" border-radius: 25px; margin-top:5px; background-color:white; box-shadow: 5px 5px 5px #888888;"><i class="bi bi-download"></i> Save
                                        Contact</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ----- -->

                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>


    <script>
        (function() {

            var slideContainer = $('.slide-container');

            slideContainer.slick();

            $('.clash-card__image img').hide();
            $('.slick-active').find('.clash-card img').fadeIn(200);

            // On before slide change
            slideContainer.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                $('.slick-active').find('.clash-card img').fadeOut(1000);
            });

            // On after slide change
            slideContainer.on('afterChange', function(event, slick, currentSlide) {
                $('.slick-active').find('.clash-card img').fadeIn(200);
            });

        })();
    </script>


</body>

</html>