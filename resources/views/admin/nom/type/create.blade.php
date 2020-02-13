@extends('layouts.master')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-4 mt-3">
            <div class="col-12 font-w700">
               <h3>NEW TYPE</h3>
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
                        {!! Form::open(['route' => 'admin.nom.type.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            <span class="text-danger">*</span>
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                            @if ($errors->has('title'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            {{Form::label('body', 'Body')}}
                            <span class="text-danger">*</span>
                            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                            @if ($errors->has('body'))
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $errors->first('body') }}</strong>
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
