@extends('layouts.master')

@section('title', 'CNMovies - Homepage')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    PICKLE RICK!!!
    @if(isset($user))
        <h1>{{$user->firstname}}</h1>
    @endif
@endsection
