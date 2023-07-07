@extends('layout.home1')
<link href="{{ asset('asset/css/detail.css') }}" rel="stylesheet">



@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif

<div class="container bcard">
    <div class="row">
        <h5 style="margin-top: -20px;">Links</h5>
        <div class="col">
            <div class="card-group">
                <div class="card" style="height: 800px">
                    <div class="card-body">
                        <h5 class="fw-bold">Preview</h5>
                        <hr />
                        <div>
                            <p class="mt-3 fs-5 fw-bold">Contact Details</p>
                            @foreach ($data as $user1)
                            <p><i class="bi bi-arrow-right-square-fill"></i>
                                {{ $user1->email }}
                                <a class="btn" data-bs-toggle="modal" data-bs-target="#pencilModal" href="#" role="button"><i class="bi bi-pencil-fill"></i></a>
                                <a class="btn" href="{{ route('detail.delete') }}/{{ $user1->id }}" role="button"><i class="bi bi-trash3-fill"></i></a>
                            </p>
                            @endforeach

                            @foreach ($link as $link1)
                            {{-- {{ $link1->id }} --}}
                            <p><i class="bi bi-arrow-right-square-fill"></i>
                                {{ $link1->title }}:-
                                {{ $link1->value }}
                                {{-- <a class="btn" data-bs-toggle="modal" data-bs-target="#pencilModal"
                                            href="#" role="button"><i class="bi bi-pencil-fill"></i></a> --}}
                                <a class="btn" href="{{ route('detail.delete') }}/{{ $link1->id }}" role="button"><i class="bi bi-trash3-fill"></i></a>
                            </p>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card" style="height: 800px">
                <div class="card-body">
                    <h5 class="fw-bold">Add more links & info</h5>
                    <label for="" id="nameError"></label>
                    <hr />
                    <div>
                        <p class="mt-3 fs-5 fw-bold">Contact Details</p>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#phoneModal" role="button" onClick="addphone()" href="javascript:void(0)"><i class="bi bi-telephone phone"></i>
                            <br>Phone</a>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#emailModal" role="button" onClick="addemail()" href="javascript:void(0)"><i class="bi bi-envelope link"></i>
                            <br>Email</a>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#skypeModal" role="button" onClick="addskype()" href="javascript:void(0)"><i class="bi bi-skype skype"></i>
                            <br>Skype</a>
                        </p>
                    </div>
                    <div>
                        <p class="mt-3 fs-5 fw-bold">Website & Social Links</p>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#facebookModel" role="button" onClick="addfacebook()" href="javascript:void(0)"><i class="bi bi-facebook fac"></i>
                            <br>Facebook</a>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#instagramModel" role="button" onClick="addinstagram()" href="javascript:void(0)"><i class="bi bi-instagram inst"></i>
                            <br>Instagram</a>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#twitterModel" role="button" onClick="addtwitter()" href="javascript:void(0)"><i class="bi bi-twitter twitter"></i>
                            <br>Twitter</a>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#youtubeModel" role="button" onClick="addyoutube()" href="javascript:void(0)"><i class="bi bi-youtube you"></i>
                            <br>Youtube</a>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#linkedinModel" role="button" onClick="addlinkedin()" href="javascript:void(0)"><i class="bi bi-linkedin in"></i>
                            <br>Linkedin</a>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#websiteModel" role="button" onClick="addwebsite()" href="javascript:void(0)"><i class="bi bi-globe web"></i>
                            <br>Website</a>
                        </p>
                    </div>
                    <div>
                        <p class="mt-3 fs-5 fw-bold">Payments</p>
                        <a class="btn" data-bs-toggle="modal" data-bs-target="#paypalModel" role="button" onClick="addpaypal()" href="javascript:void(0)"><i class="bi bi-paypal pay"></i>
                            <br>Paypal</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal update -->
<form id="editemailForm" method="post" action="javascript:void(0)">
    @csrf
    <div class="modal fade" id="pencilModal" tabindex="-1" aria-labelledby="pencilModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pencilModalLabel">Update Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        @foreach ($data as $user1)
                        <input type="text" class="form-control" id="editemail" name="editemail" aria-describedby="email">
                        @endforeach
                        <div id="" class="form-text">Please enter your email address.</div>
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <select class="form-select" aria-label="Default select example" id="emaildisplaytext" name="emaildisplaytext">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="Email">Email</option>
                            <option value="Work">Work</option>
                            <option value="Personal">Personal</option>
                        </select>
                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Delete</button>
                    <button type="submit" id="editemailsubmit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- phone model --}}
<form id="PhoneForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="phoneModal" tabindex="-1" aria-labelledby="phoneModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="phoneModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="phoneno" class="form-label fw-bold">Phone Number</label>
                        <input type="text" class="form-control" id="phoneno" aria-describedby="phoneno" value="+91" name="phoneno">
                        <div id="phoneno" class="form-text">Please enter phone nmber with country code.</div>
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <select class="form-select" aria-label="Default select example" id="phonedisplaytext" name="displaytext">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="Home">Home</option>
                            <option value="Work">Work</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Landline">Landline</option>
                            <option value="Fax">Fax</option>
                            <option value="Office">Office</option>
                        </select>
                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}

                </div>
                <div class="modal-footer">
                    <button type="button" id="submitPhone" class="btn btn-primary">save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Email Modal -->
<form id="emailForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="text" class="form-control" id="email11" name="email11" aria-describedby="email11">
                        <div class="form-text">Please enter your email address.</div>
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <select class="form-select" aria-label="Default select example" id="emaildisplaytext" name="emaildisplaytext">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="Email">Email</option>
                            <option value="Work">Work</option>
                            <option value="Personal">Personal</option>
                        </select>
                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitemail" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Skype Modal -->
<form id="skypeForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="skypeModal" tabindex="-1" aria-labelledby="skypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="skypeModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="skype" class="form-label fw-bold">Value</label>
                        <input type="text" class="form-control" id="skype" name="skype" aria-describedby="skype">
                        <div class="form-text">Please enter your email address.</div>
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="skypedisplaytext" name="skypedisplaytext" aria-describedby="skype">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitskype" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Facebook Modal -->
<form id="facebookForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="facebookModel" tabindex="-1" aria-labelledby="facebookModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="facebookModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="facebook" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" aria-describedby="facebook">
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="facebookdisplaytext" name="facebookdisplaytext" aria-describedby="facebook">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitfacebook" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Instagram Modal -->
<form id="instagramForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="instagramModel" tabindex="-1" aria-labelledby="instagramModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instagramModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="instagram" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" aria-describedby="instagram">
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="instagramdisplaytext" name="instagramdisplaytext" aria-describedby="instagram">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitinstagram" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Twitter Modal -->
<form id="twitterForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="twitterModel" tabindex="-1" aria-labelledby="twitterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="twitterModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="twitter" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" aria-describedby="twitter">
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="twitterdisplaytext" name="twitterdisplaytext" aria-describedby="twitter">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submittwitter" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Youtube Modal -->
<form id="youtubeForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="youtubeModel" tabindex="-1" aria-labelledby="youtubeModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="youtubeModelLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="youtube" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" id="youtube" name="youtube" aria-describedby="youtube">
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="youtubedisplaytext" name="youtubedisplaytext" aria-describedby="youtube">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submityoutube" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!-- Linkedin Modal -->
<form id="LinkedinForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="linkedinModel" tabindex="-1" aria-labelledby="linkedinModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="linkedinModelLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="linkedin" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" aria-describedby="linkedin">
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="linkedindisplaytext" name="linkedindisplaytext" aria-describedby="linkedin">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitlinkedine" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Website Modal -->
<form id="websiteForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="websiteModel" tabindex="-1" aria-labelledby="websiteModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="websiteModelLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="website" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" id="website" name="website" aria-describedby="website">
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="websitedisplaytext" name="websitedisplaytext" aria-describedby="website">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitwebsite" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Paypal Modal -->
<form id="paypalForm" method="post" action="javascript:void(0)">
    @csrf

    <div class="modal fade" id="paypalModel" tabindex="-1" aria-labelledby="paypalModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paypalModelLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="website" class="form-label fw-bold">Link</label>
                        <input type="text" class="form-control" id="paypal" name="paypal" aria-describedby="paypal">
                    </div>

                    <div class="mb-3">
                        <label for="display" class="form-label fw-bold">Display Text</label>
                        <input type="text" class="form-control" id="paypaldisplaytext" name="paypaldisplaytext" aria-describedby="paypal">

                    </div>
                    {{-- <button type="submit" class="btn btnback">Submit</button> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" id="submitpaypal" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    function addphone() {
        $('#PhoneForm').trigger("reset");
        $('#phoneModalLabel').html("Add Phone");
        $('#phoneModal').modal('show');
        $('#id').val('');
    }
</script>



<script>
    // if ($("#PhoneForm").length > 0) {
    //     $("#PhoneForm").validate({
    //         rules: {
    //             phoneno: {
    //                 required: true,
    //                 minlength: 5
    //             },

    //         },
    //         messages: {
    //             phoneno: {
    //                 required: "Please enter phoneno",
    //             },
    //         },
    //         submitHandler: function(form) {
    //             $.ajaxSetup({
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });
    //             $('#submitPhone').html('Please Wait...');
    //             $("#submitPhone").attr("disabled", true);


    //             $.ajax({
    //                 url: "{{ route('phoneno.store') }}",
    //                 type: "get",
    //                 data: {
    //                     "title": "Phone",
    //                     "value": $("#phoneno").val(),
    //                     "displaytext": $("#phonedisplaytext").val()
    //                 },
    //                 success: function(response) {
    //                     $('#submitPhone').html('Submit');
    //                     $("#submitPhone").attr("disabled", false);
    //                     alert('Ajax form has been submitted successfully');
    //                     $('#phoneModal').modal('hide');
    //                     document.getElementById("PhoneForm").reset();
    //                 }
    //             });
    //         }
    //     })
    // }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $("#submitPhone").click(function() {
            console.log("clicked");

            $.post("{{ route('phoneno.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "Phone",
                    value: $("#phoneno").val(),
                    displaytext: $("#phonedisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#phoneModal').modal('hide');
                });
        });
    });
</script>

{{-- email store code --}}
<script>
    function addemail() {
        $('#emailForm').trigger("reset");
        $('#emailModalLabel').html("Add Email");
        $('#emailModal').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitemail").click(function() {
            console.log("clicked");

            $.post("{{ route('email.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "email",
                    value: $("#email11").val(),
                    displaytext: $("#emaildisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#emailModal').modal('hide');
                });
        });
    });
</script>

{{-- skype store code --}}
<script>
    function addskype() {
        $('#skypeForm').trigger("reset");
        $('#skypeModalLabel').html("Add Skype");
        $('#skypeModal').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitskype").click(function() {
            console.log("clicked");

            $.post("{{ route('skype.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "skype",
                    value: $("#skype").val(),
                    displaytext: $("#skypedisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#skypeModal').modal('hide');
                });
        });
    });
</script>

{{-- Facebook store code --}}
<script>
    function addfacebook() {
        $('#facebookForm').trigger("reset");
        $('#facebookModalLabel').html("Add Facebook");
        $('#facebookModel').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitfacebook").click(function() {
            console.log("clicked");

            $.post("{{ route('facebook.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "facebook",
                    value: $("#facebook").val(),
                    displaytext: $("#facebookdisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#facebookModel').modal('hide');
                });
        });
    });
</script>

{{-- instagram store code --}}
<script>
    function addinstagram() {
        $('#instagramForm').trigger("reset");
        $('#instagramModalLabel').html("Add Instagram");
        $('#instagramModel').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitinstagram").click(function() {
            console.log("clicked");

            $.post("{{ route('instagram.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "instagram",
                    value: $("#instagram").val(),
                    displaytext: $("#instagramdisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#instagramModel').modal('hide');
                });
        });
    });
</script>

{{-- Twitter store code --}}
<script>
    function addtwitter() {
        $('#twitterForm').trigger("reset");
        $('#twitterModalLabel').html("Add Twitter");
        $('#twitterModel').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submittwitter").click(function() {
            console.log("clicked");

            $.post("{{ route('twitter.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "twitter",
                    value: $("#twitter").val(),
                    displaytext: $("#twitterdisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#twitterModel').modal('hide');
                });
        });
    });
</script>

{{-- Youtube store code --}}
<script>
    function addyoutube() {
        $('#youtubeForm').trigger("reset");
        $('#youtubeModelLabel').html("Add Youtube");
        $('#youtubeModel').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submityoutube").click(function() {
            console.log("clicked");

            $.post("{{ route('youtube.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "youtube",
                    value: $("#youtube").val(),
                    displaytext: $("#youtubedisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#youtubeModel').modal('hide');
                });
        });
    });
</script>

{{-- Linkedin store code --}}
<script>
    function addlinkedin() {
        $('#LinkedinForm').trigger("reset");
        $('#linkedinModelLabel').html("Add Linkedin");
        $('#linkedinModel').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitlinkedine").click(function() {
            console.log("clicked");

            $.post("{{ route('linkedin.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "linkedin",
                    value: $("#linkedin").val(),
                    displaytext: $("#linkedindisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#linkedinModel').modal('hide');
                });
        });
    });
</script>

{{-- Website store code --}}
<script>
    function addwebsite() {
        $('#websiteForm').trigger("reset");
        $('#websiteModelLabel').html("Add Website");
        $('#websiteModel').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitwebsite").click(function() {
            console.log("clicked");

            $.post("{{ route('website.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "website",
                    value: $("#website").val(),
                    displaytext: $("#websitedisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#websiteModel').modal('hide');
                });
        });
    });
</script>

{{-- Paypal store code --}}
<script>
    function addpaypal() {
        $('#paypalForm').trigger("reset");
        $('#paypalModelLabel').html("Add Paypal");
        $('#paypalModel').modal('show');
        $('#id').val('');
    }
</script>

<script>
    $(document).ready(function() {
        $("#submitpaypal").click(function() {
            console.log("clicked");

            $.post("{{ route('paypal.store') }}", {
                    _token: "{{ csrf_token() }}",
                    title: "paypal",
                    value: $("#paypal").val(),
                    displaytext: $("#paypaldisplaytext").val()

                },
                function(data, status) {
                    alert("Data: " + data.msg + "\nStatus: " + status);
                    // console.log(data.msg);
                    $('#paypalModel').modal('hide');
                });
        });
    });
</script>
@endsection