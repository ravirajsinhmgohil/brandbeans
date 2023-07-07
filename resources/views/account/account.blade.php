 @extends('layouts.app1')
 @section('content')
 <div class="container">
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
     <div class="row">

         <div class="col-md-12">
             <div class="box-content card">
                 <h4 class="box-title" style="background-color: #03acf0;"><i class="fa fa-file ico"></i>Change Email</h4>
                 <div class="card-content">

                     <div class="">
                         <form class="form" action="{{route('change.email')}}" method="post">
                             @csrf
                             <div class="mb-3">

                                 <label for="formFile" class="form-label fs-5">Enter email</label>
                                 <input class="form-control fs-5" value="{{$user->email}}" type="text" id="email" name="email"><br>

                                 <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-5 my-2" id="submitimage" name="submitimage">Upload</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-md-12">
             <div class="box-content card">
                 <h4 class="box-title" style="background-color: #03acf0;"><i class="fa fa-file ico"></i>Change Password</h4>
                 <div class="card-content">

                     <div class="">
                         <form class="form" action="{{route('change.password')}}" method="post">
                             @csrf
                             <div class="mb-3">

                                 <label for="formFile" class="form-label fs-5">Enter Current Password</label>
                                 <input class="form-control fs-5" type="text" id="oldpassword" name="oldpassword">
                             </div>
                             <div class="mb-3">
                                 <label for="formFile" class="form-label fs-5">Enter New Password</label>
                                 <input class="form-control fs-5" type="text" id="newpassword" name="newpassword">
                             </div>
                             <div class="mb-3">

                                 <label for="formFile" class="form-label fs-5">Enter Confirm Password</label>
                                 <input class="form-control fs-5" type="text" id="confirmpassword" name="confirmpassword">

                             </div>
                             <button type="submit" style="background-color: #002e6e; color: white;" class="btn fs-5 my-2" id="submitimage" name="submitimage">Upload</button>
                     </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

 </div>
 </div>
 @endsection