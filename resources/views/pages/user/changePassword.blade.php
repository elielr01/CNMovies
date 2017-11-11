@extends('layouts.master')

@section('title', 'CNMovies - Change Password')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/user/changePassword.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 content-container">
            <h1>Change my password</h1>

            <div class="user-info">

                <form action="{{route('changePassword')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <label for="old-password-field">Old Password</label>
                        <input id="old-password-field" name="old_password" class="form-control" type="password"
                               placeholder="Abcd.123">

                        <label for="new-password-field">New Password</label>
                        <input id="new-password-field" name="new_password" class="form-control" type="password"
                               placeholder="Abcd.123">
                        <small id="newPasswordHelp" class="form-text text-muted">
                            Password must have at least 8 chars and must include at least one uppercase, one
                            lowercase, a digit and one of the following special chars(_.,!#$%)<br>
                        </small>

                        <label for="confirm-new-password-field">Confirm New Password</label>
                        <input id="confirm-new-password-field" name="confirm_new_password" class="form-control"
                               type="password" placeholder="Abcd.123">

                    </div>

                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>

            </div>

            <div class="user-info">
                <a href="/userInfo" class="btn btn-default">Go Back</a>
            </div>


        </div>
    </div>

@section('custom_js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
@endsection

@endsection