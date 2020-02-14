@extends('layouts.master')

@section('content')
    @if (Auth::user()->hasRole('admin'))
        @include('admin.dashboard')
    @else
        @include('users.dashboard')
    @endif
@endsection
