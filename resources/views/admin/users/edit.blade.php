@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-4 mt-3">
            <div class="col-12 font-w700">
               <h3>
                    <i class="fas fa-edit text-primary"></i> Edit User
               </h3>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open(['route' => ['admin.users.update',  $user->id], 'method' => 'PUT']) !!}
                            <div class="form-group">
                                {{Form::label('name', 'Name:')}}
                                {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('email', 'Email:')}}
                                {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('role', 'Roles:')}}
                                @foreach($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($user->roles->contains($role->id)) checked=checked @endif>
                                        <span>{{$role->name}}</span>
                                    </div>
                                @endforeach
                                @if ($errors->has('role'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                {{Form::label('permission', 'Permissions:')}}
                                @foreach($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" value="{{$permission->id}}" @if($user->permissions->contains($permission->id)) checked=checked @endif>
                                        <span>{{$permission->name}}</span>
                                    </div>
                                @endforeach
                                @if ($errors->has('permission'))
                                    <span class="invalid-feedback d-block" permission="alert">
                                        <strong>{{ $errors->first('permission') }}</strong>
                                    </span>
                                @endif
                            </div>

                            {{Form::submit('Submit', ['class'=>'btn btn-success mt-4'])}}
                            {!!Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
