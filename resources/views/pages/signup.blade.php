@extends('layouts.master')

@section('title', 'CNMovies - Sign Up')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/signup.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12" id="content">
            <h1>Registration</h1>
            <div class="row">
                <form method="POST" action="{{route('signup')}}">
                    {{ csrf_field() }}
                    <div class="col-md-6" id="left-column">
                        <div class="form-group">
                            <label for="firstname-field">First Name</label>
                            <input id="firstname-field" name="firstname" class="form-control input-lg" type="text" placeholder="Jacqueline" />

                            <label for="lastname-field">Last Name</label>
                            <input id="lastname-field" name="lastname" class="form-control input-lg" type="text" placeholder="Lozano" />

                            <label for="email-field">E-mail</label>
                            <input id="email-field" name="email" class="form-control input-lg" type="email" placeholder="jackie@gmail.com" />

                        </div>

                    </div>
                    <div class="col-md-6" id="right-column">
                        <div class="form-group">
                            <label for="username-field">Username</label>
                            <input id="username-field" name="username" class="form-control input-lg" type="text" placeholder="jlozano" />

                            <label for="password-field">Password</label>
                            <input id="password-field" name="password" class="form-control input-lg" type="password" placeholder="Abcd.123" />

                            <label for="confirm-password-field">Confirm Password</label>
                            <input id="confirm-password-field" name="confirm-password" class="form-control input-lg" type="password" placeholder="Abcd.123" />
                        </div>

                        <div class="form-group pull-right">
                            <button type="submit" class="btn-lg btn-primary">Sign up!</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

@endsection