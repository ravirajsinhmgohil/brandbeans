<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BrandBeans</title>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('asset/css/mycard/card.css') }}" class="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
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
        <nav class="nav navside">
            <div> <a href="#" class="nav_logo"> <img class="logo" src="{{ asset('asset/img/fevicon.png') }}" style="height:70px" /> </a>
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
    <!--Container Main start-->
    <div class="bg-light" style="padding-top: 80px; height: 200%;">
        @yield('content')
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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