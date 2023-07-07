<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Icon  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">
    <title>BrandBeans</title>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light main-header">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('asset/img/png.png')}}" class="img-fluid logo" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Showcase</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                            <!-- <a class="nav-link" href="{{route('otp.login')}}">Login</a> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('otp.login')}}">Register</a>
                        </li>
                        <!-- <li class="nav-item">
              <a class="nav-link" href="#plans">Our Plans</a>
            </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>



    <div class="container">
        @yield('content')
    </div>

    <!-- Banner -->
    <div class="banner p-5">
        <div class="container">
            <div class="row justify-content-between mb-5">
                <div class="col-md-8 header-text ms-5">
                    <h1>
                        CREATE YOUR<br>
                        <b>
                            DIGITAL BUSINESS <br> CARD
                        </b>
                    </h1>
                    <!-- <p class="my-3 fs-6">Create your virtual business card in a matter of minutes with eye-catching, rich content.
            Send out your digital business card at any time and from any location. With our simple interface, you can
            quickly update your Virtual Business Card without having to print a new card for each modification.</p> -->
                    <div class="play my-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-play-circle-fill " viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                        </svg>
                        <a href="{{route('otp.login')}}" class="btn mx-5 py-3 px-5 button text-white">Create Your Card</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--How Business Card Works  -->
    <div class="container">
        <div class="row">
            <h1 class="text-center">How it Works?</h1>
            <hr class="hrs mx-auto">
        </div>
        <div class="row justify-content-evenly">
            <div class="col-md-12 col-lg-3">
                <div class="card card-vb mt-3 height">
                    <!-- <img src="" class="card-img-top" alt="..."> -->
                    <i class="bi bi-person-add size" style="padding-left: 1rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Register</h5>
                        <p class="card-text">Register yourself to create your Virtual Business Card with Us.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card card-vb mt-3 height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-file-earmark-arrow-up-fill size" style="padding-left: 1rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Update Profile</h5>
                        <p class="card-text">Our Login Panel is accessible anytime from anywhere.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="card card-vb mt-3 height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-share-fill size" style="padding-left: 1rem;"></i>
                    <div class="card-body">
                        <h5 class="card-title">Share</h5>
                        <p class="card-text">You can share your Digital Business Card from anywhere & anytime. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create your cards  -->
    <div class="container-fluid bg-blue mt-5">
        <div class="row justify-content-evenly">
            <div class="col-lg-5 text-white p-5">
                <h2>Design, Edit, and Publish easily.​​​</h2>
                <p>Brag about your Business everywhere, anytime! Brandbeans enables you to create digital business card without any sort of coding. Choose from our pre-desinged business card templates, simply add your details and you are good to go. Exchange Business identity with Brandbeans.</p>
                <ul>
                    <li>Action Button</li>
                    <li>WhatsApp Button</li>
                    <li>Custom Color</li>
                    <li>Social Links</li>
                    <li>Payments Links</li>
                    <li>Address & Google Map</li>
                    <li>PDF Attachments</li>
                    <li>Youtube</li>
                    <li>Education & Work Experience</li>
                </ul>
                <a href="#" class="text-white">and more..</a>
            </div>
            <div class="col-lg-5 p-5">
                <img src="{{asset('asset/img/businessmen.png')}}" alt="" class="img-fluid">
            </div>
        </div>

    </div>

    <!-- Features -->
    <div class="container my-5">
        <div class="row">
            <h1 class="text-center">Our Digital Business Card Features</h1>
            <hr class="hrs mx-auto">
        </div>

        <div class="row text-center">

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <i class="bi bi-pencil-square size"></i>
                    <!-- <img src="" class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class="card-title">Easy To Update</h5>
                        <p class="card-text">You are free to change your information as often as you like.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="" class="card-img-top" alt="..."> -->
                    <i class="bi bi-person-lines-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Save to Contacts</h5>
                        <p class="card-text">All of your contact information is accessible in a person's phone address book.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-send-check-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Unlimited Share</h5>
                        <p class="card-text">Using social media and Whatsapp, you may send your digital business card to anyone an
                            endless number of times.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-facebook size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Website & Social Links</h5>
                        <p class="card-text">Customers can use the digital business card to visit your websites and social media
                            accounts.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-geo-alt-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Get Directions</h5>
                        <p class="card-text">Utilizing a digital business card, customers may use Google Maps to find your location.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-envelope-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Click to Email</h5>
                        <p class="card-text">Your consumer will be able to email you from the card with only one click.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-whatsapp size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Click To WhatsApp</h5>
                        <p class="card-text">Through this card, your clients can whatsapp you without even saving your phone number!
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-telephone-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Click to Call</h5>
                        <p class="card-text">Customers can call you by just pressing the mobile number on the card.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-currency-rupee size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Payment Info</h5>
                        <p class="card-text">Show your consumers your payment information, such as Paytm, Phonepe, Google Pay, and a
                            bank account (Including QR code)</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-chat-dots-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Capture Leads</h5>
                        <p class="card-text">With an inquiry form, you can collect leads using a virtual business card. Email
                            notification will be sent to you for each inquiry.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-youtube size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Youtube Videos</h5>
                        <p class="card-text">By including YouTube videos connected to your business in your virtual business card,
                            you can impress customers.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-images size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Photo Gallery</h5>
                        <p class="card-text">Customers can view a gallery of photographs and products related to your business.</p>
                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-eye-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Visitation</h5>
                        <p class="card-text">The number of unique visitors is visible on your business card.</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-3 my-3">
                <div class="card card-vb height">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <i class="bi bi-reply-all-fill size"></i>
                    <div class="card-body">
                        <h5 class="card-title">Feedback</h5>
                        <p class="card-text">Get star ratings on your card and quicker feedback about your services.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- New Ways -->
    <div class="container-fluid ">
        <div class="row ">
            <a href="{{route('otp.login')}}">
                <div class="col-sm-12 bg-blue text-center p-5">
                    <h1 class="text-white">Create your virtual business profile for FREE in just one click</h1>
                    <hr class="hrs mx-auto">
                    <button type="button" class="btn btn-light px-5 py-2 m-3">Get Digital Card Now</button>
                </div>
            </a>
        </div>
    </div>

    <!-- Footer  -->
    <div class="container-fluid">
        <footer class="row p-5">
            <div class="col-md-5 my-3">
                <a href="#" class="mb-3">
                    <img src="{{asset('asset/img/png.png')}}" class="img-fluid logo" alt="Logo">
                </a>


            </div>

            <div class="col-md-2 my-3">
                <h5>Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{route('term')}}" class="nav-link p-0 text-muted">Terms</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{route('about')}}" class="nav-link p-0 text-muted">About</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{route('contact')}}" class="nav-link p-0 text-muted">Contact</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{route('privacy')}}" class="nav-link p-0 text-muted">Privacy</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{route('refund')}}" class="nav-link p-0 text-muted">Refund</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 my-3">
                <h5>Quick Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Showcase</a></li>
                    <li class="nav-item mb-2">
                        <a href="{{route('otp.login')}}" class="nav-link p-0 text-muted">Login</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{route('otp.login')}}" class="nav-link p-0 text-muted">Register</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{route('term')}}" class="nav-link p-0 text-muted">Terms</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 my-3">
                <h5>Contact Us</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt text-muted" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg><label for="Address" class="ms-2 text-muted">Ahmadabad, Gujarat</label>
                    </li>
                    <li class="nav-item mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone text-muted" viewBox="0 0 16 16">
                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg><label for="Contact-No" class="ms-2 text-muted">+91 7600891148</label>
                    </li>
                    <li class="nav-item mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope text-muted" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                        </svg><label for="email" class="ms-2 text-muted">support@brandbeans.biz</label>

                    </li>
                </ul>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <svg class="bi" width="30" height="24">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">Brandbeans © 2022 Copyright, All Rights Reserved</span>
                </div>

                <ul class="nav col-md-4 justify-content-end d-flex">
                    <li class="ms-3"><a href="https://www.facebook.com/BrandBeans-108225125477620">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a></li>
                    <li class="ms-3"><a href="https://www.instagram.com/brand_beans_/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg>

                        </a></li>
                    <li class="ms-3"><a href="#">

                        </a></li>
                </ul>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>