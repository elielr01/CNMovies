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
                    <h3>Hour: {{Carbon\Carbon::parse($cinema_func->starting_hour)->format('H:i')}}</h3>
                    <h3>Seats:</h3>
                    <p>
                        @foreach($seats as $seat)
                            {{$seat}},
                        @endforeach
                    </p>

                    <a href="/" class="btn btn-primary">Buy tickets</a>


                </div>
            </div>

        </div>
    </div>

@endsection