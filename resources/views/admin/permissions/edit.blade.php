@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-4 mt-3">
            <div class="col-12 font-w700">
               <h3>
                    <i class="fas fa-edit text-primary"></i> Edit Permission
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
                            {!! Form::open(['route' => ['admin.permissions.update',  $permission->id], 'method' => 'PUT']) !!}
                            <div class="form-group">
                                {{Form::label('name', 'Name')}}
                                {{Form::text('name', $permission->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('slug', 'Slug')}}
                                {{Form::text('slug', $permission->slug, ['class' => 'form-control', 'placeholder' => 'Slug'])}}
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
