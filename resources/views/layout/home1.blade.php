<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('asset/css/mycard/card.css') }}" class="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" integrity="sha512-5PV92qsds/16vyYIJo3T/As4m2d8b6oWYfoqV+vtizRB6KhF1F9kYzWzQmsO6T3z3QG2Xdhrx7FQ+5R1LiQdUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

    .secondnav {
        font-size: 15px;
    }

    .mycard {
        display: inline-block;
        font-size: 18px;
        text-decoration: none;
        color: black;

        /* padding-left: 10px; */
    }

    .clash-card {
        background: white;
        /* width: 300px; */
        display: inline-block;
        margin: auto;
        border-radius: $border-radius-size + 5;
        position: relative;
        text-align: center;
        /* box-shadow: -1px 15px 30px -12px black; */
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


    }

    img {
        width: 400px;
        position: absolute;
        top: -65px;
        left: -70px;
        /* box-shadow: 10px 10px 5px red; */
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

    .profile {
        border-radius: 100%;
        height: 100px;
        width: 100px;
    }

    .scroll {
        overflow: scroll;
        height: 600px;
    }

    .link {
        background-color: gold;
        font-size: 26px;
        padding: 4px 7px 4px 7px;
        border-radius: 100%;
        color: white;
    }

    /* card css */
</style>

<body id="body-pd">
    <header class="header" id="header" style="box-shadow: 10px 10px 5px #aaaaaa;">

        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> <img class="logo" src="{{ asset('asset/img/logo.png') }}" style="height: 50px;" />
        </div>

        <div>
            <a class="nav-link sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <span class="me-2">
                    <i class="bi bi-person-circle"></i>
                    <span style="color: black">{{ Auth::user()->name }}</span>
                    <span class="right-icon ms-auto">
                        <i class="bi bi-chevron-down"></i>
                    </span>
            </a>
        </div>

    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <img class="logo" src="{{ asset('asset/img/icon1.jpg') }}" style="height: 50px;" /> </a>
                <div class="nav_list">
                    <a href="{{ route('account.card') }}" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">MyCards</span> </a>

                    <a href="{{ route('account.account') }}" class="nav_link active"> <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Account</span> </a>

                    <a href="{{ route('logout') }}" class="nav_link active" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span> </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <div class="secondnav" style="padding-top: 80px;">
        {{-- <a href="" class="mycard text-center">
            Details
        </a>&nbsp;&nbsp; --}}
        <a href="{{ route('link.create') }}" class="mycard text-center">
            Links
        </a>&nbsp;&nbsp;
        <a href="{{ route('services.create') }}" class="mycard text-center">
            Services

        </a>&nbsp;&nbsp;
        <a href="{{ route('portolio.create') }}" class="mycard text-center">
            Portfolio
        </a>&nbsp;&nbsp;
    </div>
    <hr />
    <!--Container Main start-->
    {{-- <div class="container"> --}}
    <div class="row">
        <div class="col-sm-9 scroll" style="">
            <div class="bg-light pt-5">
                @yield('content')
            </div>
        </div>
        <div class="col-sm-3 text-center pt-5 scroll pb-5" style="background-color: #8B5CF6">
            <div class="" style="background-color: white">
                <div class="clash-card__image
                clash-card__image--barbarian pt-5">
                    <img src="{{ asset('asset/img/i1.png') }}" class="profile mx-auto d-block" alt="..."><br>
                </div>
                {{-- @foreach ($cardshow as $card) --}}
                <div class="clash-card__unit-name">
                    {{-- {{ $card->name }} --}}
                </div>
                {{-- @endforeach --}}

                <div class="d-grid gap-1 col-5 mx-auto">
                    <button class="btn btn-primary mt-2" type="submit">Contact Me</button>
                </div>
                <p class="card-text mt-5 fw-bold mb-3">Contact Details</p>
                <i class="bi bi-envelope link"></i>
                {{-- {{ $card->email }} --}}

                {{-- @foreach ($link as $link1)
                    <br>
                    {{ $link1->title }}:-
                {{ $link1->value }}
                @endforeach --}}

                <div class="clash-card__unit-description">
                    <div class="text-center mt-3 mb-3">
                        <button type="button" class="btn btn-secondary mx-3"><i class="bi bi-share-fill"></i>&nbsp;&nbsp;Send</button>
                        <button type="button" class="btn btn-secondary"><i class="bi bi-download"></i>&nbsp;&nbsp;Save
                            Contact</button>
                    </div>
                </div>

                <div class="text-center">
                    <p class="card-text">© 2022 Madhvi. All Rights Reserved.</p>
                    <a class="text-decoration-none text-reset" href="{{ route('account.card') }}">Create your
                        website in 2
                        minutes</a>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>

    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



    <script>
        document.addEventListener("DOMContentLoaded", function(event) {

            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                // Validate that all variables exist
                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        // show navbar
                        nav.classList.toggle('show')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }
            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // Your code to run since DOM is loaded and ready
        });
    </script>



</body>

</html>