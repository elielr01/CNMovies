@extends('layouts.master')

@section('title')
    CNMovies - Choose Seat
@endsection

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/user/chooseSeat.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">

            <div class="row">
                <div class="col-md-3" id="movie-container">
                    <div class="movie-img-container">
                        <img src="storage/img/{{$movie->img_name}}" class="movie-img"/>
                    </div>
                    <h3>{{$movie->name}}</h3>
                    <p>{{$cinema->name}}</p>
                    <p>Screen: {{$screen->number}}</p>
                    <p>Hour: {{Carbon\Carbon::parse($cinema_func->starting_hour)->format('H:i')}}</p>
                    <p>Choosen seats:</p>
                    <p id="choosen_seats"></p>


                </div>
                <div class="col-md-9" id="seats-container">
                    <h2>Choose your seats</h2>

                    <div class="seats" id="seats">

                        <div class="seat-numbers">
                            <div class="seat-number-header" id="left-seats-header">
                                <h3>1</h3>
                                <h3>2</h3>
                                <h3>3</h3>
                            </div>

                            <div class="seat-number-header" id="central-seats-header">
                                <h3>4</h3>
                                <h3>5</h3>
                                <h3>6</h3>
                                <h3>7</h3>
                                <h3>8</h3>
                                <h3>9</h3>
                            </div>

                            <div class="seat-number-header" id="right-seats-header">
                                <h3>10</h3>
                                <h3>11</h3>
                                <h3>12</h3>
                            </div>
                        </div>

                        @for($i = 0, $letters = ['J','I', 'H', 'G', 'F', 'E', 'D', 'C', 'B', 'A']; $i < 10; $i++)
                            <div class="seat-row">
                                <h3>{{$letters[$i]}}</h3>
                                <div id="left-seats">
                                    @for($j = 1; $j <= 3; $j++)
                                        @if(in_array($letters[$i].$j, $busy_seats))
                                            <img src="storage/img/gray-seat.png" class="seat-img"/>
                                        @else
                                            <button class="seat-btn" id="{{$letters[$i].$j}}" onclick="toggleSeat(this.id);">
                                                <img src="storage/img/red-seat.png" class="seat-img"/>
                                            </button>
                                        @endif
                                    @endfor
                               </div>
                                <div id="central-seats">
                                    @for($j = 4; $j <= 9; $j++)
                                        @if(in_array($letters[$i].$j, $busy_seats))
                                            <img src="storage/img/gray-seat.png" class="seat-img"/>
                                        @else
                                            <button class="seat-btn" id="{{$letters[$i].$j}}" onclick="toggleSeat(this.id);">
                                                <img src="storage/img/red-seat.png" class="seat-img"/>
                                            </button>
                                        @endif
                                    @endfor
                                </div>
                                <div id="right-seats">
                                    @for($j = 10; $j <= 12; $j++)
                                        @if(in_array($letters[$i].$j, $busy_seats))
                                            <img src="storage/img/gray-seat.png" class="seat-img"/>
                                        @else
                                            <button class="seat-btn" id="{{$letters[$i].$j}}" onclick="toggleSeat(this.id);">
                                                <img src="storage/img/red-seat.png" class="seat-img"/>
                                            </button>
                                        @endif
                                    @endfor
                                </div>
                                <h3>{{$letters[$i]}}</h3>
                            </div>
                        @endfor

                        <div class="seat-numbers">
                            <div class="seat-number-header" id="left-seats-header">
                                <h3>1</h3>
                                <h3>2</h3>
                                <h3>3</h3>
                            </div>

                            <div class="seat-number-header" id="central-seats-header">
                                <h3>4</h3>
                                <h3>5</h3>
                                <h3>6</h3>
                                <h3>7</h3>
                                <h3>8</h3>
                                <h3>9</h3>
                            </div>

                            <div class="seat-number-header" id="right-seats-header">
                                <h3>10</h3>
                                <h3>11</h3>
                                <h3>12</h3>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-primary pull-right cnm-btn"
                            onclick="checkoutPost();">
                        Go To Checkout
                    </button>
                    <a href="{{URL::previous()}}" class="btn btn-default pull-right cnm-btn">Go back</a>
                    <form method="POST" action="/checkout" id="checkoutForm">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$cinema_func->cinema_function_id}}">
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('custom_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/chooseSeat.js') }}"></script>
@endsection

