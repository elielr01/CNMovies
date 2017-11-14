@extends('layouts.admin')

@section('admin_css')
    <link href="{{ asset('css/admin/home.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('admin_content')
    {{-- This section is inside a col-md-10 --}}

    <h2>Admin Home</h2>

    <p>This area is intended for administration purposes.</p>
@endsection