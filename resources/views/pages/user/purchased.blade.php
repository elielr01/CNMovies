@extends('layouts.master')

@section('title', 'CNMovies - Tickets Buyed')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/user/purchased.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">
            <h1>Tickets Buyed</h1>

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

                    <a href="/" class="btn btn-primary">Return to Home</a>


                </div>
            </div>

        </div>
    </div>

@endsection