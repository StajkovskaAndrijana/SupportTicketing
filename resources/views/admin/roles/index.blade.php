@extends('layouts.master')

@section('content')
@include('incs.messages')
<div class="content">
    <div class="content-header">
        <div class="container">
            <div class="row mb-3 mt-3">
                <div class="col-12">
                    <a href="{{ route('admin.roles.create') }}">
                        <button type="button" class="btn btn-success mr-1">
                            <i class="fa fa-fw fa-plus mr-1"></i> Add Role
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Role List</h3>
                        </div>

                        <div class="card-body">
                            @if(count($roles) > 0)
                            <div class="table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{$role->id}}</td>
                                                <td>{{$role->name}}</td>
                                                <td>{{$role->slug}}</td>
                                                <td>
                                                    <a href="{{ route('admin.roles.edit',$role->id)}}" class="btn btn-primary">
                                                        <i class="fa fa-pencil-alt mr-1"></i> Edit
                                                    </a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-block-popin"><i class="fa fa-fw fa-times mr-1"></i> Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                                <p>No Roles found</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-block-popin" tabindex="-1" role="dialog" aria-labelledby="modal-default-popin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popin" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pb-1">
                    <p><i class="fa fa-fw fa-exclamation-triangle mr-1 text-warning"></i>Are you sure that you want to delete this role?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-rounded btn-outline-primary" data-dismiss="modal" aria-label="Close">
                        No
                    </button>
                    <form action="{{ route('admin.roles.destroy',$role->id)}}" method="post" style="display: contents">
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" value="delete" class="btn btn-danger mr-1">
                            <i class="fa fa-fw fa-times mr-1"></i> Delete
                        </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
