@extends('layouts.master')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            @if (Auth::user()->hasRole('admin'))
                @include('admin.dashboard')
            @else
                @include('users.dashboard')
            @endif
        </div>
    </div>
</div>
@endsection
