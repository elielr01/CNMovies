@extends('layouts.master')

@section('title', 'CNMovies - Modify My Info')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/user/modifyUserInfo.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">
            <h1>My Info</h1>

            <div class="user-info">

                <form action="{{route('modifyUserInfo')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <label for="firstname-field">First Name</label>
                        <input id="firstname-field" name="firstname" class="form-control" type="text"
                               value="{{$user->firstname}}" placeholder="Jaqueline">

                        <label for="lastname-field">Last Name</label>
                        <input id="lastname-field" name="lastname" class="form-control" type="text"
                               value="{{$user->lastname}}" placeholder="Lozano">

                        <label for="username-field">Username</label>
                        <input id="username-field" name="username" class="form-control" type="text"
                               value="{{$user->username}}" placeholder="jlozano">

                        <label for="email-field">E-mail</label>
                        <input id="email-field" name="email" class="form-control" type="email"
                               value="{{$user->email}}" placeholder="jackie@gmail.com">
                    </div>

                    <button type="submit" class="btn btn-primary">Modify my info</button>
                </form>

            </div>

            <div class="user-info">
                <a href="/userInfo" class="btn btn-default">Go Back</a>
            </div>



        </div>
    </div>

@endsection