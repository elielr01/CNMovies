@extends('layouts.master')

@section('title', 'CNMovies - Homepage')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 content-container">
            <h1>Premieres</h1>

            <div class="movies-container">

                @foreach($premieres as $premiere)
                    <div class="movie-img-container" >
                        <a href="/movie?id={{$premiere->movie_id}}">
                            <img src="{{'storage/img/' . $premiere->img_name}}" class="movie-img" />
                        </a>
                    </div>
                @endforeach

            </div>

            <h1>Movies</h1>

            <div class="movies-container">

                @foreach($movies as $movie)
                    <div class="movie-img-container" >
                        <a href="/movie?id={{$movie->movie_id}}">
                            <img src="{{'storage/img/' . $movie->img_name}}" class="movie-img" />
                        </a>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

@endsection
