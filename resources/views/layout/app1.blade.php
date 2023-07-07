<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BrandBeans</title>
    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="{{ asset('js/app.js') }}" defer></script>






    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('asset/css/adminstyle.css') }}">



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: white">
        <div class="container-fluid">
            <!-- Offcanvas triger -->

            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Offcanvas triger -->
            <img class="logo" src="{{ asset('asset/img/logo.jpg') }}" style="height: 60px;" />
            <hr />
        </div>
        </div>
    </nav>

    <!--End Navbar -->

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-start text-white sidebar-nav" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="background-color: plum">

        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <img class="logo" src="{{ asset('asset/img/icon.jpg') }}" style="height: 60px;" />

                    <li>
                        <a href="" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>



                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-speedometer2"></i>
                        </span>
                        <span>Login</span>
                    </a>
                    </li>

                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-speedometer2"></i>
                        </span>
                        <span>Register</span>
                    </a>
                    </li>

                    <a href="#" class="nav-link px-3 active">
                        <span class="me-2">
                            <i class="bi bi-building"></i>
                        </span>
                        <span>Company profile</span>
                    </a>

                    </li>

                    <li>
                        <a href="#" class="nav-link px-3 active">
                            <span class="me-2">
                                <i class="bi bi-people-fill"></i>
                            </span>
                            <span>Candidate</span>
                        </a>
                    </li>

                </ul>
        </div>
    </div>
    </nav>


    <!--End Offcanvas -->
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row p-4">
                @yield('content')
            </div>
        </div>

    </main>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable({});
        });
    </script>

</body>

</html>