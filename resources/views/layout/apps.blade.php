<!DOCTYPE html>
<html>
<title>BrandBeans</title>
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
<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

<link href="{{ asset('asset/css/dcard/apps.css') }}" rel="stylesheet">




<body>
    <div class="row">
        <div class="col">
            <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left section1" style="width:25%;" id="mySidebar">
                <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
                <img class="logo img-fluid" src="{{ asset('asset/img/logo.png') }}" style="height: 50px;" />
                <br><br>
                <a href="{{ route('account.card') }}" class="w3-bar-item w3-button text-center">
                    <i class="bi bi-credit-card-2-front fa-5x"></i><br>
                    <h6>MyCards</h6>
                </a>
                {{-- <a href="{{ route('leads.create') }}" class="w3-bar-item w3-button text-center"><i class="bi bi-chat-square-dots fa-5x"></i><br>
                <h6>Leads</h6>
                </a>
                <a href="{{ route('analytics.create') }}" class="w3-bar-item w3-button text-center"><i class="bi bi-tropical-storm fa-5x"></i><br>
                    <h6>Analytics</h6>
                </a>
                <a href="#" class="w3-bar-item w3-button text-center"><i class="bi bi-wifi fa-5x"></i><br>
                    <h6>NFC</h6>
                </a> --}}
                <a href="#" class="w3-bar-item w3-button text-center"><i class="bi bi-person fa-5x"></i><br>
                    <h6>Account
                    </h6>
                </a>

            </div>

            <div class="w3-main bg-danger" style="margin-left:130px">
                <div class="w3-teal">
                    <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
                    <div class="w3-container">
                        <img class="logo" src="{{ asset('asset/img/icon.jpg') }}" style="height: 60px;" />
                    </div>
                    <hr />
                </div>
            </div>
        </div>
    </div>
    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
    <div class="container">

        @yield('content')
    </div>


</body>

</html>