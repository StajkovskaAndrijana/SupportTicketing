@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-4 mt-3">
            <div class="col-12 font-w700">
               <h3>NEW ROLE</h3>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Name')}}
                            <span class="text-danger">*</span>
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                            @if ($errors->has('name'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {{Form::label('slug', 'Slug')}}
                            <span class="text-danger">*</span>
                            {{Form::text('slug', '', ['class' => 'form-control', 'placeholder' => 'Slug'])}}
                            @if ($errors->has('slug'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('slug') }}</strong>
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
@endsection
