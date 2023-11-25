@extends('layouts.app')

@section('header', 'Appliers')
@section('content')

    {{-- {{ $pricing }} --}}
    <div class="container" style="display: flex; justify-content: center">
        <div class="pricing-plan">
            <div class="pricing-table">
                <div class="col col-first">
                    <div class="thead">
                        <div class="center-v">Package</div>
                    </div>
                    <div class="td">Create Campaign</div>
                    <div class="td"></div>
                </div>
                @foreach ($pricing as $pricing)
                    <div class="col">
                        {{-- bg-blue-2 --}}
                        <div class="thead bg-blue-1">
                            <h4>{{ $pricing->title }}</h4>
                            <div class="" style="align-items: center;font-size: 30px; font-weight: 600">
                                <span class="currency">₹</span>
                                <span class="number">{{ $pricing->price }}</span><br>
                                <span style=" position: relative;width: 20px;text-align: left; font-size: 15px;">
                                    {{ $pricing->points }} <small>Points</small>
                                </span>
                            </div>
                        </div>
                        @foreach ($pricing->brandPackageDetails as $detail)
                            <div class="td">{{ $detail->details }}-{{ $detail->points }}</div>
                        @endforeach
                        <form action="{{ route('pay') }}" method="post">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $pricing->price }}">
                            <div class="td"><button class="btn-order js__popup_open" data-target="#register-form-popup-2">ORDER NOW</button></div>
                        </form>
                    </div>
                @endforeach



            </div>
        </div>

    </div>



@endsection
