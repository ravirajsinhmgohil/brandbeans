<header>
    <nav class="navbar navbar-expand-lg navbar-light main-header shadow-sm p-3 bg-body">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('asset/img/logo.png') }}" class="img-fluid logo" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('main.brandStory') }}">Brand Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('main.influencer') }}">Influencers</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        <!-- <a class="nav-link" href="{{ route('otp.login') }}">Login</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('otp.login') }}">Register</a>
                    </li>
                    <!-- <li class="nav-item">
          <a class="nav-link" href="#plans">Our Plans</a>
        </li> -->
                </ul>
            </div>
        </div>
    </nav>
</header>
