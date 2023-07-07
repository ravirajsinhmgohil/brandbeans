@extends('layouts.app')
@section('header','Offer')
@section('content')


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


<div class="box-content card danger">
    <!-- /.box-title -->
    <div class="" style="padding: 12px 10px 12px 10px; display: flex; justify-content: space-between; background-color: #01B9F1; color:white;">
        <div class="">
            <h4 class="">Offer</h4>
        </div>
        <div class="">
            <a href="{{ route('offer.create') }}" class="btn btnback btn-sm" style="background-color: #002E6E; color:white;">ADD</a>
            <!-- /.sub-menu -->
        </div>
    </div>
    <!-- /.dropdown js__dropdown -->
    <div class="card-content">

        <div class="table-responsive">

            <div class="table-responsive" style="margin-top: 15px;">

                <table id="example" class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th> Title</th>
                            <th> Poster</th>
                            <th> Font Size</th>
                            <th> Font Family</th>
                            <th> Font Color</th>
                            <th> Number of Product</th>
                            <th> Poster Height</th>
                            <th> Poster Width</th>
                            <th> Title Position Top</th>
                            <th> Title Position Left</th>
                            <th width="280px"> Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offer as $offer)
                        <tr>
                            <td>{{$offer->title}}</td>
                            <td><img src="{{ url('poster') }}/{{ $offer->poster }}" class="img-thumbnail" style="width:50px;height:50px"></td>
                            <td>{{$offer->fontSize}}</td>
                            <td>{{$offer->fontFamily}}</td>
                            <td>{{$offer->fontColor}}</td>
                            <td>{{$offer->noOfProduct}}</td>
                            <td>{{$offer->posterHeight}}</td>
                            <td>{{$offer->posterWidth}}</td>
                            <td>{{$offer->titlePositionTop}}</td>
                            <td>{{$offer->titlePositionLeft}}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('offer.edit', $offer->id) }}">Edit</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('offer.offerdetail', $offer->id) }}">Detail</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('offer.delete', $offer->id) }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection