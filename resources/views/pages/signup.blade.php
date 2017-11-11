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
        <div class="col-md-12 content-container">
            <h1>Registration</h1>
            <div class="row">
                <form method="POST" action="{{route('signup')}}">
                    {{ csrf_field() }}
                    <div class="col-md-6" id="left-column">
                        <div class="form-group">
                            <label for="firstname-field">First Name</label>
                            <input id="firstname-field" name="firstname" class="form-control input-lg"
                                   type="text" placeholder="Jacqueline" value="{{old('firstname')}}"/>

                            <label for="lastname-field">Last Name</label>
                            <input id="lastname-field" name="lastname" class="form-control input-lg"
                                   type="text" placeholder="Lozano" value="{{old('lastname')}}" />

                            <label for="email-field">E-mail</label>
                            <input id="email-field" name="email" class="form-control input-lg"
                                   type="email" placeholder="jackie@gmail.com" value="{{old('email')}}"/>

                        </div>

                    </div>
                    <div class="col-md-6" id="right-column">
                        <div class="form-group">
                            <label for="username-field">Username</label>
                            <input id="username-field" name="username_signup" class="form-control input-lg"
                                   type="text" placeholder="jlozano" value="{{old('username_signup')}}" />

                            <label for="password-field">Password</label>
                            <input id="password-field" name="password_signup" class="form-control input-lg"
                                   type="password" placeholder="Abcd.123" />
                            <small id="newPasswordHelp" class="form-text text-muted">
                                Password must have at least 8 chars and must include at least one uppercase, one
                                lowercase, a digit and one of the following special chars(_.,!#$%)
                            </small>

                            <label for="confirm-password-field">Confirm Password</label>
                            <input id="confirm-password-field" name="confirm_password" class="form-control input-lg"
                                   type="password" placeholder="Abcd.123" />
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