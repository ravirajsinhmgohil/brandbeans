<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/style.min.css') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">

</head>

<body>

    <div id="page-404">
        <div class="content">
            <div class="title-on-desktop">
                <svg style="width: 600px; height: 200px" alignment-baseline="middle">
                    <defs>
                        <clipPath id="clip2">
                            <path d="M 0 0 L 600 0 L 600 80 L 0 80 L 0 0 L 0 125 L 600 125 L 600 200 L 0 200 Z" />
                        </clipPath>
                    </defs>
                    <text x="300" y="190" style="width: 600px; height: 200px" text-anchor="middle" font-family="Lato" font-weight="700" font-size="250" fill="#ff5b5b" clip-path="url(#clip2)">500</text>
                </svg>
                <div class="title">INTERNAL SERVER ERROR</div>
            </div>
            <h1 class="title-on-mobile">Error 500: Internal server error</h1>
            <p>The server encountered an internal error of misconfiguration and was unable to complete your request</p>
            <a href="{{ URL::previous() }}" class="btn btn-success">Return home</a>

        </div>
    </div> <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('assets/plugin/waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/scripts/main.min.js') }}"></script>
</body>

</html>
