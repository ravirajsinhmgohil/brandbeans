@extends('layouts.app')
@section('header', 'Home')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('content')
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-12">

                <a href="#">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box-content">
                                <h4 class="box-title text-danger"> Users</h4>

                                <div class="content widget-stat">
                                    <div id="traffic-sparkline-chart-1" class="left-content margin-top-15"></div>
                                    <div class="right-content">
                                        <h2 class="counter text-info"> <a href="{{ route('accountpost.index') }}">
                                                <span class="fs-2 text-info"> {{ $users }} </span>
                                            </a></h2>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="box-content bordered info js__card">
                                <h4 class="box-title with-control">
                                    <i class="bi bi-person-add fs-2"></i> PAID

                                </h4>
                                <div class="js__card_content">
                                    <a href="{{ route('accountpost.index') }}?type=Paid">
                                        <span class="fs-2"> {{ $paidUsers }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box-content bordered info js__card">
                                <h4 class="box-title with-control">
                                    <i class="bi bi-person fs-2"></i> FREE
                                </h4>
                                <div class="js__card_content">
                                    <a href="{{ route('accountpost.index') }}?type=Free">
                                        <span class="fs-2"> {{ $freeUsers }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="js__card_content">


                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="box-content bordered info js__card">
                                <h4 class="box-title with-control">
                                    <i class="bi bi-person-heart fs-2"></i> Influencer

                                </h4>
                                <div class="js__card_content">
                                    <a href="{{ route('users.index') }}?roleSearch=Influencer">
                                        <span class="fs-2"> {{ $influencer }} </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-content bordered info js__card">
                                <h4 class="box-title with-control">
                                    <i class="bi bi-people fs-2"></i> Brand

                                </h4>
                                <div class="js__card_content">
                                    <a href="{{ route('users.index') }}?roleSearch=Brand">
                                        <span class="fs-2"> {{ $brand }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-content bordered info js__card">
                                <h4 class="box-title with-control">
                                    <i class="ico fa fa-user fs-2"></i> Reseller
                                </h4>
                                <div class="js__card_content">
                                    <a href="{{ route('users.index') }}?roleSearch=Reseller">
                                        <span class="fs-2"> {{ $reseller }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box-content bordered info js__card">
                                <h4 class="box-title with-control">
                                    <i class="bi bi-pen fs-2"></i> Writer
                                </h4>
                                <div class="js__card_content">
                                    <a href="{{ route('users.index') }}?roleSearch=Writer">
                                        <span class="fs-2"> {{ $writer }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="box-content bordered info js__card">
                                <h4 class="box-title with-control">
                                    <i class="bi bi-brush fs-2"></i> Designer
                                </h4>
                                <div class="js__card_content">
                                    <a href="{{ route('users.index') }}?roleSearch=Designer">
                                        <span class="fs-2"> {{ $designer }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>

            </div>

            <div class="col-md-12">

                <div class="col-md-6">
                    <div class="box-content bordered info js__card">
                        <h4 class="box-title with-control">
                            <i class="ico fa fa-pencil-square-o fs-2"></i>Pending Slogans
                        </h4>
                        <div class="js__card_content">
                            <a href="{{ route('adminslogan.adminslogan') }}?type=Pending">
                                <span class="fs-2"> {{ $pendingSlogans }}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-content bordered info js__card">
                        <h4 class="box-title with-control">
                            <i class="ico fa fa-image fs-2"></i>Pending Designs
                        </h4>
                        <div class="js__card_content">
                            <a href="{{ route('admindesign.admindesign') }}?type=Pending">
                                <span class="fs-2"> {{ $pendingDesign }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <!-- Sparkline Chart -->
    <script src="{{ asset('assets/plugin/chart/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/chart.sparkline.init.min.js') }}"></script>

    <script src="{{ asset('assets/scripts/main.min.js') }}"></script>
    <script src="{{ asset('assets/color-switcher/color-switcher.min.js') }}"></script>



    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        var userData = <?php echo json_encode($users); ?>;
        Highcharts.chart('chart', {
            title: {
                text: 'New User Growth, 2020'
            },

            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Number of New Users'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Users',
                data: userData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 1000
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>

@endsection
