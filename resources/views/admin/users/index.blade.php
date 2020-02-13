@extends('layouts.master')

@section('content')
@include('incs.messages')
<div class="content-header">
    <div class="container">
        <div class="row mb-3 mt-3">
            <div class="col-12">
                <a href="{{ route('admin.users.create') }}">
                    <button type="button" class="btn btn-success mr-1">
                        <i class="fa fa-fw fa-plus mr-1"></i> Create New User
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row ml-1">
                            <i class="fas fa-2x fa-users"></i>
                            <h3 class="ml-2">All Users</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(count($users) > 0)
                        <div class="table-responsive text-center">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td><a class="link-fx text-info" href="{{ route('admin.users.show',$user->id)}}">{{$user->name}}</a></td>
                                            <td>{{$user->email}}</td>
                                            <td>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                                            <td>{{$user->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            <p>There are currently no users.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
