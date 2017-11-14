@extends('layouts.master')

@section('title', 'CNMovies - Checkout')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/user/checkout.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">
            <h1>Checkout</h1>

            <div class="row movie-container">
                <div class="col-md-4 movie-img-container">
                    <img src="{{asset('storage/img/' . $movie->img_name)}}" class="movie-image"/>
                </div>
                <div class="col-md-6 movie-content-container">
                    <h2>{{$movie->name}}</h2>
                    <h3>{{$cinema->name}}</h3>
                    <h3>Screen: {{$screen->number}}</h3>
                    <h3>Date: {{Carbon\Carbon::parse($cinema_func->starting_hour)->format('D M d, Y')}}</h3>
                    <h3>Hour: {{Carbon\Carbon::parse($cinema_func->starting_hour)->format('H:i')}}</h3>
                    <h3>Seats:</h3>
                    <p>
                        @foreach($seats as $seat)
                            {{$seat}},
                        @endforeach
                    </p>
                    <h2>Total: ${{number_format($total, 2)}}</h2>

                    <a href="/choose-seat" class="btn btn-default cnm-btn" onclick="event.preventDefault(); $('#backForm').submit();">Go Back</a>
                    <a href="/buyTickets" class="btn btn-primary cnm-btn" onclick="event.preventDefault(); $('#buyForm').submit();">Buy tickets</a>

                    <form method="POST" action="{{route('buyTickets')}}" id="buyForm">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$cinema_func->cinema_function_id}}"/>
                        @foreach($seats as $seat)
                            <input type="hidden" name="seats[]" value="{{$seat}}">
                        @endforeach
                    </form>

                    <form method="GET" action="/choose-seat" id="backForm">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$cinema_func->cinema_function_id}}"/>
                    </form>

                </div>
            </div>

        </div>
    </div>

@endsection