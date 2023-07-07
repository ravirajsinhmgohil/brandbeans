<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>viewcard</title>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">


</head>
<style>
    body {
        background-image: url("{{ asset('asset/img/bg.jpg') }}");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        /* background-color:  red; */
        /* padding-bottom: 100px; */
    }


    .text {

        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #00306b;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #09b8eb;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

    }

    .footer-icon {
        color: #01B9F1;
        text-align: center;
        font-size: 20px;
        margin-bottom: 0px;
    }

    .abc {
        text-decoration: none;
        color: black;
    }

    .box {
        border-radius: 15px;
        background-color: white;
    }

    .footer {
        position: fixed;
        bottom: 20px;
        /* width: 100%; */
        /* background-color: red !important; */
        margin: 0 10px;
        border-radius: 8px;
    }

    .link1 {
        color: white;
        text-decoration: none;
    }

    .sectioncard2 {
        border-top: 10px solid #01B9F1;
        border-bottom: 10px solid #002E6E;
        /* padding: 10px; */
        line-height: 25px;

    }

    .btn1 {
        background-color: #002E6E;
        transition: 0.5s;
        border: 0;
    }

    .btn1:hover {
        background-color: #01B9F1;
        transition: 0.5s;
    }

    .icon {
        border-radius: 50px;
        background-color: white;
        color: #002E6E;
        text-align: center;
        padding: 8px 12px;
        font-size: 15px;
    }

    .icon1 {
        border-radius: 50px;
        background-color: #01B9F1;
        color: #002E6E;
        text-align: center;
        padding: 8px 12px;
        font-size: 15px;
        color: white;
    }

    .num {
        /* word-spacing: 10px; */
        line-height: 30px;
        color: white;
    }

    .col1 {
        background-color: #fff;
        color: #000;
        padding: 5px;
        border-radius: 15px;
    }

    .images {
        height: 100px;
        width: 150px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        /* border: 2px solid grey; */
    }

    .icon2 {
        border-radius: 50px;
        background-color: #002E6E;
        color: white;
        text-align: center;
        padding: 8px 12px;
        font-size: 15px;
    }

    .text1 {
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
    }

    .text2 {
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
    }

    .gmail {
        border: 1px solid gainsboro;
        padding: 5px;
        background-color: white;
        border-radius: 50%;
    }

    .backimg {
        background-image: url('../../../asset/img/herro.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;

    }

    a {
        text-decoration: none;
    }

    a:hover {

        color: #01B9F1;
    }

    .font {
        color: #002E6E;
    }

    .fix-btn {
        position: fixed;
        top: 35%;
        right: 10px;
    }

    .size {
        width: 35%;
    }

    .serviceimg {
        width: 100px;
        height: 100px;
        border-radius: 50px;
    }

    @media only screen and (max-width: 786px) {
        .fix-btn {
            position: sticky;
            display: flex;
            top: 16px;
            justify-content: end;
            z-index: 1;
        }

        body {
            background: #fff;
        }

        .size {
            width: 100%;
        }

        .serviceimg {
            width: 150px;
            height: 100px;
            border-radius: 0;
        }
    }



    @media only screen and (max-width: 500px) {
        .fix-btn {
            position: sticky;
            display: flex;
            top: 16px;
            justify-content: end;
            z-index: 1;
        }

        body {
            background: #fff;
        }

        .serviceimg {
            width: 200px;
            height: 150px;
            border-radius: 0;
        }
    }

    @media only screen and (max-width: 600px) {
        .fix-btn {
            position: sticky;
            display: flex;
            top: 16px;
            justify-content: end;
            z-index: 1;
        }

        .serviceimg {
            width: 150px;
            height: 100px;
            border-radius: 0;
        }
    }

    @media only screen and (max-width: 700px) {
        .fix-btn {
            position: sticky;
            display: flex;
            top: 16px;
            justify-content: end;
            z-index: 1;
        }

        .serviceimg {
            width: 150px;
            height: 100px;
            border-radius: 0;
        }
    }
</style>

<body>

    <div class="fix-btn"><a class="btn btn1 text-white rounded-pill" href="{{route('register')}}">Create Your Card</a></div>
    <div class="container col-md-12">

        {{-- card 1 --}}
        <div id="home" class="card mx-auto mt-3 sectioncard2 size">
            <div class="row text-center">
                <h6><span class="badge" style="background-color: #01B9F1;">Total View {{$count->counter}}</span></h6>
            </div>
            <div class="mt-2 text-center">
                @if($card)
                <img src="{{ url('cardlogo') }}/{{$card->logo}}" alt="" class="img-thumbnail" style="height: 100px; width:150px; text-align:center;">
                @else
                <img src="{{ asset('asset/img/default.jpg') }}" alt="Your Profile" title="Your Profile" class="" style="height: 100px; width:100px; border-radius: 50px;">
                @endif
            </div>
            <div class="">
                <div class="my-3 text-center backimg">
                    @if($user->profilePhoto)
                    <img src="{{ url('profile') }}/{{$user->profilePhoto}}" alt="" class="" style="height: 100px; width:100px; border-radius: 50px;">
                    @else
                    <img src="{{ asset('asset/img/default.jpg') }}" alt="Your Profile" title="Your Profile" class="" style="height: 100px; width:100px; border-radius: 50px;">
                    @endif
                </div>
            </div>


            <div class="card-body ">
                <div class="bg-white pb-4 ps-3 pe-3 text-center">
                    <div class="mb-3">
                        <h3 class="fw-bold text-center"><span style="color: #002E6E">
                                @if($card)
                                <b>{{$card->name}}</b>
                            </span> @endif</h3>
                        <p class="fw-bold"> @if($card)
                            ({{$card->heading}})
                            @else
                            <span class="text-muted">No data</span>
                            @endif
                        </p>
                        <p> @if($card)
                        <p class="mt-2 " style="text-align: justify;">{{$card->about}}</p>

                        @else
                        <p class="card-text text-muted mt-2">Profile not Updated</p>
                        @endif</p>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#002E6E" fill-opacity="1" d="M0,256L80,229.3C160,203,320,149,480,149.3C640,149,800,203,960,208C1120,213,1280,171,1360,149.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
                </path>
            </svg>
            <div style="background-color: #002E6E;">
                <div class="row">
                    <div class="container">
                        <table class="table text-white text-center" style="border: #00306b;">
                            <tbody>
                                <tr>
                                    <td class="text-end"><i class="bi bi-telephone-fill icon"></i></td>
                                    <td class="text-start"><a href="tel:{{$user->mobileno}}"> <span class="num">
                                                @if($links->phone1)
                                                {{$links->phone1}}
                                            </span> </a></td>
                                    @else
                                    <span class="text-muted">No Phone number found</span>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="text-end w-25"><i class="bi bi-envelope icon"></i></td>
                                    <td class="text-start w-50">@if($user->email) <a href="mailto:{{$user->email}}" target="_blank"> <span class="num"> {{$user->email}}</span></a> </td>
                                    @else
                                    <span class="text-muted">No Email found</span>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="text-end w-25"><i class="bi bi-globe icon"></i></td>
                                    <td class="text-start w-50">@if($web->website) <a href="{{$web->website}}" target="_blank"> <span class="num"> {{$web->website}}</span></a></td>
                                    @else
                                    <span class="text-muted">No website found</span>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        {{-- card 1 end --}}

        {{-- card 2 --}}
        <div id="aboutus" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pt-1 pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> About </span><span style="color: #01B9F1"> Us </span></h3>
                    <div class="row pt-3">
                        <div class="col">
                            <p class="fw-bold">Company name :</p>
                        </div>
                        <div class="col">
                            @if($card)
                            <p class="col1">{{$card->companyname}}</p>
                            @else
                            <p class="text-muted">No data found</p>
                            @endif
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Establised from :</p>
                        </div>
                        <div class="col">
                            @if($card)
                            <p class="col1">{{$card->year}}</p>
                            @else
                            <p class="text-muted">No data found</p>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="fw-bold">Role of Business :</p>
                        </div>
                        <div class="col">
                            @if($card)
                            <p class="col1">{{$card->catName}}</p>
                            @else
                            <p class="text-muted">No data found</p>
                            @endif
                        </div>
                    </div>
                    <h3 class="fw-bold text-center mt-3"><span style="color: #002E6E"> Brief </span></h3>
                    @if($card)
                    <p class="mt-2" style="text-align: justify;">
                        {{$card->about}}
                    </p>
                    @else
                    <p class="text-muted">No data found</p>
                    @endif
                    <h5 class="fw-bold text-center mt-3"><span style="color: #002E6E"> Links : </span></h5>
                    <div class="row mt-3">
                        <div class="col-md-4 text-center">
                            <a href="{{$links->facebook}}" target="_blank"> <i class="bi bi-facebook fs-3"></i>
                                <p class="font fw-bold">Facebook</p>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{$links->instagram}}" target="_blank">
                                <i class="bi bi-instagram fs-3 text-danger"></i>
                                <p class="font fw-bold">instagram</p>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="{{$links->twitter}}" target="_blank">
                                <i class="bi bi-twitter text-info fs-3"></i>
                                <p class="font fw-bold">twitter</p>
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 text-center">
                            <a href="{{$links->linkedin}}" target="_blank">
                                <i class="bi bi-linkedin fs-3"></i>
                                <p class="font fw-bold">Linkedin</p>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="skype:{{$links->skype}}?chat" target="_blank">
                                <i class="bi bi-skype text-info fs-3"></i>
                                <p class="font fw-bold">Skype</p>
                            </a>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="mailto:{{$links->email}}" target="_blank">
                                <i class="bi bi-envelope-fill text-secondary fs-3"></i>
                                <p class="font fw-bold">Gmail</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- card 2 end --}}

        {{-- card 3 --}}
        <div id="services" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pt-1 pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Services </span></h3>
                    <?php

                    use Illuminate\Support\Facades\URL;
                    use PhpParser\Node\Stmt\Break_;

                    $count = 0;

                    ?>
                    @if(count($service) != 0)
                    @foreach($service as $service)
                    @php
                    $count++;
                    @endphp
                    @if($count%2 == 0)
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <h5 class="fw-bold"><span style="color: #002E6E"> {{$service->title}} </span></h5>
                            <p class="" style="text-align: justify;">{{$service->description}}</p>
                        </div>
                        <div class="col-md-4 pt-3">
                            <img src="{{url('servicedetailimg')}}/{{$service->photo}}" alt="img" class=" serviceimg">
                        </div>
                    </div>
                    <hr>
                    @else
                    <div class="row mt-3">
                        <div class="col-md-4 pt-3">
                            <img src="{{url('servicedetailimg')}}/{{$service->photo}}" alt="img" class=" serviceimg">
                        </div>
                        <div class="col-md-8">
                            <h5 class="fw-bold"><span style="color: #002E6E"> {{$service->title}} </span></h5>
                            <p class="" style="text-align: justify;">{{$service->description}}</p>
                        </div>
                    </div>
                    <hr>

                    @endif
                    @endforeach
                    @else

                    <span class="text-muted">No Data found</span>
                    @endif
                </div>
                <!-- <a href="#enquiry" class="btn btn-primary btn1"> Enquiry Now </a> -->

            </div>
        </div>

        {{-- card 3 end --}}

        {{-- card 4 --}}
        <div id="payment" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                @if(count($payment) != 0)
                @foreach($payment as $payment)
                <div class="bg-white pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Payment </span></h3>
                    @if($payment->bankName)
                    <label for="" class="font fw-bold">Bank Name</label>
                    <p>{{$payment->bankName}}</p>
                    @else
                    <label for="" class="font fw-bold">Bank Name </label>
                    <p class="text-muted">no details uploded</p>
                    @endif
                    @if($payment->accountHolderName)
                    <label class="font fw-bold" for="accountholdername">Account holder name</label>
                    <p>{{$payment->accountHolderName}}</p>
                    @else
                    <label class="font fw-bold" for="accountholdername">Account holder name</label>
                    <p class="text-muted">no details uploded</p>
                    @endif

                    @if($payment->accountNumber)
                    <label class="font fw-bold" for="bankaccountnumber">Bank Account Number</label>
                    <p>{{$payment->accountNumber}}</p>
                    @else
                    <label class="font fw-bold" for="accountholdername">Bank Account Number</label>
                    <p class="text-muted">no details uploded</p>
                    @endif

                    @if($payment->accountType)
                    <label class="font fw-bold" for="accountholdername">Account Type</label>
                    <p>{{$payment->accountType}}</p>
                    @else
                    <label class="font fw-bold" for="accountholdername">Account Type</label>
                    <p class="text-muted">no details uploded</p>
                    @endif

                    @if($payment->ifscCode)
                    <label class="font fw-bold" for="ifsc">IFSC Code</label>
                    <p>{{$payment->ifscCode}}</p>
                    @else
                    <label class="font fw-bold" for="accountholdername">IFSC Code</label>
                    <p class="text-muted">no details uploded</p>
                    @endif

                    @if($payment->upidetail)
                    <label class="font fw-bold" for="ifsc">UPI Detail</label>
                    <p>{{$payment->upidetail}}</p>
                    @else
                    <label class="font fw-bold" for="accountholdername">UPI Detail</label>
                    <p class="text-muted">no details uploded</p>
                    @endif

                    @endforeach
                    @else


                    <label class="font fw-bold" for="bankaccountnumber">Bank Account Number</label>
                    <p class="text-muted">no details uploded</p>
                    <label class="font fw-bold" for="accountholdername">Account Type</label>
                    <p class="text-muted">no details uploded</p>
                    <label class="font fw-bold" for="ifsc">IFSC Code</label>
                    <p class="text-muted">no details uploded</p>
                    <label class="font fw-bold" for="ifsc">UPI Detail</label>
                    <p class="text-muted">no details uploded</p>
                    @endif
                    <h4 class="fw-bold text-center"><span style="color: #002E6E"> QR </span><span style="color: #01B9F1"> Code : </span></h4>
                    @if(count($qrno) != 0)
                    <div class="row">
                        @foreach($qrno as $qrno)
                        <div class="col-md-6">
                            <p>{{$qrno->type}}</p>

                            <img src="{{ url('QRcodes') }}/{{$qrno->code}}" alt="" style="height: 100px; width: 100px;">
                        </div>
                        @endforeach
                    </div>

                    @else
                    <span class="text-muted">No QR found</span>
                    @endif

                </div>
            </div>
        </div>
        {{-- card 4 end --}}
        <div id="" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Brochure </span></h3>
                    <div class="row">
                        @if(count($bro) != 0)
                        @foreach($bro as $bro)
                        <div class="col-md-12 text-center">
                            <h5><a href="{{$bro->file}}" download> Download</a></h5>
                        </div>
                        @endforeach
                        @else
                        <span class="text-muted">No Brochure found</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- card 5 --}}
        <div id="gallary" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pt-1 pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Gallery </span></h3>
                    <div class="row mt-3">


                        @if(count($gallery) != 0)
                        @foreach($gallery as $gallery)
                        <div class="col-md-6 p-1">
                            @if($gallery->type == "Photo")
                            <img src="{{ url('cardimage')}}/{{$gallery->image}}" class="img-thumbnail" style="width:150px;height:100px">
                            @endif
                        </div>
                        @endforeach
                        @else
                        <span class="text-muted">No Data found</span>
                        @endif

                    </div>



                </div>
            </div>
        </div>

        {{-- card 5end --}}

        {{-- card 6 --}}
        <div id="videos" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Videos </span></h3>
                    @if(count($gallery1) != 0)
                    @foreach($gallery1 as $gallery1)
                    @if($gallery1->type == "Video")
                    <div class="col-md-12 py-1">
                        <iframe src="{!! $gallery1->image !!}" style="width: 100%;"></iframe>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <span class="text-muted">No Data found</span>
                    @endif
                </div>
            </div>
        </div>
        {{-- card 6 end --}}
        {{-- card 9 --}}
        <div id="reachus" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pt-1 pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Reach </span><span style="color: #01B9F1"> Us </span></h3>
                    <div class="row pt-3">
                        <div class="col-2 mt-2">
                            <i class="bi bi-geo-alt-fill icon2"></i>
                        </div>
                        <div class="col">
                            <p class="">
                                @if($card)
                                {{$card->city}}
                                <br>
                                {{$card->state}}
                                @else
                                <span class="text-muted">No data</span>
                            </p>
                            @endif
                        </div>

                    </div>
                    <div class="row pt-3">
                        <div class="col-2 mt-2">
                            <i class="bi bi-telephone icon2"></i>
                        </div>
                        <div class="col">
                            @if($links->phone1)
                            <p class=""> <a style="color: black;" href="tel:{{$user->mobileno}}">
                                    {{$links->phone1}}
                                </a></p>
                            @else
                            <p class="text-muted">No data</p>
                            @endif
                        </div>

                    </div>
                    <div class="row pt-3">
                        <div class="col-2 mt-2">
                            <i class="bi bi-envelope icon2"></i>
                        </div>
                        <div class="col">
                            <p class="">
                                @if($user->email)
                                <a style="color: black;" href="mailto:{{$user->email}}" target="_blank"> {{$user->email}}</a>
                                @else
                                <span class="text-muted">No data</span>
                                @endif
                            </p>

                        </div>

                    </div>
                    <div class="row pt-3">
                        <div class="col-2">
                            <i class="bi bi-globe icon2"></i>
                        </div>
                        <div class="col">
                            <p class="">
                                @if($web->website)
                                <a style="color: black;" href="{{$web->website}}" target="_blank"> {{$web->website}}</a>
                                @else
                                <span class="text-muted">No data</span>
                                @endif
                            </p>
                        </div>

                    </div>
                    <div class="row mb-3 mt-5">
                        <div class="col">
                            <form method="post" action="{{route('whatsapp')}}">
                                @csrf
                                <input type="hidden" name="url" value="{{url()->current()}}">
                                <input type="text" class="text text1" id="mobile" name="whatsapp" require aria-describedby="mobile" placeholder="Enter Phone No.">
                        </div>


                        <div class="col" style="margin-left: -20px;">
                            <button type="submit" class="btn text2" style="height:37px; background-color: #25D366; color:white;">Whatsapp &nbsp;<i class=" bi bi-whatsapp"></i></button>
                        </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        {{-- card 7 --}}
        <div id="feedback" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Feedback </span></h3>
                    <form class="" action="{{route('feedback.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="cardId" value="{{$user->id}}">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="text" name="name" id="name" placeholder="Enter Your Name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="text" name="email" id="email" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea type="text" class="text" name="message" id="message" placeholder="Enter Feedback"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn1 mb-3">Give Feedback</button>
                    </form>
                    <hr>
                    <div id="para1">
                        @if(count($feed) != 0)
                        <?php
                        $count = 0;
                        ?>
                        @foreach($feed as $feed)

                        <?php

                        $count++;

                        if ($count == 2) {

                        ?>
                            <div id="">
                                <!--  default show -->
                                <div class="card my-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$feed->name}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$feed->email}}</h6>
                                        <p class="card-text">{{$feed->message}}</p>
                                    </div>
                                </div>
                            </div>


                        <?php
                            break;
                        } else {

                        ?>
                            <div>
                                <div class="card my-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$feed->name}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{$feed->email}}</h6>
                                        <p class="card-text">{{$feed->message}}</p>
                                    </div>
                                </div>

                            </div>

                        <?php } ?>
                        <!-- show when click on read more -->
                        @endforeach
                        @else
                        <span class="text-muted">No data</span>
                        @endif
                    </div>


                    @if(count($feed1) != 0)
                    <div id="para" style="display: none;">
                        @foreach($feed1 as $feed1)
                        <div class="card my-3">
                            <div class="card-body">
                                <h5 class="card-title">{{$feed1->name}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$feed1->email}}</h6>
                                <p class="card-text">{{$feed1->message}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button id="more" class="btn btn1 text-white">Read more</button>
                    <button id="less" class="btn btn1 text-white" style="display:none">Read Less</button>
                    @endif

                </div>
            </div>
        </div>
        {{-- card 7 end --}}


        {{-- card 8 --}}
        <div id="enquiry" class="card mx-auto mt-3 sectioncard2 size">
            <div class="card-body">
                <div class="bg-white pb-4 ps-3 pe-3">
                    <h3 class="fw-bold text-center"><span style="color: #002E6E"> Enquiry </span><span style="color: #01B9F1"> Form </span></h3>

                    <form class="" action="{{route('inquiry.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="cardId" value="{{$user->id}}">
                        <div class="mb-3">
                            <input type="text" class="text" id="" name="name" placeholder="Enter Full Name">
                        </div>
                        <div class="mb-3">
                            <input type="emial" class="text" id="" name="email" placeholder="Enter Email">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="text" id="" name="phone" placeholder="Enter phone">
                        </div>
                        <div class="mb-3">
                            <textarea name="message" id="" cols="10" rows="5" class="text" placeholder="Enter Your Message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn1">Submit</button>
                    </form>


                </div>
            </div>
        </div>
        {{-- card 8 end --}}


        {{-- card 9 end --}}


        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="card mt-3 mx-auto size" style=" margin-bottom: 100px;">
                        <div class="card-body">
                            <div class="bg-white">
                                <a href="http://brandbeans.biz/public/" target="_blank">
                                    <p class="text-center text-dark"> © 2023 brandbeans </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- Footer -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light footer shadow-sm ">
        <div class="container-fluid d-flex justify-content-between">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="col-md-12">
                    <ul class="navbar-nav ms-auto mb-lg-0 " style="font-size: 12px;">
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#home" class="abc">
                                    <i class="bi bi-house-door-fill footer-icon"></i>
                                    <p>Home</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#aboutus" class="abc">
                                    <i class="bi bi-person-fill footer-icon"></i>
                                    <p>ABOUT US</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#services" class="abc">
                                    <i class="bi bi-cart-fill footer-icon"></i>
                                    <p>SERVICES</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#payment" class="abc">
                                    <i class="bi bi-currency-rupee footer-icon"></i>
                                    <p>PAYMENT</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#gallary" class="abc">
                                    <i class="bi bi-images footer-icon"></i>
                                    <p>GALLARY</p>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#feedback" class="abc">
                                    <i class="bi bi-star-half footer-icon"></i>
                                    <P>FEEDBACK</P>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#videos" class="abc">
                                    <i class="bi bi-youtube footer-icon"></i>
                                    <P>VIDEOS</P>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#enquiry" class="abc">
                                    <i class="bi bi-chat-fill footer-icon"></i>
                                    <P>ENQUIRY</P>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item px-5">
                            <div class="col text-center">
                                <a href="#reachus" class="abc">
                                    <i class="bi bi-lightbulb-fill footer-icon"></i>
                                    <P>Reach Us</P>
                                </a>
                            </div>
                        </li>

                    </ul>

                </div>
            </div>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $('.navbar-collapse').click(function() {
            $(".navbar-collapse").collapse('hide');
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#less").click(function() {
                $("#para").hide();
                $("#more").show();
                $("#less").hide();
                $("#para1").show();
            });
            $("#more").click(function() {
                $("#para").show();
                $("#more").hide();
                $("#less").show();
                $("#para1").hide();

            });
        });
    </script>

</body>

</html>