@extends('layouts.app1')
@section('header','Stories')

@section('content')

<div class="container-fluid">

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>{{ $message }}</strong>
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
                <div class="d-flex justify-content-between pe-3" style="background-color: #03acf0;">
                    <h4 class="box-title" style="background-color: #03acf0;"><i class="bi bi-hourglass-split ico"></i>Story</h4>
                    <a href="{{route('story.create')}}" style="background-color: #002e6e; color: white;" class="btn btnback fs-4 my-2">Add</a>
                </div>
                <div class="card-content">


                    <div class="border-top">
                        <div class="fs-5 row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($story as $story)
                                    <tr>
                                        <td>{{$story->title}}</td>
                                        <td>
                                            <img src="{{asset('storyImg')}}/{{$story->photo}}" class="img-thumbnail" alt="" style="height: 100px; width: 100px;">
                                        </td>
                                        <td>{!!$story->description!!}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('story.edit', $story->id) }}">Edit</a>
                                            <a class="btn btn-danger btn-sm" href="{{ route('story.delete', $story->id) }}">Delete</a>
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
</div>

<!-- /// -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


@endsection