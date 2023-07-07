@extends('layout.home')
<link href="{{ asset('asset/css/detail.css') }}" rel="stylesheet">

{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}

<style>
    .error {
        color: #FF0000;
    }
</style>
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col" style="margin-top: -20px;">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <h5>Basic Details</h5>
            <form class="form" id="CardForm" method="post" action="javascript:void(0)">
                @csrf
                <div class="container pt-5 mt-5 form1">
                    <label for="" id="msg"></label>
                    <div class="row mb-5">
                        <label for="name" class="col-sm-2 col-form-label fw-bold">Your Full Name</label>
                        <div class="col">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <hr />
                    <div class="row mb-5">
                        <label for="heading" class="col-sm-2 col-form-label fw-bold">Heading</label>
                        <div class="col">
                            <input type="text" class="form-control" id="heading" name="heading">
                            Ex. CEO, CTO, Digital Marketer, Advocate, Manager, Electrician, Unisex Salon, Tour & Travel,
                            Photographer, etc
                        </div>
                    </div>
                    <hr />
                    <div class="row mb-5">
                        <label for="companyname" class="col-sm-2 col-form-label fw-bold">Company Name</label>
                        <div class="col">
                            <input type="text" class="form-control" id="companyname" name="companyname">
                            Ex. ACME Private Limited
                        </div>
                    </div>
                    <hr />
                    <div class="row mb-5">
                        <label for="location" class="col-sm-2 col-form-label fw-bold">Location</label>
                        <div class="col">
                            <input type="text" class="form-control" id="location" name="location">
                            Ex. New York, USA
                        </div>
                    </div>
                    <hr />

                    <div class="row mb-5">
                        <label for="about" class="col-sm-2 col-form-label fw-bold">About</label>
                        <div class="col">
                            <input type="text" class="form-control" id="about" name="about">
                        </div>
                    </div>

                    {{-- <div class="row mb-5">
                            <label for="about" class="col-sm-2 col-form-label fw-bold">About</label>
                            <div class="col">
                                <textarea class="ckeditor form-control" name="about" id="about"></textarea>

                            </div>
                        </div> --}}
                    <br>
                    <hr />
                    <button type="submit" id="submit" class="btn btnback float-right">Submit</button><br>
                </div>
            </form>

        </div>

    </div>
</div>


{{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}

{{-- <script>
        if ($("#CardForm").length > 0) {
            $("#CardForm").validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 50
                    },
                    companyname: {
                        required: true,
                        maxlength: 50,
                    },
                    about: {
                        required: true,
                        maxlength: 300
                    },
                },
                messages: {
                    name: {
                        required: "Please enter name",
                        maxlength: "Your name maxlength should be 50 characters long."
                    },
                    companyname: {
                        required: "Please enter valid companyname",
                        maxlength: "The email name should less than or equal to 50 characters",
                    },
                    about: {
                        required: "Please enter message",
                        maxlength: "Your message name maxlength should be 300 characters long."
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#submit').html('Please Wait...');
                    $("#submit").attr("disabled", true);
                    $.ajax({
                        url: "{{ route('card.store', 'id') }}",
type: "POST",
data: $('#CardForm').serialize(),
success: function(response) {
$('#submit').html('Submit');
$("#submit").attr("disabled", false);
alert('Ajax form has been submitted successfully');
document.getElementById("CardForm").reset();
}
});
}
})
}
</script> --}}


{{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    $(document).ready(function() {
        $("#submit").click(function() {
            console.log("clicked");

            $.post("{{ route('card.store', 'id') }}", {
                    _token: "{{ csrf_token() }}",
                    name: $("#name").val(),
                    heading: $("#heading").val(),
                    companyname: $("#companyname").val(),
                    location: $("#location").val(),
                    about: $("#about").val()

                },
                function(data, status) {
                    // alert("Data: " + data.msg + "\nStatus: " + status);

                });
        });
    });
</script>
@endsection