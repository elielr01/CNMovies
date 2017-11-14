@extends('layouts.master')

@section('title', 'CNMovies - Contact Us')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/contactUs.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 content-container">
            <h1>Contact Us</h1>

            @foreach($cinemas as $cinema)
                <div class="row cnm-cinema">

                    <div class="col-md-6 cinema-info">
                        <h2>{{$cinema->name}}</h2>
                        <h3>Address</h3>
                        <p>{{$cinema->address}}</p>
                        <h3>Telephone</h3>
                        <p>{{$cinema->telephone}}</p>
                        <h3>E-mail</h3>
                        <p>{{$cinema->email}}</p>

                    </div>
                    <div class="col-md-4 cnm-map">
                        <iframe
                                width="420"
                                height="315"
                                frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBC8c0QPycE0Spq8mjdmdPCtKZD_NjCRqk&q={{urlencode($cinema->address)}}" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            @endforeach


        </div>
    </div>

@endsection
