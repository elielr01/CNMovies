@extends('layouts.master')

@section('title')
    CNMovies - {{$movie->name}}
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/movie/movie.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">
            <div class="cinema-header">
                <h1>{{$movie->name}}</h1>
            </div>

            <div class="row movie-container">
                <div class="col-md-4 movie-img-container">
                    <img src="{{asset('storage/img/' . $movie->img_name)}}" class="movie-image"/>
                </div>
                <div class="col-md-6 movie-content-container">

                    <h2>Trailer:</h2>

                    <iframe src="{{$movie->trailer_url}}" allowfullscreen frameborder="0" width="512.4" height="240"></iframe>

                    <h2>Storyline</h2>
                    <p>
                        {{$movie->storyline}}
                    </p>
                    <h2>Director(s)</h2>
                    <p>
                        {{$movie->directors}}
                    </p>
                    <h2>Stars</h2>
                    <p>
                        {{$movie->stars}}
                    </p>

                    @foreach($cinemas as $cinema)
                        <h2>{{$cinema->name}}</h2>
                        <p>
                            @foreach($cinema_funcs as $cinema_func)
                                @if($cinema_func->screen->cinema_id == $cinema->cinema_id)
                                    <a href="#">{{Carbon\Carbon::parse($cinema_func->starting_hour)->format('H:i')}}</a>
                                @endif
                            @endforeach
                        </p>
                    @endforeach

                    {{--
                    <h2>Hours</h2>
                    <p>

                        @foreach($cinema_funcs as $cinema_func)
                            @if($cinema_func->movie_id == $movie->movie_id)
                                <a href="#">{{Carbon\Carbon::parse($cinema_func->starting_hour)->format('H:i')}}</a>
                            @endif
                        @endforeach
                    </p>--}}


                </div>
            </div>
        </div>
    </div>

@endsection

