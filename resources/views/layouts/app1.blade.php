<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">


    <title>BrandBeans</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{ asset('assets/styles/style.min.css') }}">

    <!-- bootstrap 5 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/sweet-alert/sweetalert.css') }}">
    <!-- Percent Circle -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/percircle/css') }}/percircle.css')}}">

    <!-- Chartist Chart -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/chart/chartist/chartist.min.css') }}">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.print.css') }}" media='print'>

    <!-- Dropify -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/dropify/css/dropify.min.css') }}">

    <!-- Color Picker -->
    <link rel="stylesheet" href="{{ asset('assets/color-switcher/color-switcher.min.css') }}">

    <!-- Bootstrap 5 Alerts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/toastr/toastr.css') }}">

    <!-- FlexDatalist -->
    <link rel="stylesheet" href="{{ asset('assets/plugin/flexdatalist/jquery.flexdatalist.min.css') }}">


    <!-- Select2 -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugin/select2/css/select2.min.css') }}"> --}}

    <!-- drop down  -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


</head>

<body>
    <div class="main-menu" style="background-color: #03ACF0;">
        <header class="header" style="background-color: #03ACF0;">
            <a href="{{ url('/home') }}" style="background-color: white;" class="logo"><img src="{{ asset('asset/img/logo.png') }}" style="width:150px" class="img-fluid" /></a>
            <button type="button" class="button-close fa fa-times js__menu_close" style="color: #03ACF0;"></button>
            <div class="user">
                <h5 class="name"><a class="text-white fs-3" href="#">{{ Auth::user()->name }}</a></h5>
                <!-- /.name -->
                <div class="control-wrap js__drop_down">
                    <i class="fa fa-aret-down "></i>
                    <div class="control-list">
                        <div class="control-item"><a class="dropdown-item font" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- /.control-list -->
                </div>
                <!-- /.control-wrap -->
            </div>
            <!-- /.user -->
        </header>
        <!-- /.header -->
        <div class="content">

            <div class="navigation ">
                <!-- /.title -->
                <ul class="menu js__accordion">

                    @include('layouts.menu')

                    <br><br>
                </ul>

            </div>

        </div>

    </div>
    <!-- /.main-menu -->

    <div class="fixed-navbar" style="background-color: #03ACF0;">
        <div class="pull-left">
            <button type="button" style="background-color: #03ACF0;" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
            <h1 class="page-title">@yield('header')</h1>
            <!-- /.page-title -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right">

            <a class="text-white ico-item fa fa-power-off" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            </a>
            <div class="ico-item fa fa-arrows-alt js__full_screen text-white"></div>

        </div>
        <!-- /.pull-right -->
    </div>


    <!-- /#notification-popup -->



    <!-- #color-switcher -->

    <div id="wrapper">
        <div class="main-content">
            @yield('content')
        </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('assets/plugin/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/waves/waves.min.js') }}"></script>
    <!-- Full Screen Plugin -->
    <script src="{{ asset('assets/plugin/fullscreen/jquery.fullscreen-min.js') }}"></script>

    <!-- Percent Circle -->
    <script src="{{ asset('assets/plugin/percircle/js/percircle.js') }}"></script>

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Chartist Chart -->
    <script src="{{ asset('assets/plugin/chart/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/chart.chartist.init.min.js') }}"></script>

    <!-- FullCalendar -->
    <script src="{{ asset('assets/plugin/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/fullcalendar.init.js') }}"></script>

    <!-- Data Tables -->
    <script src="{{ asset('assets/plugin/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/datatables/extensions/Responsive/js/responsive.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/datatables.demo.min.js') }}"></script>

    <!-- <script src="{{ asset('assets/scripts/main.min.js') }}"></script> -->
    <script src="{{ asset('assets/color-switcher/color-switcher.min.js') }}"></script>
    <!-- -------------------- -->

    <!-- Full Screen Plugin -->
    <script src="{{ asset('assets/plugin/fullscreen/jquery.fullscreen-min.js') }}"></script>


    <!-- Dropify -->
    <script src="{{ asset('assets/plugin/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/fileUpload.demo.min.js') }}"></script>

    <script src="{{ asset('assets/scripts/main.min.js') }}"></script>


    <!-- Toastr -->
    <script src="{{ asset('assets/plugin/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/toastr.demo.min.js') }}"></script>


    <!-- Select2 -->
    <script src="{{ asset('assets/plugin/select2/js/select2.min.js') }}"></script>

    <!-- Multi Select -->
    <script src="{{ asset('assets/plugin/multiselect/multiselect.min.js') }}"></script>

    <!-- Flex Datalist -->
    <script src="{{ asset('assets/plugin/flexdatalist/jquery.flexdatalist.min.js') }}"></script>

    <!-- Demo Scripts -->
    <script src="{{ asset('assets/scripts/form.demo.min.js') }}"></script>
    <!-- dropdown -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                theme: "classic"
            });
        });
    </script>
</body>

</html>
