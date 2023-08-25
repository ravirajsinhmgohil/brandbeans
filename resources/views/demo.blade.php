@extends('layouts.app1')

@section('content')

    <style>
        .modal-backdrop.show {
            opacity: 0 !important;
            position: relative !important;

        }

        .fs-5 {
            font-size: calc(1.275rem + .3vw) !important;
            font-size: 15px !important;
        }

        .fs-4 {
            font-size: calc(1.275rem + .3vw) !important;
            font-size: 15px !important;
        }



        /* .modal-backdrop.show {
                                                                                                                    } */
        .dialogmodel1 {
            margin-top: 100px;
        }

        .accordion-header:hover {
            background-color: #03acf0;
        }
    </style>

    <div class="container-fluid">

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
                <strong>Oh snap!</strong> {{ __('There were some problems with your input') }}.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- accordion --}}

        <div class="accordion" id="accordionExample">
            {{-- User Details --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button bg-light " type="button" style="color: #002e6e; display: flex; justify-content: space-between;" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="">
                            <b><i class="fa fa-user ico"></i>Details</b>
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" style="margin-bottom:10px" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="" style="display: flex; justify-content: end;">

                            {{-- {{ config('app.username') }} --}}
                            <div class="text-end pt-4 pe-4">
                                <a href="{{ route('account.viewcard') }}/{{ $userurl }}" target="_blank">
                                    <i class="fa fa-ey text-white btn fs-4" style="background-color: #002e6e;">Preview</i>
                                </a>
                            </div>
                            {{-- <div class="dropdown pt-4 pe-4 js__drop_down">
                                <a href="#" class="fa fa-share ico t-3 text-dark js__drop_down_button"></a>
                                <ul class="sub-menu p-3" style="width: 300px;">
                                    <div class="row ps-2">
                                        <div class="result-container col-md-9">
                                            <input type="text" value="{{ url('mycard') }}/{{ $userurl }}" style="font-size: small;" class=" filter form-control rounded-pill" id="share_url" placeholder="copy url" readonly style="font-size: 10px;">
                                        </div>
                                        <div class="col-md-3">
                                            <button class="btn btn-sm bg-primary rounded-pill ctoCb" id="clipboard">
                                                <i class="fa fa-clipboard text-white fs-4"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row pt-3">
                                        <!-- <div class="col-md-4 text-center"><a class="btn btn-sm btn-info rounded-pill" href="{{ url('account/card/viewcard/') }}/{{ $id }}" target="_blank">Share</a></div> -->
                                        @if ($links)
                                            <div class="col-md-6 text-center">
                                                <a id="shareWithFb" class="bg-primary rounded-pill btn btn-sm " href="{{ $links->facebook }}" target="_blank">
                                                    <i class="fa fa-facebook text-white"></i>
                                                </a>
                                            </div>
                                        @else
                                            <span style="font-size: small;" class="text-danger">No FB Link Found</span>
                                        @endif
                                        @if ($links)
                                            <div class="col-md-6 text-center"><a id="shareWithWhatsapp" class="rounded-pill bg-success btn btn-sm" href="" target="_blank">
                                                    <i class="fa fa-whatsapp text-white fs-3"></i>
                                                </a></div>
                                        @else
                                            <span style="font-size: small;" class="text-danger">No Phone no. Found</span>
                                        @endif


                                    </div>
                                    <div class="row py-3">
                                        @if ($links)
                                            <div class="col-md-4 text-center"> <a id="shareWithTwitter" class="bg-info rounded-pill btn btn-sm" href="{{ $links->twitter }}" target="_blank">
                                                    <i class="fa fa-twitter text-white fs-3"></i>
                                                </a></div>
                                        @else
                                            <span style="font-size: small;" class="text-danger">No Twitter links Found</span>
                                        @endif
                                        @if ($links)
                                            <div class="col-md-4 text-center"> <a class="bg-danger rounded-pill btn btn-sm" href="{{ $links->instagram }}" target="_blank">
                                                    <i class="fa fa-instagram fs-3 text-white"></i></a></div>
                                        @else
                                            <span style="font-size: small;" class="text-danger">No Instagram link Found</span>
                                        @endif
                                        @if ($links)
                                            <div class="col-md-4 text-center"> <a id="shareWithMail" class="rounded-pill bg-info btn btn-sm" href="" target="_blank">
                                                    <i class="fa fa-envelope text-white fs-3"></i>
                                                </a></div>
                                        @else
                                            <span style="font-size: small;" class="text-danger">No Email Found</span>
                                        @endif
                                    </div>

                                </ul>
                                <!-- /.sub-menu -->
                            </div> --}}
                        </div>

                        <br>

                        <form action="{{ route('card.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pb-1">
                                    <input type="hidden" name="cardid" value="{{ $details->id }}">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Your Full Name:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="name" name="name" value="{{ $details->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Designation:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="heading" name="heading" value="{{ $details->heading }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Company Name:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="fs-4 form-control" id="companyname" name="companyname" value="{{ $details->companyname }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Username:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="fs-4 form-control" id="username" name="username" value="{{ $users->username }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">State:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="fs-4 form-control" id="state" name="state" value="{{ $details->state }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">City:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="location" name="city" value="{{ $details->city }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Profile Photo:</label></div>
                                        <div class="col-md-7">
                                            <input type="file" class="form-control fs-4" id="profilePhoto" name="profilePhoto" value="{{ url('profile') }}/{{ $users->profilePhoto }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Logo:</label></div>
                                        <div class="col-md-7">
                                            <input type="file" class="form-control fs-4" id="logo" name="logo" value="{{ url('cardlogo') }}/{{ $details->logo }}">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Category:</label></div>
                                        <div class="col-md-7">
                                            <select name="category" id="category" class="fs-4 form-control">
                                                <option selected disabled>--Update your Category--</option>
                                                @foreach ($category as $category)
                                                    <option value="{{ $category->id }}" {{ old('category', $details->category) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                                <option value="other">Other</option>
                                            </select>

                                            <div class="frm-input py-3" id="other" style="display: none;">
                                                <input type="text" placeholder="Add Other Category" name="categoryname" class="fs-4 form-control">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4">Year of Establish:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="fs-4 form-control" id="year" name="year" value="{{ $details->year }}">
                                        </div>
                                    </div>
                                </div>
                                @role('Influencer')
                                    <div class="col-md-6 pb-1">
                                        <div class="row">
                                            <div class="col-md-4"><label class="fs-4">Address:</label></div>
                                            <div class="col-md-7">
                                                <textarea type="text" class="fs-4 form-control" id="year" name="address">{{ $influencer->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pb-1">
                                        <div class="row">
                                            <div class="col-md-4"><label class="fs-4">Public Location:</label></div>
                                            <div class="col-md-7">
                                                <input type="text" class="fs-4 form-control" name="publicLocation" value="{{ $influencer->publicLocation }}" id="publicLocation">
                                            </div>
                                            <div class="col-md-4"><label class="fs-4">Gender:</label></div>
                                            <div class="col-md-7">
                                                <label class="fs-4" style="padding-left:20px;"><input type="radio" class="fs-4" name="gender" value="Male" id="gender" @checked(old('gender', $influencer->gender))>Male</label>
                                                <label class="fs-4" style="padding-left:20px;"><input type="radio" class="fs-4" name="gender" value="Female" id="gender" @checked(old('gender', $influencer->gender))>Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pb-1">
                                        <div class="row">
                                            <div class="col-md-4"><label class="fs-4">Pin Code:</label></div>
                                            <div class="col-md-7">
                                                <input type="text" class="fs-4 form-control" name="pinCode" value="{{ $influencer->pinCode }}" id="pinCode">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pb-1">
                                        <div class="row">

                                            <div class="col-md-4"><label class="fs-4">Date of Birth:</label></div>
                                            <div class="col-md-7">
                                                <input type="date" class="fs-4 form-control" name="dob" value="{{ $influencer->dob }}" id="dob">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pb-1">
                                        <div class="row">

                                        </div>
                                    </div>
                                @endrole

                            </div>
                            <div class="row">
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-2"><label class="fs-4">About:</label></div>
                                        <div class="col-md-10">
                                            <textarea style="width:95%" class="fs-4 form-control" rows="5" type="text" id="about" name="about" value="">{{ $details->about }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @role('Influencer')
                                <div class="card-content">
                                    <div class="col-md-2 pb-1">
                                        <label class="fs-4">Influencer Category:</label>
                                    </div>
                                    <div class="col-md-10 pb-1">
                                        <div class="row">
                                            {{ $influencer->categoryId }}
                                            <?php
                                            // $data = "['apple','banana']";
                                            $data = $influencer->categoryId;
                                            $category7Data = explode(',', $data);
                                            
                                            ?>
                                            @foreach ($influencerCategory as $influencerCategory)
                                                <div class="col-md-3">
                                                    <label for="categoryId" class="fs-4">{{ $influencerCategory->name }}</label>
                                                    {{-- {{ $influencerCategory->id }} --}}

                                                    <input type="checkbox" value="{{ $influencerCategory->id }}" class="fs-4" name="categoryId[]" id="categoryId" {{ in_array($influencerCategory->id, old($influencer->categoryId, [])) ? 'checked' : '' }}>

                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endrole
                            <div class="text-center">
                                <button type="submit" style="background-color: #002e6e; color: white;" id="update_data" value="" class="btn btn-sm">Update</button><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div style="padding: 5px"></div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed bg-light " style="color: #002e6e;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                        <b>
                            <i class="fa fa-link ico"></i>Social Links</h4>
                        </b>
                    </button>

                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" style="margin-bottom:10px" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="{{ route('link.update') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-phone ico text-success"></i> Phone Number:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="phone1" name="phone1" value="{{ $links->phone1 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-whatsapp ico text-success"></i> Whatsapp Number:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="phone2" name="phone2" value="{{ $links->phone2 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-envelope ico"></i> Email:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="email" name="email" value="{{ $links->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-skype ico text-info"></i> Skype:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="skype" name="skype" value="{{ $links->skype }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-facebook ico text-primary"></i> FaceBook:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="facebook" name="facebook" value="{{ $links->facebook }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-instagram ico" style="color: #E1306C;"></i> Instagram:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="instagram" name="instagram" value="{{ $links->instagram }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-twitter ico text-info"></i> Twitter:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="" name="twitter" value="{{ $links->twitter }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-youtube ico text-danger"></i> Youtube:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="" name="youtube" value="{{ $links->youtube }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-linkedin ico text-primary"></i> Linkedin:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="" name="linkedin" value="{{ $links->linkedin }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 pb-1">
                                    <div class="row">
                                        <div class="col-md-4"><label class="fs-4"> <i class="fa fa-globe ico text-secondary"></i> Web Site:</label></div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control fs-4" id="" name="website" value="{{ $links->website }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="background-color: #002e6e; color: white;" class="btn  fs-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div style="padding: 5px"></div>
            @role(['Admin', 'Brand', 'Reseller', 'Writer', 'Designer'])
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed bg-light " style="color: #002e6e;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <b>
                                <i class="fa fa-money ico"></i>Payment
                            </b>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" style="margin-bottom:10px" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form class="form" method="post" action="{{ route('payment.update') }}" enctype="multipart/form-data">
                                @csrf
                                <label for="formFile" class="form-label fs-4">Bank Name</label>
                                <input class="form-control fs-4" type="text" id="bankName" value="{{ $payment->bankName }}" name="bankName"><br>

                                <label for="formFile" class="form-label fs-4">Account Holder Name</label>
                                <input class="form-control fs-4" type="text" id="accountHolderName" value="{{ $payment->accountHolderName }}" name="accountHolderName"><br>

                                <label for="formFile" class="fs-4 form-label">Account Number</label>
                                <input class="form-control fs-4" type="text" id="accountNumber" name="accountNumber" value="{{ $payment->accountNumber }}"><br>

                                <label for="formFile" class="fs-4 form-label">Account Type</label>
                                <input class="form-control fs-4" type="text" id="accountType" name="accountType" value="{{ $payment->accountType }}"><br>

                                <label for="formFile" class="fs-4 form-label">IFSC Code</label>
                                <input class="form-control fs-4" type="text" id="ifscCode" name="ifscCode" value="{{ $payment->ifscCode }}"><br>

                                <label for="formFile" class="fs-4 form-label">Upi Id</label>
                                <input class="form-control fs-4" type="text" id="upidetail" name="upidetail" value="{{ $payment->upidetail }}"><br>
                                <button class="btn fs-4" style="background-color: #002e6e; color: white;" type="submit">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            @endrole
            <div style="padding: 5px"></div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed bg-light " style="color: #002e6e;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <b>
                            <i class="fa fa-photo ico"></i>Portfolio
                        </b>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" style="margin-bottom:10px" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">
                            <form class="form" id="imageform" method="post" action="{{ route('image.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">

                                    <label for="formFile" class="fs-4 form-label">Type :</label>
                                    <select class="fs-4 py-1 form-control " id="mediatype" name="type">
                                        <option selected disabled>--select Your Option--</option>
                                        <option value="Photo">Photo</option>
                                        <option value="Video">Video</option>
                                    </select>
                                    <div class="py-2" style='display:none;' id='Photo'>
                                        <label for="formFile" class="fs-4 form-label">Photo :</label>
                                        <input type="file" class="fs-4 py-1" accept="image/*" id="image" name="image1">
                                    </div>
                                    <div style='display:none;' id='Video'>
                                        <label for="formFile" class="fs-4 form-label">Upload Your Video Url :</label>
                                        <input type="text" class="fs-4 py-1 form-control" id="image" name="video">
                                    </div>
                                    <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-4 my-2" id="submitimage" name="submitimage">Upload</button>
                                </div>
                            </form>
                        </div>
                        <div class="">
                            <h3>Photo</h3>
                            <div class="row">
                                @foreach ($cardimage as $image1)
                                    <div class="col-md-3">
                                        <img class="cardimages mt-3" src="{{ asset('cardimage/' . $image1->image) }}" alt="" style="height: 150px; width: 150px; border:8px solid white; box-shadow: 2px 2px 2px 2px lightblue; margin-left: 50px;">
                                        <br>
                                        <center>
                                            <a class="fs-5" onclick="return confirm('Are you sure?')" href="{{ Route('photo.delete') }}/{{ $image1->id }}"><i class="fa fa-trash ico text-danger text-center"></i></a>
                                        </center>
                                    </div>
                                @endforeach
                            </div>
                            <h3>Video</h3>
                            <div class="row">
                                @foreach ($cardvideo as $cardvideo)
                                    <div class="col-md-4" style="position:relative;">

                                        <iframe src="{!! $cardvideo->image !!}"></iframe>
                                        <br>
                                        <center>
                                            <a onclick="return confirm('Are you sure?')" href="{{ Route('photo.delete') }}/{{ $cardvideo->id }}">
                                                <i class="fs-5 fa fa-trash ico text-danger"></i>
                                            </a>
                                        </center>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding: 5px"></div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed bg-light " style="color: #002e6e;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <b>
                            <i class="fa fa-list-alt ico"></i>Service Details</h4>
                        </b>
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" style="margin-bottom:10px" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">
                            <form class="form" method="post" action="{{ route('servicedetail.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">

                                    <label for="formFile" class="form-label fs-4">Title</label>
                                    <input class="form-control fs-4" type="text" id="title" name="title"><br>

                                    <label for="formFile" class="form-label fs-4">Photo</label>
                                    <input type="file" class="fs-4" accept="image/*" id="photo" name="photo"><br>

                                    <label for="formFile" class="form-label fs-4">Description</label><br>
                                    <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
                                    <br>
                                    <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-4">Submit</button>
                                </div>
                            </form>

                            <div class="border-top">
                                <div class="table-responsive">
                                    <table class="table table-bordered fs-4">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Photo</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($servicedetail as $servicedetails)
                                                <tr>
                                                    <td>{{ $servicedetails->title }}</td>
                                                    <td><img src="{{ url('servicedetailimg') }}/{{ $servicedetails->photo }}" class="img-thumbnail" style="width:100px;height:100px"></td>
                                                    <td>{{ $servicedetails->description }}</td>
                                                    <td><a href="{{ route('servicedetail.edit') }}/{{ $servicedetails->id }}" class="btn fs-4" style="background-color: #002e6e; color: white;">Edit</a>
                                                        <a onclick="return confirm('Are you sure?')" href="{{ route('servicedetail.delete') }}/{{ $servicedetails->id }}" class="btn fs-4 bg-danger text-white">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding: 5px"></div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed bg-light " style="color: #002e6e;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        <b>
                            <i class="fa fa-qrcode ico"></i>QR Codes</h4>
                        </b>
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" style="margin-bottom:10px" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">

                            <form class="form" method="post" action="{{ route('qrcode.store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="qrcardId" id="cardId" value="{{ request('id') }}">

                                <label for="formFile" class="form-label fs-4">Type</label>
                                <input class="form-control fs-4 w-100" type="text" id="type" name="type"><br>

                                <label for="formFile" class="form-label fs-4">Phone Number</label>
                                <input class="form-control fs-4" type="text" id="number" name="number"><br>

                                <label for="formFile" class="form-label fs-4">QR Code</label>
                                <input type="file" id="code" class="pb-3 fs-4" name="code"><br>
                                <button class="btn fs-4 my-3" style="background-color: #002e6e; color: white;" type="submit">Submit</button>
                            </form>

                            <div class="border-top">
                                <div class="fs-4 row">
                                    @foreach ($qr as $qr)
                                        <div class="col-md-3 py-3">

                                            <p>
                                                <span class="fs-4 ">Title</span>: {{ $qr->type }}
                                            </p>

                                            <a class="text-danger" data-bs-toggle="modal" data-id="{{ $qr->id }}" data-bs-target="#Editservicedetails">
                                                <!-- <i class="bi bi-pencil-square fs-4"></i> -->
                                            </a>
                                            <img src="{{ url('QRcodes') }}/{{ $qr->code }}" class="img-thumbnail" style="width:100px;height:100px">
                                            <br>
                                            <p><strong class="fs-4">Number</strong>: {{ $qr->number }}</p>
                                            <a class="fs-5" onclick="return confirm('Are you sure?')" href="{{ Route('qr.delete') }}/{{ $qr->id }}"><i class="fa fa-trash ico text-danger text-center"></i></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding: 5px"></div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed bg-light " style="color: #002e6e;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        <b>
                            <i class="fa fa-sliders ico"></i>Slider</h4>
                        </b>
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse collapse" style="margin-bottom:10px" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">
                            <form class="form" method="post" action="{{ route('sliders') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" name="sliderCardId" value="{{ $details->id }}">
                                    <label for="formFile" class="fs-4 form-label">File :</label>
                                    <input type="file" class="fs-4 py-1" name="file">

                                    <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-4 my-2" id="submitimage" name="submitimage">Upload</button>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            @foreach ($slider as $slider)
                                <div class="col-md-3 py-3">


                                    <img src="{{ url('slider') }}/{{ $slider->file }}" class="img-thumbnail" style="width:100px;height:100px">
                                    <br>

                                    <a class="fs-5" onclick="return confirm('Are you sure?')" href="{{ route('slider.delete') }}/{{ $slider->id }}"><i class="fa fa-trash ico text-danger text-center"></i></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div style="padding: 5px"></div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingEight">
                    <button class="accordion-button collapsed bg-light " style="color: #002e6e;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        <b>
                            <i class="fa fa-file ico"></i>Brochure</h4>
                        </b>
                    </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse collapse" style="margin-bottom:10px" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="">
                            <form class="form" method="post" action="{{ route('bro.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" name="cardid" value="{{ $details->id }}">
                                    <label for="formFile" class="fs-4 form-label">File :</label>
                                    <input type="file" class="fs-4 py-1" name="brochure">

                                    <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-4 my-2" id="submitimage" name="submitimage">Upload</button>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            @foreach ($bro as $bro)
                                <div class="col-md-3">
                                    <h5><a href="{{ url('brofile/' . $bro->file) }}" style="font-size: large; color: #002e6e;" target="_blank"> Brochure</a> <a class="fs-5" onclick="return confirm('Are you sure?')" href="{{ Route('bro.delete') }}/{{ $bro->id }}"><i class="fa fa-trash ico text-danger text-center"></i></a></h5>


                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end --}}


    </div>



    <!-- /// -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#mediatype').on('change', function() {
                if (this.value == 'Photo') {
                    $("#Photo").show();
                } else {
                    $("#Photo").hide();
                }
                if (this.value == 'Video') {
                    $("#Video").show();
                } else {
                    $("#Video").hide();
                }
            });
        });
    </script>

    <script>
        var copiedLink = '';

        function copyToClipboard(element, btnElem) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).val()).select();
            document.execCommand("copy");
            $temp.remove();
            $(btnElem).html(`<i class="fa fa-link text-white"> </i> `);
            setTimeout(() => {
                $(btnElem).html(`<i class="fa fa-clipboard text-white"> </i> `);
            }, 2000);
        }
        $(document).ready(function() {
            copiedLink = $('#share_url').val();
            $('#shareWithTwitter').click(function() {
                window.open("https://twitter.com/intent/tweet?url=" + copiedLink);
            });
            $('#shareWithFb').click(function() {
                window.open("https://www.facebook.com/sharer/sharer.php?u=" + copiedLink, 'facebook-share-dialog', "width=626, height=436");
            });
            // $('#shareWithMail').click(function() {
            //     var formattedBody = "This is cause link: " + (copiedLink);
            //     var mailToLink = "mailto:?subject= " + user + " wants you to donate to this noble cause&body=" + encodeURIComponent(formattedBody);
            //     window.location.href = mailToLink;
            // });
            $('#shareWithWhatsapp').click(function() {
                var win = window.open('https://wa.me/send' + copiedLink, '_blank');
                win.focus();
            });
            $(document).on('click', '.ctoCb', function() {
                copyToClipboard($(this).parent().parent().find('input'), $(this));
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                if (this.value == 'other') {
                    $("#other").show();
                } else {
                    $("#other").hide();
                }
            });
        });
    </script>


@endsection
