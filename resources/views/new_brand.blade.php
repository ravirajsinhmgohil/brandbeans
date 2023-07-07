<!DOCTYPE html>
<html lang="en" id="single-wrapper">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Brandbeans</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="{{ asset('asset/css/waves.min.css') }}">

</head>


<body>
    <div id="single-wrapper">
        <div class="w-50">


            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            @if ($message = Session::get('warning'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong><i class="fa fa-warning ico"></i> {{ $message }}</strong>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Oh snap!</strong> {{__('There were some problems with your input')}}.
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('brand.register.store') }}" method="post" class="frm-single">
                @csrf

                <div class="inside">
                    <div class="frm-title">
                        <img src="{{asset('asset/img/logo.png')}}" alt="" style="height: 22%; width:22%;">
                    </div>
                    <!-- /.title -->
                    <div class="frm-title"></div>
                    <!-- /.frm-title -->
                    <div class="frm-input" style="width: 90%;"><input type="name" placeholder="Name" class="frm-inp  @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name"><i class="fa fa-user frm-ico"></i>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="frm-input" style="width: 90%;"><input type="text" placeholder="Create Your Unique Username" class="frm-inp  @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username"><i class="fa fa-user-secret frm-ico"></i>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="frm-input" style="width: 90%;"><input type="email" placeholder="Email" class="frm-inp @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email"><i class="fa fa-envelope frm-ico"></i>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="frm-input" style="width: 90%;"><input type="text" placeholder="Add your Mobile Number" class="frm-inp  @error('mobileno') is-invalid @enderror" value="{{ old('mobileno') }}" id="mobileno" name="mobileno"><i class="fa fa-phone frm-ico"></i>
                        @error('mobileno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="frm-input" style="width: 90%;"><input type="password" placeholder="Password" class="frm-inp  @error('password') is-invalid @enderror" id="password" name="password"><i class="fa fa-lock frm-ico"></i>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="frm-input" style="width: 90%;"><input type="password" placeholder="Confirm Password" class="frm-inp" id="password_confirmation" name="confirm-password"><i class="fa fa-lock frm-ico"></i></div>


                    <!-- /.clearfix -->
                    <button type="submit" class="frm-submit">Register<i class="fa fa-arrow-circle-right"></i></button>

                    <a href="/">
                        <div class="frm-footer">Brandbeans © <script>
                                document.write(new Date().getFullYear())
                            </script>.</div>
                    </a>
                    <!-- /.footer -->
                </div>
                <!-- .inside -->
            </form>
        </div>
    </div>
    <!-- /.frm-single -->
    <!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="assets/script/html5shiv.min.js"></script>
  <script src="assets/script/respond.min.js"></script>
 <![endif]-->
    <!--
 ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('asset/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/scripts/nprogress.js') }}"></script>
    <script src="{{ asset('asset/scripts/waves.min.js') }}"></script>

    <script src="{{ asset('asset/scripts/main.min.js') }}"></script>

</body>

</html>