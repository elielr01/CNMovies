@extends('layouts.master')

@section('title', 'CNMovies - Administration')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('custom_css')
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet" type="text/css">
    @yield('admin_css')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 content-container">
            <h1>Administration</h1>

            <div class="row">
                <div class="col-md-2">
                    <h3>Menu</h3>
                    <nav>
                        <ul class="nav nav-stacked span2" id="admin-menu">
                            <li><a href="/admin/home">Home</a></li>
                            <li><a href="/admin/movies">Movies Management</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-10" id="admin-content-container">
                    @yield('admin_content')
                </div>
            </div>
        </div>
    </div>

@endsection
