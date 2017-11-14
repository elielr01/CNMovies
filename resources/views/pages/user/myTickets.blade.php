@extends('layouts.master')

@section('title', 'CNMovies - My Tickets')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/user/myTickets.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">
            <h1>My Tickets</h1>


            <div class="table-responsive">
                <table class="table cnm-table">
                    <thead>
                        <th>Movie</th>
                        <th>Date</th>
                        <th>Hour</th>
                        <th>CNM Cinema</th>
                        <th>Screen</th>
                        <th>Seat</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{$ticket->cinema_function->movie->name}}</td>
                                <td>{{Carbon\Carbon::parse($ticket->cinema_function->starting_hour)->format('D M d, Y')}}</td>
                                <td>{{Carbon\Carbon::parse($ticket->cinema_function->starting_hour)->format('H:i')}}</td>
                                <td>{{$ticket->cinema_function->screen->cinema->name}}</td>
                                <td>{{$ticket->cinema_function->screen->number}}</td>
                                <td>{{$ticket->seat->number}}</td>
                                <td>${{number_format($ticket->total, 2)}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{URL::previous()}}" class="btn btn-default cnm-btn">Go Back</a>

        </div>
    </div>

@endsection