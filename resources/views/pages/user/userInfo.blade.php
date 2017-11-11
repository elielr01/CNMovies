@extends('layouts.master')

@section('title', 'CNMovies - My Info')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/user/userInfo.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">
            <h1>My Info</h1>

            <div class="user-info">
                <h3>First Name: {{$user->firstname}}</h3>
                <h3>Last Name: {{$user->lastname}}</h3>
                <h3>Username: {{$user->username}}</h3>
                <h3>E-mail: {{$user->email}}</h3>
            </div>

            <div class="user-info">
                <a href="/modify-user-info" class="btn btn-default">Modify my info</a>
                <a href="/change-password" class="btn btn-default">Change my password</a>
            </div>



        </div>
    </div>

@endsection